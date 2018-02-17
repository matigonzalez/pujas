<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name' => 'Product1','image' => 'http://test']); 
        Product::create(['name' => 'Product2','image' => 'http://test']);    
    }
}
