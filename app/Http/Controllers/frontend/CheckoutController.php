<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontend\FormCreateOrder;
use App\Model\Province;
use App\Model\District;
use App\Model\Ward;
use App\Model\User;
use App\Model\Order;
use App\Model\OrderDetail;
use Mail;
use Carbon\Carbon;
use Session;
class CheckoutController extends Controller
{
    private $module = "frontend.checkout";

    private $vnp_TmnCode = "EOGCBMO4"; // Mã website tại VNPAY 
    private $vnp_HashSecret = "XJGOTNOGROZCWMCRJRBIDUBFTCPMGMWD"; // Chuỗi bí mật
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    private $vnp_Returnurl = "http://localhost:8000/shopping-cart/checkout";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->id_province)){
            $district = Province::findOrFail((int)$request->id_province)
                                    ->Districts()
                                    ->get();
            return response()->json(['district'=>$district],200);
        }else if(!empty($request->id_district)){
            $ward = District::findOrFail((int)$request->id_district)
                                ->Wards()
                                ->get();
            return response()->json(['ward'=>$ward],200);
        }else if(!empty($request->id_ward)){
            $priceShip = Ward::findOrFail((int)$request->id_ward)->price_shipping;
            $totalPrice = Session('cart')->totalPrice + $priceShip;
            return response()->json(['priceShip'=>$priceShip,'totalPrice'=>$totalPrice],200);
        }else if(isset($request->vnp_ResponseCode)){
        	if($request->vnp_ResponseCode=='00')
        	{
        		$order = Order::find($request->vnp_TxnRef);
                if($order->update(['status'=>1])){
                    $request->session()->forget('transaction_id');
                    $request->session()->forget('cart');
                    return view($this->module.".checkout_success");
                }
        	}else{
        		return back()->with('error','Thanh toán trực tuyến thất bại');
        	}
        }
      	else{
            $province = Province::all();
            $request->session()->put('urlAction',$request->url());
            return view($this->module.".page_checkout",compact('province'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrder(Request $request)
    {
        $request->flush();
        if($request->session()->has('cart')){
            $payment = (int)$request->payment;
            $priceShip = 0;
            $order = null;
            $data = [];
            if(Auth::check()){
                $priceShip = (Auth::User()->point>300) ? 10000 : 20000;
                $data = [
                    'customer_id'=>Auth::User()->id,
                    'payment'=>$payment,
                    'note'=>$request->note,
                    'email'=>Auth::User()->email,
                    'name'=>Auth::User()->fullname,
                    'phone'=>Auth::User()->phone,
                    'address'=>Auth::User()->address,
                    'status'=>0,
                    'total_price'=>Session('cart')->totalPrice,
                    'price_ship'=>$priceShip
                ];
            }else{
                // validate info checkout
                $this->validate($request,
                    [
                        'name'=>'required|regex:[^[a-zA-Z]]|max:254',
                        'email'=>'required|max:254|email',
                        'address'=>'required|max:254',
                        'phone'=>'required|numeric|regex:/(0)[0-9]{9}/',
                        'province'=>'numeric',
                        'district'=>'required',
                        'ward'=>'numeric'
                    ],
                    [
                        'name.required'=>'Vui lòng nhập tên đầy đủ',
                        'name.regex'=>'Họ tên có kí tự đặc biệt',
                        'name.max'=>'Họ tên quá dài',
                        'email.required'=>'Vui lòng nhập email',
                        'email.email'=>'Không đúng định dạng email',
                        'email.max'=>'Email quá dài',
                        'phone.required'=>'Vui lòng nhập số điện thoại',
                        'phone.regex'=>'Số điện thoại sai định dạng',
                        'phone.numeric'=>'Số điện thoại phải là số',
                        'address.required'=>'Địa chỉ không được bỏ trống',
                        'address.max'=>'Địa chỉ quá dài',
                        'province.numeric'=>'Chọn tỉnh/tp',
                        'district.required'=>'Chọn quận/huyện',
                        'ward.numeric'=>'Chọn phường/xã'
                    ]
                );
                // create data checkout
                $priceShip = Ward::findOrFail($request->ward)->price_shipping;
                $data = [
                    'payment'=>$payment,
                    'note'=>$request->note,
                    'email'=>$request->email,
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'status'=>0,
                    'total_price'=>Session('cart')->totalPrice,
                    'price_ship'=>$priceShip
                ];
            }
            try{
                $order = Order::create($data);
                if(!empty($order)){
                    foreach (Session('cart')->products as $key => $value) {
                        OrderDetail::create([
                            'order_id'=>$order->id,
                            'attribute_product_id'=>$key,
                            'product_name'=>$value['productName'],
                            'qty'=>$value['qty'],
                            'product_price'=>$value['price'],
                            'discount'=>$value['discount']
                        ]);
                    }
                    if($payment==1){
		                session(['cost_id' => $request->id]);
		                session(['url_prev' => url()->previous()]);
		                $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
		                $vnp_OrderInfo = "Thanh toán hóa đơn trực tuyến cho website Smartphone Quận 9";
		                $vnp_OrderType = 'billpayment';
		                $vnp_Amount = (Session('cart')->totalPrice + $priceShip)*100;
		                    
		                $vnp_Locale = 'vn';

		                $vnp_IpAddr = request()->ip();
		        
		                $inputData = array(
		                    "vnp_Version" => "2.0.0",
		                    "vnp_TmnCode" => $this->vnp_TmnCode,
		                    "vnp_Amount" => $vnp_Amount,
		                    "vnp_Command" => "pay",
		                    "vnp_CreateDate" => date('YmdHis'),
		                    "vnp_CurrCode" => "VND",
		                    "vnp_IpAddr" => $vnp_IpAddr,
		                    "vnp_Locale" => $vnp_Locale,
		                    "vnp_OrderInfo" => $vnp_OrderInfo,
		                    "vnp_OrderType" => $vnp_OrderType,
		                    "vnp_ReturnUrl" => $this->vnp_Returnurl,
		                    "vnp_TxnRef" => $vnp_TxnRef,
		            	);
		    
		            	if (isset($vnp_BankCode) && $vnp_BankCode != "") {
		                	$inputData['vnp_BankCode'] = $vnp_BankCode;
		            	}
		                ksort($inputData);
		                $query = "";
		                $i = 0;
		                $hashdata = "";
		                foreach ($inputData as $key => $value) {
		                    if ($i == 1) {
		                        $hashdata .= '&' . $key . "=" . $value;
		                    } else {
		                        $hashdata .= $key . "=" . $value;
		                        $i = 1;
		                    }
		                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
		                }
		                $this->vnp_Url = $this->vnp_Url . "?" . $query;
		                if (isset($this->vnp_HashSecret)) {
		                    $vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
		                    $this->vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
		                }
		                return redirect($this->vnp_Url);
                    }else{
                        if(Auth::check())
                        {
                            $request->session()->forget('cart');
                            return view($this->module.".checkout_success");
                        }else{
                            $address = $request->address." ".Ward::findOrFail($request->ward)->name." ".District::findOrFail($request->district)->name." ".Province::findOrFail($request->province)->name;
                            $mail = [
                                'email'=>$request->email,
                                'cart'=>Session('cart')->products,
                                'date'=>Carbon::now('Asia/Ho_Chi_Minh'),
                                'discount'=>Session('cart')->totalDiscount,
                                'totalPrice'=>Session('cart')->totalPrice + $priceShip,
                                'price_ship'=>$priceShip,
                                'address'=>$request->address,
                                'name'=>$request->name,
                                'phone'=>$request->phone,
                                'order_id'=>$order->id
                            ];
                            Mail::send('frontend.checkout.checkout_mail',$mail,
                            function($messenger) use ($mail){
                                $messenger->to($mail["email"],'Hệ thống')->subject('[Smart Phone Quận 9] Đơn hàng của bạn?');
                            });
                            $request->session()->forget('cart');
                            return view($this->module.".checkout_success");
                        }   
                    }
                } 
            }catch(\Exception $e){

            }
        }
    }
}
