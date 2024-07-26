<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use Session;

class InvalidLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
              
        if($role=='admin')
        {
            if (!$request->session()->has('admin_token')) {
                return redirect('admin');
            } 
        }else if($role=='manager')
        {
            if (!$request->session()->has('manager_token')) {
                return redirect('manager');
            }  
        }else if($role=='store')
        {
            if (!$request->session()->has('store_token')) {
                return redirect('store');
            }  
        }else if($role=='purchase')
        {
            if (!$request->session()->has('purchase_token')) {
                return redirect('purchase');
            }  
        }

        $request['role']=$role;
        
        return $next($request);
    }
}
