<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;
use Closure;
use Illuminate\Http\Request;

class destockermiddleware
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
        if(Gate::allows("déstocker les courriers")){
            return $next($request);
        }

        return redirect()->route("dashboard");
    }
}
