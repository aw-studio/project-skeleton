<?php

namespace Tests\Routes;

use Tests\TestCase;
use Tests\TestRoutes;
use Tests\RoutesTestCase;
use Illuminate\Support\Str;
use PHPUnit\Framework\ExpectationFailedException;

class BaseRoutesTest extends RoutesTestCase
{
    public $filterUri = [
        'admin*',
        '_debugbar*',
        'test*'
    ];

    /**
     * Testing for GET routes without parameters.
     */
    public function shouldRouteBeTested($route): bool
    {
        if (!in_array('GET', $route->methods)) {
            return false;
        }

        return empty($route->parameterNames());
    }

    /**
     * Run route test.
     */
    public function runRouteTest($route)
    {
        $this->get($route->uri)->assertStatus(200);
    }
}
