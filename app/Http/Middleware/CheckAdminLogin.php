<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->is('admin/*'))
        {
            if(Auth::check()&&(Auth::User()->role==2||Auth::User()->role==1))
            {
                return $next($request);
            }
            return redirect('admin/login')->with('error','Hết phiên đăng nhập');
        }
    }

}
