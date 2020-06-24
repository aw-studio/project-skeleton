<?php

namespace Tests\Routes;

use Tests\RoutesTestCase;

class SlugRoutesTest extends RoutesTestCase
{
    public $filterUri = [
        'admin*',
        '_debugbar*',
        'test*'
    ];

    /**
     * Testing for GET routes with parameter {slug}.
     */
    public function shouldRouteBeTested($route): bool
    {
        if (!in_array('GET', $route->methods)) {
            return false;
        }

        return $route->parameterNames() == ['slug'];
    }

    /**
     * Run route test.
     */
    public function runRouteTest($route)
    {
        $this->json(
            'GET',
            app('url')->toRoute($route, ['slug' => 'dummy-slug'], false)
        )->assertStatus(404);
    }
}
