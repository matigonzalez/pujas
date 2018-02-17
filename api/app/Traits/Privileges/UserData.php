<?php

namespace App\Traits\Privileges;

use App\User;
use App\Bid;

Trait UserData {

    /**
     * Update privileges for one user.
     *
     * @return void
     */
    protected function updateUserPrivileges()
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
        User::destroy($this->request->input('id'));
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

