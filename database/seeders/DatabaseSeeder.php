<?php
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 99.99,
            'asin' => 'B0CHH6X6H2'
        ]);
    }
}