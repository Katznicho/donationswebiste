<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Provide the country data here
        ];
    
        foreach ($data as $code => $country) {
            \App\Models\Country::create([
                'code' => $code,
                'name' => $country['country'],
                'region' => $country['region'],
            ]);
        }
    }
}
