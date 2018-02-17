<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ValidatorController extends Controller
{    
    /**
     * A list of validation errors.
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    
    /**
     * Get a validator for an incoming request.
     *
     * @param string $input
     * @param array $data
     * 
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(string $input, array $data)
    {        

        try {       

            /*
             * Get validation rules from validation config file. 
             * 
             */ 
            $validator = Validator::make($data, config('validation')[(new \ReflectionClass($this))->getShortName()][$input]);
        
        } catch (\ErrorException $e) {

            throw new \ErrorException("No validation option for $input");
            
        }

        $this->errors = $validator->errors();
        
        return $validator;

    }
}
