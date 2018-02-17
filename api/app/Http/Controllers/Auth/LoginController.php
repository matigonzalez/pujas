<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidatorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;


class LoginController extends ValidatorController
{


    /**
     * Get user information.
     *
     * @return App\User Attributes.
     */
    public function getUserInfo()
    {
        return Auth::user();
    }

    /**
     * End current user session.
     *
     * @return null
     */
    public function logout(Request $request)
    {
        return Auth::logout();
    }
    
    /**
     * Attempt to login with request credentials.
     *
     * @return Illuminate\Support\MessageBag With validation errors.
     */
    public function checkAuth(Request $request)
    {
        $this->validator("loginForm", $request->all());

        if ($this->errors->isEmpty()){
            /*
             * Try to login             
             */
            if(!Auth::attempt([
                'name' => $request->input('name'),
                'password' => $request->input('password')
            ])){ 
                $this->errors->add('password', Lang::get('auth.failed')); 
            }
        } 

        return $this->errors;
    }

}
