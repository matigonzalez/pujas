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
     * Actual route.
     *
     * @var string
     */
    private $route;

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
        $this->middleware(function (Request $request, $next) {  
             
            if (
                !Auth::user() || 
                !Auth::user()->privileges
            ) { 
                abort(403, \Lang::get('api.unauthorized')); 
            }
            $this->admin($request);
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
        preg_match(
            "/@.+/", 
            Route::getCurrentRoute()->getActionName(), 
            $this->route
        );

        if($this->validator(str_replace("@", "", $this->route[0]), $request->all())->errors()->isEmpty()){
            
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
            
        } else {
            die(serialize($this->errors)); 
        }

        return $this->errors;
    }

}
