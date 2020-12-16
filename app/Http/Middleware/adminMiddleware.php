<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminMiddleware
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
        $data = $request->session()->all();
        if($request->session()->has('user')){
            return $next($request);
        }else{
            return redirect('admin/login');
        }
    }
}
