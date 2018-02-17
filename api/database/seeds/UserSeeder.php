<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'admin','password' => bcrypt('1234'), "privileges" => 1]);    
        User::create(['name' => 'laravel','password' => bcrypt('1234')]);   
    }
}
