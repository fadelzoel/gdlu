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

        $items = [
            ['Basic White T-Shirt', 40, 12.50, 'M', 'White'],
            ['Black Hoodie', 15, 35.00, 'L', 'Black'],
            ['Slim Fit Jeans', 22, 29.90, 'M', 'Blue'],
            ['Oversized Shirt', 3, 24.00, 'XL', null],
            ['Cargo Pants', 18, 32.00, 'L', 'Khaki'],
            ['Denim Jacket', 8, 55.00, 'M', null],
            ['Polo Shirt', 30, 18.75, 'S', 'Navy'],
            ['Summer Dress', 12, 27.00, 'S', 'Red'],
        ];

        foreach ($items as [$name, $qty, $price, $size, $color]) {
            Product::firstOrCreate(
                ['name' => $name],
                ['quantity' => $qty, 'price' => $price, 'size' => $size, 'color' => $color]
            );
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
