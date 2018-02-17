<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidatorController;
use Illuminate\Support\Facades\Validator;

class RegisterController extends ValidatorController
{
  
    /**
     * Create a new User and return validation errors.
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Support\MessageBag With validation errors.
     */
    public function processRequest(Request $request) 
    {    
        $this->validator("registerForm", $request->all()); 
        if ($this->errors->isEmpty()) {
            //If valid
            $this->store($request->all());
        }                    
        return $this->errors;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
