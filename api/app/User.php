<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\GeneralModel;

class User extends Authenticatable
{
    
    use Notifiable, GeneralModel, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password'
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
