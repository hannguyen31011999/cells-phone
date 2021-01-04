<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\User;
use App\Model\OrderDetail;
use App\Model\AttributeProduct;
class OrderController extends Controller
{
    private $module = "backend.order";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            if(!empty($request->id)){
                $order = Order::findOrFail((int)$request->id);
                $orderDetail = $order->OrderDetails()->get();
                return view($this->module.".modal",compact('order','orderDetail'));
            }else{
                $order = null;
                if($request->status=='4'){
                    $order = Order::all();
                }else if($request->status=='3'){
                    $order = Order::where('status',0)->where('payment',1)->get();
                }else{
                    $order = Order::where('status',(int)$request->status)->get();
                }
                return view($this->module.'.content',compact('order'));
            }
            
        }else{

            if($request->type=="false"){
                $order = Order::where('status',0)->orWhere('status',1)->get();
                return view($this->module.'.list',compact('order'));
            }else{
                $order = Order::orderBy('created_at','desc')->get();
                return view($this->module.'.list',compact('order'));
            }
        }
    }

    
    public function update(Request $request)
    {
        if($request->ajax()){
            if(!empty($request->status)&&!empty($request->id)){
                try{
                    $order = Order::findOrFail((int)$request->id);
                    if(!empty($order)){
                        $bool = $order->update(['status'=>(int)$request->status]);
                        if($request->status=="2"){
                            $point = $order->CountOrderDetails();
                            if(!empty($order->customer_id)){
                                $user = $order->Users()->first();
                                $user->point = $user->point + $point;
                                $user->save();
                            }
                            foreach ($order->OrderDetails()->get() as $key => $value) {
                                $product = AttributeProduct::findOrFail($value->attribute_product_id);
                                $product->qty = $product->qty - $value->qty;
                                $product->save();
                            }
                        }
                        if($bool){
                            return response()->json(['messenger'=>'Cập nhật trạng thái thành công'],200);
                        }else{
                            return response()->json(['messenger'=>'Cập nhật trạng thái thất bại'],500);
                        }
                    }
                }catch(\Exception $e){
                    return response()->json(['messenger'=>'Cập nhật trạng thái thất bại'],500);
                }
            }
        }
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        $order->OrderDetails()->delete();
        return redirect()->route('order.list');
    }
}
