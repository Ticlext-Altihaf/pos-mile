<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getLabel(): ?string
    {
        return __('Package');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    protected int $i = 0;
    public static function form(Form $form): Form
    {
        return $form
            ->columns()
            ->schema([
                ...\App\Filament\Admin\Resources\PackageResource::commonSchema(),

                    Repeater::make('kolis')
                        ->hiddenLabel()
                        ->collapsible()
                        ->itemLabel(fn () => 'Koli')
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
                Tables\Columns\TextColumn::make('cod')
                    ->label(__("COD"))
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

            ])
            ->bulkActions([

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
            'view' => Pages\ViewPackage::route('/view/{record}'),
        ];
    }
}
