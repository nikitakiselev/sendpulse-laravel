<?php

namespace NikitaKiselev\SendPulse;

use Illuminate\Support\Facades\Facade;
use NikitaKiselev\SendPulse\Contracts\SendPulseApi;

class SendPulse extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SendPulseApi::class;
    }
}