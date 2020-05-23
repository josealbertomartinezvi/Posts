<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // Ejecutar todos los test en esta URL
    public $baseUrl = "/api/v1/";

    // Funcion para la autenticacion en los tests
    public function setUp(): void {

        parent::setUp();

        $this->signIn();

    }

    public function signIn(){

        Passport::actingAs(create('App\User'));

    }
}
