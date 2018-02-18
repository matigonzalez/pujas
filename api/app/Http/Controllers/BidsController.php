<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\Http\Controllers\ValidatorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Privileges\Access;

class BidsController extends ValidatorController
{

    use Access;

    /**
     * User request.
     *
     * @var Illuminate\Http\Request
     */
    private $request;

    /**
     * Biggest bid at the moment for a specific product.
     *
     * @var int
     */
    private $highestBid;
    
    /**
     * Validate bid form.
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Support\MessageBag With validation errors.
     */
    public function newBid(Request $request)
    {            
        if ($this->validator("newBidForm", $request->all())->errors()->isEmpty()) {
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
        $this->highestBid = intval(Bid::getHighestBid($this->request->input('product')));
        if ($this->request->input('amount') > $this->highestBid) {
            // The bid needs to be greater than the last one.
            return $this->store($this->request->all());
        }                
        $this->errors->add('amount', \Lang::get('api.invalidbid') . " ($this->highestBid)"); 
    }
}
