<?php

namespace App\Services;

class NotificationService
{
    public function send() : bool{
        sleep(2);

        return (bool) rand(0,1);
    }
}
