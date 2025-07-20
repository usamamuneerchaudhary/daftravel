<?php

namespace UsamamuneerChaudhary\Daftravel\Facades;

use Illuminate\Support\Facades\Facade;

class Daftravel extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'daftravel';
    }
}
