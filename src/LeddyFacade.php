<?php


namespace Mahan\Leddy;


use Illuminate\Support\Facades\Facade;

class LeddyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'leddy';
    }
}
