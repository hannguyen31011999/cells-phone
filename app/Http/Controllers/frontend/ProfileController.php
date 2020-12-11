<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Rules\CheckPassword;
use App\Model\User;
use App\Http\Requests\frontend\FormUpdateProfile;
use App\Http\Requests\frontend\FormUpdatePassword;
use Hash;
class ProfileController extends Controller
{
    private $module = "frontend.profile";
    private $modal = "frontend.modal";
    private $id;

    // Khởi tạo id khi đăng nhập thành công
    public function __construct()
    {
        $this->middleware('CheckLogin');
        $this->middleware(function ($request, $next) {
            $this->id = Auth::user()->id;
            return $next($request);
        });
    }

    public function updateProfile(FormUpdateProfile $request)
    {
        if($request->ajax())
        {
            try{
                $user = User::findOrFail($this->id);
                $bool = $user->update($request->all());
                if($bool){
                    return view($this->modal.".success",['success'=>'Cập nhật hồ sơ']);
                }
                return view($this->modal.".error",['error'=>'Đã xảy ra lỗi']);
            }catch(Exception $e){
                return view($this->modal.".error",['error'=>'Đã xảy ra lỗi']);
            }
        }
    }

    public function updatePassword(FormUpdatePassword $request)
    {
        if($request->ajax())
        {
            try{
                $user = User::findOrFail($this->id);
                $bool = $user->update(['password'=>Hash::make($request['new_password'])]);
                if($bool){
                    return view($this->modal.".success",['success'=>'Cập mật khẩu thành công']);
                }
                return view($this->modal.".error",['error'=>'Đã xảy ra lỗi']);
            }catch(Exception $e){
                return view($this->modal.".error",['error'=>'Đã xảy ra lỗi']);
            }
        }
    }

}
