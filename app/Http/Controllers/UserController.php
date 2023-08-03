<?php

namespace App\Http\Controllers;

use App\Exceptions\PasswordNotProvidedException;
use App\Services\NotificationService;
use App\User;
use Exception;

class UserController
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function login($request){

        if(empty($request->username)){
            throw new Exception("No username provided");
        }

        if(empty($request->password)){
            throw new PasswordNotProvidedException("No password provided");
        }

        $sent = $this->notificationService->send();

        if(!$sent){
            throw new Exception("Notification was not sent");
        }

        return new User();
    }
}
