<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        Product::create([
            'category_id'=> '1',
            'brand_id'=> '1',
            'name' => 'Galaxy 10',
            'slug'=> 'Galaxy-10',
            'description' => 'This is a smartphone',
            'price' => 520,
        ]);

        Product::create([
            'category_id'=> '1',
            'brand_id'=> '1',
            'name' => 'Galaxy 11',
            'slug'=> 'Galaxy-11',
            'description' => 'This is a smartphone',
            'price' => 650,
        ]);
        

        

        
    }
}
