<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function print($packageId)
    {
        $package = Package::findOrFail($packageId);
        $package->load('kolis');
        $package->load('payment');
        return view('pages.view', compact('package'));
    }
}
