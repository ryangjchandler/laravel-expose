<?php

namespace RyanChandler\LaravelExpose;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RyanChandler\LaravelExpose\LaravelExpose
 */
class LaravelExposeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-expose';
    }
}
