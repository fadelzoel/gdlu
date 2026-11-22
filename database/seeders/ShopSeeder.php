<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ShopSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // name, category, price, original price, size, color, qty, image (inside /public), is it new?
        $items = [
            ['WHITE GHOST',    't-shirts',  349000, 599000, 'L', 'White',  25, 'image/gallery/notFinal1.jpeg', true],
            ['LOWKEY',         't-shirts',  349000, 599000, 'M', 'Black',  18, 'image/gallery/notFinal2.jpeg', true],
            ['DARK TRIAD',     't-shirts',  350000, null,   'L', 'Black',  12, 'image/gallery/notFinal3.jpeg', false],
            ['GENGAR EDITION', 't-shirts',  350000, null,   'M', 'Purple',  3, 'image/gallery/notFinal4.jpeg', false],
            ['XX',             'outerwear', 320000, 350000, 'XL', null,    15, 'image/gallery/final1.jpeg',    true],
        ];

        foreach ($items as [$name, $category, $price, $original, $size, $color, $qty, $image, $isNew]) {
            $product = Product::updateOrCreate(['name' => $name], [
                'category' => $category,
                'price' => $price,
                'original_price' => $original,
                'size' => $size,
                'color' => $color,
                'quantity' => $qty,
                'image' => $image,
            ]);

            // only the "new" ones keep a fresh created_at (the NEW badge lasts 14 days)
            if (!$isNew) {
                $product->forceFill(['created_at' => now()->subDays(30)])->saveQuietly();
            }
        }

        if (Sale::count() === 0) {
            $products = Product::all();
            $customers = ['Andi', 'Budi', 'Citra', 'Dewi', 'Eko', 'Fajar', 'Gita', 'Hana'];

            for ($i = 1; $i <= 25; $i++) {
                $p = $products->random();
                $qty = rand(1, 3);

                Sale::create([
                    'invoice_no'    => 'INV-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                    'product_id'    => $p->id,
                    'product_name'  => $p->name,
                    'size'          => $p->size,
                    'color'         => $p->color,
                    'quantity'      => $qty,
                    'unit_price'    => $p->price,
                    'total_price'   => $p->price * $qty,
                    'customer_name' => $customers[array_rand($customers)],
                    'sold_at'       => now()->subDays(rand(0, 30))->subMinutes(rand(0, 600)),
                ]);
            }
        }
    }
}
