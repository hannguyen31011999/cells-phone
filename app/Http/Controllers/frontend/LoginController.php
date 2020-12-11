<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontend\FormLogin;
use Illuminate\Support\Facades\Cookie;
use App\Rules\CheckEmail;
use App\Model\User;
use Mail;
use Hash;
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
                    return back()->with('error','Tài khoản bị khóa hoặc chưa kích hoạt');
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

    public function mailResetPassword(Request $request)
    {
        if($request->ajax())
        {
            $this->validate($request,
                [
                    'email'=>['required','email','max:254',new CheckEmail]
                ],
                [
                    'email.required'=>'Email không được bỏ trống',
                    'email.email'=>'Không đúng định dạng email',
                    'email.max'=>'Tài khoản email quá dài'
                ]
            );
            try{
                $user = User::where('email',$request->email)->get();
                $data = [
                    'email'=>$request->email,
                    'fullname'=>$user[0]->fullname,
                    'code_token'=>Hash::make($request->email)
                ];
                Mail::send('frontend.mail.confirm_reset_password',$data,
                    function($messenger) use ($data){
                        $messenger->to($data["email"],'Hệ thống')->subject('[SmartPhone Quận 9] Quên mật khẩu?');
                });
                Cookie::queue('code_token',$data['email'],2);
                return view('frontend.modal.success',['success'=>'Gửi xác nhận thành công']);
            }catch(Exception $e){
                return view('frontend.modal.error',['error'=>'Đã xảy ra lỗi!']);
            }
        }
    }

    public function viewRecovery(Request $request)
    {
        if(!empty($request->token)){
            return view('frontend.login.reset_password',['token'=>$request->token]);
        }
    }
    public function confirmReset(Request $request){
        if(!empty($request->token)){
            $this->validate($request,
                [
                    'new_password'=>'required|max:254|min:6',
                    'confirm_password'=>'required|same:new_password'
                ],
                [
                    'new_password.required'=>"Mật khẩu không được trống",
                    'new_password.max'=>'Mật khẩu quá 254 kí tự',
                    'new_password.min'=>'Mật khẩu ít hơn 6 kí tự',
                    'confirm_password.required'=>"Mật khẩu confirm không được trống",
                    'confirm_password.same'=>'Mật khẩu không trùng khớp'
                ]
            );
            if(!empty(Cookie::get('code_token'))){
                if(Hash::check(Cookie::get('code_token'),$request->token)){
                    User::where('email',Cookie::get('code_token'))->update(['password'=>Hash::make($request->new_password)]);
                    return redirect('account/login');
                }else{
                    return back()->with('error','Quá thời hạn đặt lại mật khẩu');
                }
            }else{
                return back()->with('error','Quá thời hạn đặt lại mật khẩu');
            }
        }
    }
}
