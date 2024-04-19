<?php

use Illuminate\Support\Facades\Route;


Route::get('/print/{packageId}', [\App\Http\Controllers\PackageController::class, 'print'])->name('print');
