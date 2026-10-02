<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Ukuran', 'Warna', 'Berat'] as $name) {
            ProductAttribute::firstOrCreate(['name' => $name]);
        }
    }
}
