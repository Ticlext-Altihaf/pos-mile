<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Support\Facades\Gate;

class PackageController extends Controller
{
    public function print($packageId)
    {

        $package = Package::findOrFail($packageId);
        Gate::authorize('view', $package);
        $package->load('kolis');
        $package->load('payment');
        return view('pages.view', compact('package'));
    }
}
