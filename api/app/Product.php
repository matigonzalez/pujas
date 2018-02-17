<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        //
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
}
