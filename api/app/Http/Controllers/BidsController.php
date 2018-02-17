<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\Http\Controllers\ValidatorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidsController extends ValidatorController
{

    private $request;
    private $highestBid;
    
    /**
     * Validate bid form.
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Support\MessageBag With validation errors.
     */
    public function newBid(Request $request)
    {                

        $this->validator("newBidForm", $request->all()); 
        if ($this->errors->isEmpty()) {
            //If valid
            $this->request = $request;
            $this->ValidateBidAmount();
        }                    
        return $this->errors;
    } 

    /**
     * Create a new bid instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Bid
     */
    protected function store(array $data)
    {
        return Bid::create([
            'user_id' => Auth::id(),
            'amount' => $data['amount'],
            'product_id' => $data['product']
        ]);
    }

    /**
     * Check bid amount and create a new record.
     *
     * @return mixed
     */
    protected function ValidateBidAmount()
    {        
        $this->highestBid = intval(Bid::getHighestBid($this->product));

        if ($this->highestBid <= $request->input('amount')) {
            return $this->store($request->all());
        }        
        
        $this->errors->add('amount', 'The amount must be greater than the last bid ' + "($this->highestBid)"); 
    }
}
