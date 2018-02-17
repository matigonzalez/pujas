<?php

namespace App\Traits\Privileges;

use App\User;

Trait UserData {

    /**
     * Update privileges for one user.
     *
     * @return void
     */
    protected function updateUserPrivileges()
    {  
        $user = User::find($this->request->input('id'));
        $user->privileges = $this->request->input('value');
        $user->save();        
    }

    /**
     * Logically deletes a user.
     *
     * @return void
     */
    protected function destroyUser(){
        $user = User::find($this->request->input('id'));
        $user->deleted = 1;
        $user->save();
    }
    
}

