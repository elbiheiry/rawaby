<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {

//    protected function redirectPath(){
//        if (Request::route()->getName() == 'site.confirm'){
//            return redirect()->route('site.register');
//        }else{
//            return redirect()
//        }
//    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard('site')->check()) {
            return redirect('/');
        }

        return $next($request);
    }

}
