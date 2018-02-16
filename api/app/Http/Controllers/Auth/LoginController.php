<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidatorController;
use Illuminate\Support\Facades\Auth;



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
     * @return mixed
     */
    public function checkAuth(Request $request)
    {
        $this->validator("loginForm", $request->all());

        if ($this->errors->isEmpty()){
            $credentials = [
                'name' => $request->input('name'),
                'password' => $request->input('password')
            ];
            if(!Auth::attempt($credentials)){
                return response('Not match', 403);
            }
            return response(Auth::user(), 201);
        } 

        return $this->errors;
    }

}
