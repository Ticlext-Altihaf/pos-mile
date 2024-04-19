<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    // Prevent setting password to null
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['password'] == null) unset($data['password']);

        return parent::mutateFormDataBeforeSave($data);
    }
}
