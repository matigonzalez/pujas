<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\ValidatorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class AdminController extends ValidatorController
{
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
     * @return void
     */
    public function admin(Request $request)
    {      
        if(Auth::user()->privileges && $this->validator($request->action, $request->all())->errors()->isEmpty()){
            $this->request = $request;
            $this->{$request->action}();
        }
    }

    /**
     * Update privileges for one user.
     *
     * @return void
     */
    protected function updatePrivileges()
    {  
        $user = User::find($this->request->input('id'));
        $user->privileges = $this->request->input('value');
        $user->save();        
    }

}
