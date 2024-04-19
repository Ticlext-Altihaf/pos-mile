<?php

namespace App\Filament\Resources\PackageResource\Pages;

use App\Extensions\RajaOngkir;
use App\Filament\Admin\Resources\PaymentResource;
use App\Filament\Resources\PackageResource;
use App\Models\Package;
use App\Models\Payment;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function App\Providers\money;

/**
 * @property Form $form
 */
class CreatePackage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = PackageResource::class;

    protected static string $view = 'filament.resources.package-resource.pages.create-package';

    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        $this->data = [];
        $this->form->fill();
    }


    public function form(Form $form): Form
    {
        return $form
            ->model(Package::class)
            ->schema([
                ...\App\Filament\Admin\Resources\PackageResource::commonSchema(),

                Section::make(__("Payment"))
                    ->schema(array_map(function (Field $field) {
                        return $field->statePath('payment.' . $field->getName());
                    }, PaymentResource::commonSchema())),
                Repeater::make('kolis')
                    ->hiddenLabel()
                    ->collapsible()
                    ->live()
                    ->schema(\App\Filament\Admin\Resources\PackageResource::koliSchema())
                    ->columns()
                    ->columnSpanFull()
                    ->addActionLabel(__('Tambah Koli')),
                Section::make()
                ->schema([

                    Placeholder::make('actual_weight')
                        ->hiddenLabel()
                        ->content(function (Get $get) {
                            $total_weight = static::getActualWeight($get, weightOnly: true);
                            return "Berat aktual: $total_weight kg";
                        })
                        ->disabled(),
                    Placeholder::make('volume_weight')
                        ->hiddenLabel()
                        ->content(function (Get $get) {
                            $volume_weight = static::getActualWeight($get, true);
                            return "Berat volume: $volume_weight kg";
                        })
                        ->disabled(),
                    Placeholder::make('chargeable_weight')
                        ->hiddenLabel()
                        ->content(function (Get $get) {
                            $volume_weight = static::getActualWeight($get);
                            return "Berat yang dihitung: $volume_weight kg";
                        })
                        ->disabled(),
                    Placeholder::make('shipment_cost')
                        ->hiddenLabel()
                        ->content(function (Get $get) {

                            $shipment_cost = 0;
                            $weight = static::getActualWeight($get);
                            $origin = $get('sender_city_or_regency');
                            $destination = $get('receiver_city_or_regency');
                            if(empty($origin) || empty($destination) || !$weight) {
                                return "Biaya pengiriman: -";
                            }

                            $shipment_cost = RajaOngkir::shipment_costs($origin, $destination, intval($weight*1000));
                            if(!$shipment_cost) {
                                return "Biaya pengiriman: Tidak tersedia";
                            }
                            $shipment_cost = money($shipment_cost);
                            return "Biaya pengiriman: $shipment_cost";
                        })
                        ->disabled(),
                ])
            ])->statePath('data');
    }

    public function submit()
    {
        $state = $this->form->getState();

        DB::beginTransaction();
        try {
            $payment = Payment::create($state['payment']);
            $package = Package::create(array_merge($state, ['payment_id' => $payment->id]));
            $package->kolis()->createMany($state['kolis']);
            $package->save();
            DB::commit();
            $this->redirect(PackageResource::getUrl());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            Notification::make()
                ->title(__('Failed to create package'))
                ->body($e->getMessage())
                ->danger()
                ->send();
            if(config('app.debug')) {
                throw $e;
            }
        }
    }


    public static function getActualWeight(Get $get, bool $volumeOnly = false, bool $weightOnly = false): float
    {
        $total_weight = 0.0;
        foreach ($get('kolis') as $koli) {
            $volumeWeight = floatval(($koli['length'] ?? 0.0) * ($koli['width'] ?? 0.0) * ($koli['height'] ?? 0.0) / 6000.0);
            $weight = intval($koli['weight'] ?? 0);
            $amount = intval($koli['amount'] ?? 1);
            if ($volumeOnly) {
                $total_weight += $volumeWeight * $amount;
                continue;
            }
            if ($weightOnly) {
                $total_weight += $weight * $amount;
                continue;
            }
            // get the highest value between volumeWeight and weight
            $total_weight += $volumeWeight > $weight ? $volumeWeight * $amount : $weight * $amount;
        }
        return $total_weight;
    }

}


