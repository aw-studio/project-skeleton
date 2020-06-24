<?php

namespace Tests;

use Illuminate\Support\Str;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use PHPUnit\Framework\ExpectationFailedException;
use Illuminate\Support\Facades\Route as RouteFacade;

abstract class RoutesTestCase extends TestCase
{
    public $failures = [];

    public $filterUri = [
        'admin*',
        '_debugbar*',
        'test*'
    ];

    public $methods = [];

    public $filterName = [];

    public $routes = [];

    public function setUp(): void
    {
        parent::setUp();

        $this->routes = $this->loadRoutesThatShouldBeTested();
    }

    /**
     * Determine if route should be tested.
     *
     * @param \Illuminate\Routing\Route $route
     * @return boolean
     */
    public abstract function shouldRouteBeTested($route): bool;

    /**
     * Run route test.
     *
     * @param \Illuminate\Routing\Route $route
     * @return void
     */
    public abstract function runRouteTest($route);

    /**
     * @dataProvider getRoutesThatShouldBeTested
     */
    public function testRoutes($route)
    {
        $this->setLocaleForRoute($route);

        try {
            $this->runRouteTest($route);
        } catch (ExpectationFailedException $e) {
            if (!$this->current) {
                throw $e;
            }

            throw new ExpectationFailedException(
                $e->getMessage() . " for [{$this->current->method}] {$this->current->uri}",
                $e->getComparisonFailure()
            );
        }

        $this->current = null;
    }

    public function setLocaleForRoute($route)
    {
        if (!config('translatable')) {
            return;
        }

        if (!Str::startsWith($route->uri, config('translatable.locales'))) {
            return;
        }

        app()->setLocale(explode('/', $route->uri)[0]);
    }

    /**
     * Call the given URI and return the Response.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $parameters
     * @param  array  $cookies
     * @param  array  $files
     * @param  array  $server
     * @param  string|null  $content
     * @return \Illuminate\Testing\TestResponse
     */
    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        $this->current = (object) [
            'method' => $method,
            'uri' => url($uri),
            'parameters' => $parameters,
            'cookies' => $cookies,
            'files' => $files,
            'server' => $server,
            'server' => $server,
            'content' => $content,
        ];

        return parent::call($method, $uri, $parameters, $cookies, $files, $server, $content);
    }

    /**
     * Data provider for "testRoutes".
     *
     * @return array
     */
    public function getRoutesThatShouldBeTested()
    {
        $this->setUp();
        return $this->routes;
    }

    /**
     * Get routes that should be tested
     *
     * @return array
     */
    public function loadRoutesThatShouldBeTested()
    {
        return collect(RouteFacade::getRoutes())->filter(function ($route) {
            if (!$this->validateRouteFilter($route)) {
                return false;
            }

            return $this->shouldRouteBeTested($route);
        })->map(function ($route) {
            return [$route];
        })->toArray();
    }

    /**
     * Validate route filter.
     *
     * @param \Illuminate\Routing\Route $route
     * @return boolean
     */
    public function validateRouteFilter(Route $route): bool
    {
        // Filter uri starts with.
        foreach ($this->filterUri as $filter) {
            if (Str::is($filter, $route->uri)) {
                return false;
            }
        }

        // Filter route names.
        foreach ($this->filterName as $filter) {
            if (Str::is($filter, $route->getName())) {
                return false;
            }
        }

        // Filter methods.
        foreach ($this->methods as $method) {
            if (!in_array($method, $route->methods)) {
                return false;
            }
        }

        return true;
    }
}
