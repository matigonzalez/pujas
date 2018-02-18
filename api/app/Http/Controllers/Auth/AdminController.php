<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ValidatorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Traits\Privileges as Privilege;
use App\User;



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
     * Validation errors.
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Check if the user has privileges.
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     * 
     */
    public function __construct(){
        $this->middleware(function ($request, $next) {   
            if (
                !Auth::user() || 
                !Auth::user()->privileges
            ) { 
                abort(403, \Lang::get('api.unauthorized')); 
            }

            return $next($request);

        });

    }
    /**
     * Validate admin request.
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Support\MessageBag With validation errors.
     * 
     */
    public function admin(Request $request)
    {         
        
        $action = ($request->action) ? $request->action : 'null';

        if($this->validator($action, $request->all())->errors()->isEmpty()){

            $this->request = $request;
            /*
             * Admin can:
             * 
             * updateUserPrivileges
             * destroyUser
             * createProduct
             * destroyProduct
             * updateProduct
             * uploadImage
             * 
             */
            
            $this->{$request->action}();
        }

        return $this->errors;
    }

    /**
     * List all users.
     *
     * @return App\User
     * 
     */
    public function getAllUsers(){
        return User::get();
    }


}
