<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Order::factory()->create([
            'order_id' => '1',
            'product_name' => 'bottle',
            'image' => '/product_images/bottle.jpeg',
            'address' => 'chennai',
            'price' => '87',
            'status' => 1,
        ]);
    }
}
