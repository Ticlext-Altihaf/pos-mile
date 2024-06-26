<?php

namespace Database\Seeders;

use App\Models\Koli;
use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        if(config('app.env') === 'local') {
            User::factory()->count(10)->create();
            Payment::factory()->count(10)->create();
            Package::factory()->count(10)->create();
            Koli::factory()->count(10)->create();
            $packages = Package::all();
            foreach ($packages as $package) {
                if ($package->kolis->count() === 0) {
                    $koli = Koli::factory()->make();
                    $koli->package_id = $package->id;
                }
                $package->refresh();
                $package->save();
            }

        }
    }
}
