<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bid extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'amount', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * Get the highest Bid on database.
     *
     * @param  string $product_id
     * @return \App\Bid
     */
    protected static function getHighestBid(string $product_id)
    {
        return DB::table('bids')->where('id', $product_id)->max('amount');
    }
}
