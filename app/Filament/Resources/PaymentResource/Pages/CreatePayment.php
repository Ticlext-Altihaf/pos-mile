<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Admin\Resources\PackageResource;
use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;


}
