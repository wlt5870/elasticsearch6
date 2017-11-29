<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class WebCheck extends BaseEncrypter
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    public function handle($request, Closure $next)
    {
        //if (! $request->user()->hasRole($role)) {
        //    // Redirect...
        //}

        return $next($request);
    }
}
