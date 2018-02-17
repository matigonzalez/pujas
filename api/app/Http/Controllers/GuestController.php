<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Product;
use Illuminate\Support\Facades\Route;

class GuestController extends Controller
{
    /**
     * Find bids for users or products.
     *
     * @return string
     * 
     */
    public function getBids(int $id)
    {
        $_Model = 'App\\' . ucfirst(explode("/",Route::getCurrentRoute()->uri)[1]);
        $finded = $_Model::find($id);       
        return ($finded) ? $finded : response()->json(["error" => "Nothing found"]);
    }
}
