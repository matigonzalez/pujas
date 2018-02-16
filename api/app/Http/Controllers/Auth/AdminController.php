<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ValidatorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\Privileges as Privilege;



class AdminController extends ValidatorController
{
    use Privilege\UserData, Privilege\Products;

    /**
     * User incoming request.
     *
     * @var Illuminate\Http\Request
     */
    private $request;

    /**
     * Check if the user has privileges.
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Support\MessageBag With validation errors.
     */
    public function admin(Request $request)
    {      
        if(Auth::user()->privileges && $this->validator($request->action, $request->all())->errors()->isEmpty()){
            $this->request = $request;
            $this->{$request->action}();
        }

        return $this->errors;
    }


}
