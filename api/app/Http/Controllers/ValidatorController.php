<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(string $input, array $data)
    {        
        $validator = Validator::make($data, config('validation')[(new \ReflectionClass($this))->getShortName()][$input]);
        $this->errors = $validator->errors();
        return $validator;
    }
}
