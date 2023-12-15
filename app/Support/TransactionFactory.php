<?php

namespace App\Support;

use Illuminate\Http\Request;

class TransactionFactory
{
    public static function make($class, Request $request) {
        return new $class($request);
    }
}
