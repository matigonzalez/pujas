<?php

use Illuminate\Database\Seeder;

use App\Bid;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bid::create(['product_id' => 1,'user_id' => 1, "amount" => 100]);   
        Bid::create(['product_id' => 2,'user_id' => 2, "amount" => 320]);  
    }
}
