<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\GeneralModel;

class Product extends Model
{
    use GeneralModel, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'on_sale',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'deleted_at', 'id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bids(){
        return $this->hasMany(Bid::class);
    }

    /**
     * Get all products on sale.
     *
     * @param  string $product_id
     * @return \App\Bid
     */
    protected static function getOnSale()
    {
        return DB::table('products')->where('on_sale', 1)->get();
    }

}
