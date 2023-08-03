<?php

namespace App\Http\Controllers;

use App\Exceptions\PasswordNotProvidedException;
use App\User;
use Exception;

class UserController
{
    public function login($request){

        if(empty($request->username)){
            throw new Exception("No username provided");
        }

        if(empty($request->password)){
            throw new PasswordNotProvidedException("No password provided");
        }

        return new User();
    }
}
