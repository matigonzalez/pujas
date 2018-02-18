<?php

namespace App\Traits\Privileges;

use App\User;
use App\Bid;
use Illuminate\Support\Facades\Auth;

Trait UserData {

    /**
     * Update privileges for one user.
     *
     * @return void
     */
    protected function updateUserPrivileges()
    {          
        if (Auth::id() != $this->request->id) {
            // Auto-degrade is not allowed.
            User::edit($this->request->id, [
                "privileges" => $this->request->input('value')
            ]);   
        } 
    }

    /**
     * Update privileges for one user.
     *
     * @return void
     */
    protected function getAllUsers()
    {  
        User::edit($this->request->input('id'), [
            "privileges" => $this->request->input('value')
        ]);    
    }

    /**
     * Logically deletes a user.
     *
     * @return void
     */
    protected function destroyUser(){
        if (Auth::id() != $this->request->id) {
            // Self destruction is not allowed.
            User::destroy($this->request->input('id'));
        }
    }
    
    /**
     * Logically deletes a bid.
     *
     * @return void
     */
    protected function destroyBid(){
        Bid::destroy($this->request->input('id'));
    }
    
}

