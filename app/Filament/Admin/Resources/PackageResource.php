<?php

namespace App\Filament\Admin\Resources;

use App\Extensions\RajaOngkir;
use App\Filament\Admin\Resources\PackageResource\Pages;
use App\Filament\Admin\Resources\PackageResource\RelationManagers;
use App\Forms\Components\MataUangInput;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function getLabel(): ?string
    {
        return __('Package');
    }


    public static function koliSchema(): array
    {
        return [
            Forms\Components\TextInput::make('weight')
                ->label(__('Weight (kg)'))
                ->required()

                ->numeric(),
            Forms\Components\TextInput::make('length')
                ->label(__('Length (cm)'))
                ->numeric()

                ->default(null),
            Forms\Components\TextInput::make('width')
                ->label(__('Width (cm)'))
                ->numeric()

                ->default(null),
            Forms\Components\TextInput::make('height')
                ->label(__('Height (cm)'))
                ->numeric()

                ->default(null),
            Forms\Components\TextInput::make('description')
                ->label(__('Description'))
                ->maxLength(255)
                ->default(null),
            MataUangInput::make('surcharge')
                ->label(__('Surcharge'))
                ->maxLength(255)
                ->default(null),
            MataUangInput::make('goods_value')
                ->label(__('Goods Value'))
                ->numeric()
                ->requiredWith('surcharge'),
            Forms\Components\TextInput::make('amount')
                ->label(__('Amount'))
                ->required()
                ->default(1)
                ->numeric(),
        ];
    }
    public static function commonSchema(bool $isWizard = false): array
    {
        $sections = [
            __('Sender') => [
                Forms\Components\TextInput::make('sender_name')
                    ->label(__('Name'))
                    ->maxLength(255),
                Forms\Components\Select::make('sender_province')
                    ->label(__('Province'))
                    ->searchable()
                    ->live()
                    ->options(RajaOngkir::province_options())
                    ->required(),
                Forms\Components\Select::make('sender_city_or_regency')
                    ->label(__('City'))
                    ->options(function (Forms\Get $get){
                        return RajaOngkir::city_options($get('sender_province'));
                    })
                    ->required(),
                Forms\Components\TextInput::make('sender_phone')
                    ->label(__('Phone'))
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sender_postal_code')
                    ->label(__('Postal Code'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('sender_address')
                    ->label(__('Address'))
                    ->columnSpanFull()
                    ->maxLength(255),
            ],
            __('Receiver') => [
                Forms\Components\TextInput::make('receiver_name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('receiver_phone')
                    ->label(__('Phone'))
                    ->required()
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Select::make('receiver_province')
                    ->label(__('Province'))
                    ->searchable()
                    ->live()
                    ->options(RajaOngkir::province_options())
                    ->required(),
                Forms\Components\Select::make('receiver_city_or_regency')
                    ->label(__('City'))
                    ->options(function (Forms\Get $get){
                        return RajaOngkir::city_options($get('receiver_province'));
                    })
                    ->required(),
                Forms\Components\TextInput::make('receiver_district')
                    ->label(__('District'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('receiver_village_or_subdistrict')
                    ->label(__('Village or Subdistrict'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('receiver_postal_code')
                    ->label(__('Postal Code'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('receiver_address')
                    ->label(__('Address'))
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
            ],
            __('Delivery') => [
                Forms\Components\Select::make('service_level')
                    ->label(__('Service'))
                    ->options(Package::$serviceLevel)
                    ->required(),
                Forms\Components\Select::make('package_type')
                    ->label(__('Package Type'))
                    ->options(Package::$packageType)
                    ->required(),
                Forms\Components\Select::make('cod')
                    ->label(__('COD'))
                    ->required()
                    ->options(Package::$codOptions)
                    ->default(0),
                Forms\Components\TextInput::make('reference_number')
                    ->label(__('Reference Number'))
                    ->maxLength(255),
                Forms\Components\Textarea::make('instructions')
                    ->label(__('Instructions'))
                    ->columnSpanFull()
                    ->maxLength(255),
            ],



        ];
        $schema = [];
        foreach ($sections as $section => $fields) {
            if($isWizard) {
                $schema[] = Forms\Components\Wizard\Step::make($section)
                    ->schema($fields);
            }
            else {
                $schema[] = Forms\Components\Section::make($section)
                    ->columns()
                    ->schema($fields);
            }
        }
        return $schema;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('payment_id')
                    ->relationship('payment', 'id')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                MataUangInput::make('shipment_cost')
                    ->label(__('Shipment Cost'))
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('actual_weight')
                    ->label(__('Actual Weight'))
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('volume_weight')
                    ->label(__('Volume Weight'))
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('chargeable_weight')
                    ->label(__('Chargeable Weight'))
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('airway_bill')
                    ->required()
                    ->maxLength(255),
                ...self::commonSchema(),
                Repeater::make('kolis')
                    ->hiddenLabel()
                    ->collapsible()
                    ->live()
                    ->schema(\App\Filament\Admin\Resources\PackageResource::koliSchema())
                    ->columns()
                    ->relationship('kolis')
                    ->columnSpanFull()
                    ->addActionLabel(__('Tambah Koli')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('payment.id')
                    ->numeric()
                    ->url(fn($record) => PaymentResource::getUrl('edit', ['record' => $record->payment_id]))
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sender_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender_postal_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_province')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_city_or_regency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_district')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_village_or_subdistrict')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_postal_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('package_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_cod')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reference_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instructions')
                    ->searchable(),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('length')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('width')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surcharge')
                    ->searchable(),
                Tables\Columns\TextColumn::make('goods_value')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('airway_bill')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
