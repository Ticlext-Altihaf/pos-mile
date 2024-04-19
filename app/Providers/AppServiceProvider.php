<?php

namespace App\Providers;

use Filament\Support\Components\Component;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        Component::configureUsing(function (Component $component): void {
            //check if method translateLabel exists
            if (method_exists($component, 'translateLabel')) {
                $component->translateLabel();
            }
        });

    }
}

function money(float|int $money): string
{
    return "Rp ".number_format($money, 0, ',', '.');
}
