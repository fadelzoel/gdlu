<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'           => 'WHITE GHOST',
                'price'          => 349000,
                'original_price' => 599000,
                'category'       => 't-shirts',
                'image'          => 'notFinal1.jpeg',
                'is_new'         => true,
                'is_sold_out'    => false,
            ],
            [
                'name'           => 'LOWKEY',
                'price'          => 349000,
                'original_price' => 599000,
                'category'       => 't-shirts',
                'image'          => 'notFinal2.jpeg',
                'is_new'         => true,
                'is_sold_out'    => false,
            ],
            [
                'name'           => 'DARK TRIAD',
                'price'          => 350000,
                'original_price' => null,
                'category'       => 't-shirts',
                'image'          => 'notFinal3.jpeg',
                'is_new'         => false,
                'is_sold_out'    => false,
            ],
            [
                'name'           => 'GENGAR EDITION',
                'price'          => 350000,
                'original_price' => null,
                'category'       => 't-shirts',
                'image'          => 'notFinal4.jpeg',
                'is_new'         => false,
                'is_sold_out'    => false,
            ],
            [
                'name'           => 'XX',
                'price'          => 320000,
                'original_price' => 350000,
                'category'       => 'outerwear',
                'image'          => 'final1.jpeg',
                'is_new'         => true,
                'is_sold_out'    => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}