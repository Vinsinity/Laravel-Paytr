<?php

namespace Softliya\Paytr\Facades;
use Illuminate\Support\Facades\Facade;
use Softliya\Paytr\PayTR;

class PayTRFacades extends Facade {
    protected static function getFacadeAccessor() { return PayTR::class; }
}