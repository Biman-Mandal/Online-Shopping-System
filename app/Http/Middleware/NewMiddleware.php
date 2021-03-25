<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path=$request->path();
        $LoginSession=session()->get('IsLogin');
        $PaymentSession=session()->get('CustomerDataKey');
        if (($path=='Account') && $LoginSession) {
            return redirect('/')->with('Homesuccess','Allready LoggedIn');
        }
        if (($path=='payment') && !$PaymentSession) {
            return redirect('/')->with('Homesuccess','You Have to varify your address first');
        }
        return $next($request);
    }
}
