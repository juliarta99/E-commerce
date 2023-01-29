<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2,4)),
            'slug' => $this->faker->slug(),
            'harga' => mt_rand(10000,99000),
            'id_toko' => mt_rand(1,3),
            'harga_awal' => mt_rand(100000, 120000),
            'deskripsi' => $this->faker->paragraph(mt_rand(5,8)),
            'potongan' => mt_rand(0,100),
            'berat' => mt_rand(0,999),
            'kabupaten' => "Badung",
            'provinsi' => "Bali",
            'id_kategori' => mt_rand(1,2),
        ];
    }
}
