<?php

namespace Tests\Unit;

use App\Exceptions\PasswordNotProvidedException;
use App\Http\Controllers\UserController;
use App\User;
use PHPUnit\Framework\TestCase;
use stdClass;

class SimpleTest extends TestCase
{
    /** @test */
    public function espera_excepcion_al_pasar_password_vacia() : void{

        //esperamos error PasswordNotProvidedException
        $this->expectException(PasswordNotProvidedException::class);
        
        // dada una instancia de Usercontroller
        $userController = new UserController();

        // cuando llamamos a login y no pasamos password en el request
        $request = new stdClass();
        $request->username = 'john_doe';

        $userController->login($request);
    }

    /** @test */
    public function obtiene_usuario_como_resultado() : void{
        
        // dada una instancia de Usercontroller
        $userController = new UserController();

        // cuando pasamos un user y password
        $request = new stdClass();
        $request->username = 'john_doe';
        $request->password = '123456';

        // entonces obtenemos una instancia de User
        $this->assertInstanceOf(User::class, $userController->login($request));

    }
}

/*
En consola correr:
.\vendor\bin\phpunit --debug

*/