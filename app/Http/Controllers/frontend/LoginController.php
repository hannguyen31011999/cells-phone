<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontend\FormLogin;
use App\Model\User;
class LoginController extends Controller
{
    public function Login(FormLogin $request)
    {
        $validated = $request->validated();
        $remember = empty($request["remember"]) ? false : true;
        if(Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']],$remember))
        {
            // xử lý là user
            if(Auth::User()->role==0)
            {
                if(Auth::User()->status!=1)
                {
                    Auth::logout();
                    return back()->with('error','Tài khoản bị khóa');
                }else{
                    if($request->session()->has('urlAction'))
                    {
                        return redirect($request->session()->get('urlAction'));
                    }
                    return redirect()->route('home');
                }
            }else{
                return redirect('admin/dashboard');
            }
        }
        else
        {
            return back()->with('error','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function Logout(Request $request)
    {
        $url = (Auth::User()->role!=0) ? "/login" : "account/login";
        Auth::logout();
        return redirect($url);
    }
}
