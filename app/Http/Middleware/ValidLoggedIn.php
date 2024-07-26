<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use Session;

class ValidLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role,$data)
    {
       
        if($role=='admin')
        {            
            if ($request->session()->has('admin_token')) {
                return redirect('admin/dashboard');
            }
        }else if($role=='manager')
        {
            if ($request->session()->has('manager_token')) {
                return redirect('manager/dashboard');
            }
        }else if($role=='store')
        {
            if ($request->session()->has('store_token')) {
                return redirect('store/dashboard');
            }
        }else if($role=='purchase')
        {
            if ($request->session()->has('purchase_token')) {
                return redirect('purchase/dashboard');
            }
        }     

        return $next($request);
    }
}
