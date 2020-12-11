<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\FormRegister;
use Mail;
use Hash;
use App\Model\User;
class RegisterController extends Controller
{
    public function Register(FormRegister $request)
    {
        if($request['optradio']==1&&$request['agree']==1)
        {
            $data = [
                'email'=>$request['email'],
                'password'=>Hash::make($request['password']),
                'fullname'=>$request['fullname'],
                'gender'=>2,
                'phone'=>$request['phone'],
                'address'=>$request['address'],
                'point'=>0,
                'status'=>0,
                'role'=>0,
                'remember_token'=>$request['_token']
            ];
            try{
                Mail::send('frontend.mail.confirm_register',$data,
                    function($messenger) use ($data){
                        $messenger->to($data["email"],'Hệ thống')->subject('[SmartPhone Quận 9] Xác minh tài khoản?');
                });
                User::create($data);
                return redirect('account/register')->with('success','Đăng kí tài khoản thành công,vui lòng kích hoạt tài khoản qua mail của bạn!');
            }catch(Exception $e){
                return back()->with('mess_error','Bị lỗi! xin vui lòng thử lại');
            }
            // 
        }else{
            return back();
        }
    }

    public function confirmAccount(Request $request)
    {
        if(!empty($request->token))
        {
            try{
                $bool = User::where('remember_token',$request->token)->update(['status'=>1]);
            }catch(Exception $e){
                return back()->with('mess_error','Bị lỗi! xin vui lòng thử lại');
            }
            if($bool)
            {
                return view('frontend.register.confirm_success',['success'=>'Chúc mừng tài khoản bạn đã được kích hoạt']);
            }else{
                return view('frontend.register.confirm_success',['mess_error'=>'Kích hoạt tài khoản thất bại']);
            }
        }else{
            return view('frontend.register.confirm_success');
        }
    }

    public function Confirm(Request $request)
    {
        try{
            $this->validate($request,['email'=>'required|email'],['email.required'=>'Email không được trống','email.email'=>'Email không đúng định dạng']);
            $user = User::where('email','like',$request->email)
                            ->where('role','like',0)
                            ->get();
            if($user->isEmpty())
            {
                return back()->with('error','Tài khoản email không tồn tại');
            }else{
                $data = [
                    'email'=>$request->email,
                    'remember_token'=>$request->_token,
                    'fullname'=>$user[0]->fullname
                ];
                Mail::send('frontend.mail.confirm_register',$data,
                    function($messenger) use ($data){
                        $messenger->to($data["email"],'Hệ thống')->subject('[SmartPhone Quận 9] Xác minh tài khoản?');
                });
                // $user->update(['remember_token'=>$request->_token]);
                return back()->with('success','Gửi xác nhận tài khoản thành công');
            }
        }catch(Exception $e){
            return back()->with('error','Lỗi xảy ra! xin thử lại');
        }
    }
}
