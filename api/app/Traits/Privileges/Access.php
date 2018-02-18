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
        $this->middleware(function($request, $next) {
            if (!Auth::id()){
                abort(403, \Lang::get('api.unauthorized'));
            }
            return $next($request);
        });
    }
}

