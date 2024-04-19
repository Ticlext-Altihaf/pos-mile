<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class MataUangInput extends TextInput
{


    public static function make(string $name): static
    {
        return parent::make($name)
            //->currencyMask('.', ',', 0)
            ->prefix('Rp');
    }
}
