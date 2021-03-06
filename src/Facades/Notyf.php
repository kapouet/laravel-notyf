<?php

namespace Kapouet\Notyf\Facades;

use Illuminate\Support\Facades\Facade;

class Notyf extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'notyf';
    }
}
