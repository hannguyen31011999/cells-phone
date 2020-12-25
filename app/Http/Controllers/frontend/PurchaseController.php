<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Order;
use App\Model\OrderDetail;
class PurchaseController extends Controller
{
    private $module = "frontend.purchase";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->id))
        {
            $order = Order::findOrFail($request->id);
            $orderDetail = $order->OrderDetails()->get();
            return view($this->module.'.page_purchase_detail',compact('order','orderDetail'));
        }else if(!empty($request->delete)){
            $order = Order::findOrFail($request->delete);
            $order->update(['status'=>3]);
            $order->delete();
            return redirect('account/purchase');
        }else if(!empty($request->type)){
            $bool = null;
            switch ((int)$request->type) {
                case 1:
                    $order = Order::where('customer_id',Auth::User()->id)
                        ->orderBy('created_at','desc')
                        ->get();
                    return view($this->module.".render_type",compact('order'));
                    break;
                case 2:
                    $order = Order::where('customer_id',Auth::User()->id)
                        ->where('status',0)
                        ->orderBy('created_at','desc')
                        ->get();
                    return view($this->module.".render_type",compact('order'));
                    break;
                case 3:
                    $order = Order::where('customer_id',Auth::User()->id)
                        ->where('status',1)
                        ->orderBy('created_at','desc')
                        ->get();
                    return view($this->module.".render_type",compact('order'));
                    break;
                case 4:
                    $order = Order::where('customer_id',Auth::User()->id)
                        ->where('status',2)
                        ->orderBy('created_at','desc')
                        ->get();
                    return view($this->module.".render_type",compact('order'));
                    break;
                case 5:

                    $order = Order::where('customer_id',Auth::User()->id)
                        ->onlyTrashed()
                        ->orderBy('created_at','desc')
                        ->get();
                    return view($this->module.".render_type",compact('order'));
                    break;
                default:
                    return back()->with('error','Không tìm thấy kết quả');
                    break;
            }
        }else{
            $order = Order::where('customer_id',Auth::User()->id)
                        ->withTrashed()
                        ->orderBy('created_at','desc')
                        ->paginate(4);
            return view($this->module.".page_purchase",compact('order'));
        }
    }
}
