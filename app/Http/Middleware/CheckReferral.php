<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckReferral
{
    public function handle($request, Closure $next)
    {
        if ($request->hasCookie('referral')) {
            return $next($request);
        }

        if (($ref = $request->query('ref')) && app(config('referral.user_model', 'App\User'))->referralExists($ref)) {
            return redirect($request->fullUrl())->withCookie(cookie()->forever('referral', $ref));
        }

        // if there is no refer abort not found
        return abort(404);
    }
}
