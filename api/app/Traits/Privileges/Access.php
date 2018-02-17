<?php

namespace App\Traits\Privileges;

use Illuminate\Support\Facades\Auth;

Trait Access {

    /**
     * Check if the user has privileges.
     *
     * @return void
     * 
     */
    public function __construct(){  
        if (!Auth::id()){
            abort(403, 'Unauthorized action.');
        }
    }
}

