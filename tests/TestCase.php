<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // Ejecutar todos los test en esta URL
    public $baseUrl = "/api/v1/";
}
