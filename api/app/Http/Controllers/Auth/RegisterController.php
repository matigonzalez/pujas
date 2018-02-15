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
     * @return Illuminate\Support\MessageBag With validation errors.
     */
    public function processRequest(Request $request) {    

        if ($this->isValid($request)) {
            $this->store($request->all());
        }        
            
        return $this->errors;
    }


    /**
     * Set validation errors.
     *
     * @return boolean
     */
    protected function isValid(Request $request){  

        // Check for validation errors:    
        $this->validator("registerForm", $request->all()); 

        // Check for existing username:      
        if (User::where('name', '=', $request->name)->exists()) {
            $this->errors->add('name', 'Username already exist!');
        }        

        return $this->errors->isEmpty();
        
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
