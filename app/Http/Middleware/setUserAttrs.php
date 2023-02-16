<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class setUserAttrs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang  = config("app.locale");
        $mode = config('app.mode');

        if($nlang = Session::get('lang')) $lang = $nlang;
        if($nmode = Session::get('mode')) $mode = $nmode;

        // if user authenticated
        if($user = auth()->user()){
            $lang = $user->lang;
            $mode = $user->mode;
        }

        App::setLocale($lang);
        Carbon::setLocale($lang);

        Session::put('lang',$lang);
        Session::put('mode',$mode);

        return $next($request);
    }
}
