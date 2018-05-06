<?php

namespace Scottybo\LaravelGoogleMyBusiness\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleMyBusinessFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Scottybo\LaravelGoogleMyBusiness\GoogleMyBusiness';
    }
}