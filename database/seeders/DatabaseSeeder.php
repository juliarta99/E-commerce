<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kategori::create([
            'name' => 'shirt',
            'slug' => 'shirt'
        ]);
        Kategori::create([
            'name' => 'clothes',
            'slug' => 'clothes'
        ]);
        $citys = Http::withHeaders([
            'key' => 'e6cfadb803301e9908ad6edc670b5783'
        ])->get('https://api.rajaongkir.com/starter/city');

        foreach($citys['rajaongkir']['results'] as $city) {
            City::create([
                'city_id' => $city['city_id'],
                'province_name' => $city['province'],
                'city_name' => $city['city_name'],
                'postal_code' => $city['postal_code'],
            ]);
        };
    }
}
