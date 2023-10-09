<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory(5)->create();

        Place::factory(20)->create()->each(function ($place) {
            $place->packages()->saveMany(Package::factory(rand(2, 5))->create(['place_id' => $place->id]))->each(function ($package) {
                $package->reservations()->saveMany(Reservation::factory(rand(2, 5))->create(['package_id' => $package->id, 'customer_id' => rand(1, 5)]));
            });
        });
    }
}
