<?php

namespace Aon2003\LaravelTrustpilot\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aon2003\LaravelTrustpilot\LaravelTrustpilot
 */
class LaravelTrustpilot extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Aon2003\LaravelTrustpilot\LaravelTrustpilot::class;
    }
}
