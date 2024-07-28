<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product=collect( [
            [
            'name' => 'Product A',
           
            'description' => 'This is Product A.',
            'image' => 'product_images\1721126023 .jpg',
            'created_at' => now(),
            'updated_at' => now(),

        ],[
            'name' => 'Product B',
            'description' => 'This is Product B.',
            'image' => 'product_images/1721126024.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Product C',
            'description' => 'This is Product C .',
            'image' => 'product_images/1721126025.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Product D',
            'description' => 'This is Product D.',
            'image' => 'product_images/1721126026.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],]);

        $product->each(function($prod){
            product::insert($prod);
        });
        // product::insert([
        //    'name' => 'Product D',
        //     'description' => 'This is Product D.',
        //     'image' => 'product_images/1721126026.jpg',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ] );
    }
}
