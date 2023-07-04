<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('table_products')->insert(
        //     [
        //         'product_name'  => 'product',
        //         'product_description' => 'Descriptor for product',
        //         'quantity' => 20,
        //         'price' => 100.00,
        //         'serial_number' => '1234567890',
        //     ]
        //     );
        Product::factory()->count(100)->create();
            
    }
}
