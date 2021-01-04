<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use Session;
use App\Model\AttributeProduct;
use App\Model\Product;
use Carbon\Carbon;
class CartController extends Controller
{
	private $module = "frontend.header";

	private $module_cart = "frontend.cart";


	public function index(Request $request)
	{
		if(!empty($request->action)){
			Session::forget('cart');
			return view('frontend.cart.shoppingcart');
		}else{
			return view('frontend.cart.shoppingcart');
		}
	}

	public function addCart(Request $request)
	{
		$oldCart = !empty(Session('cart')) ? Session('cart') : null;
		$newCart = new Cart($oldCart);
		if($request->ajax())
		{
			try{
				$quantity = AttributeProduct::findOrFail($request->id)->qty;
				$temp = !empty(Session('cart')->products[$request->id]['qty']) ? Session('cart')->products[$request->id]['qty'] : 0;
				if($quantity<=(int)$request->qty){
					return response()->json(['messenger'=>'Sản phẩm không đủ hàng'],500); 
				}else{
					if(Session::has('cart')&&$quantity<=($temp+$request->qty)){
						return response()->json(['messenger'=>'Sản phẩm không đủ hàng'],500);
					}else{
						$attribute = AttributeProduct::findOrFail($request->id);
						$productName = $attribute->Products()->get(['product_name'])[0]->product_name." ".$attribute->ProductDetails()->get(['rom'])[0]->rom."GB";
						$price = $attribute->price_attribute;
						$discount = Product::findOrFail($attribute->Products()->get(['id'])[0]->id)
												->Discounts()
												->where('discount_end','>',Carbon::now('Asia/Ho_Chi_Minh'))
												->first();
						$vourcher = (!empty($discount)) ? $discount->discount_value : 0;
						$color = $attribute->color;
						$image = $attribute->image;
						$qty = $request->qty;
						$product = ['productName'=>$productName,'price'=>$price,'color'=>$color,'image'=>$image,'discount'=>$vourcher,'qty'=>$qty];
						$newCart->addCart($product,$request->id);
						Session(['cart'=>$newCart]);
						return view($this->module.".cart");
					}
				}
			}catch(\Exception $e){
				return response()->json(['messenger'=>'Thêm giỏ hàng thất bại'],500);
			}
		}
	}

	public function updateCart(Request $request)
	{
		$oldCart = !empty(Session('cart')) ? Session('cart') : null;
		$newCart = new Cart($oldCart);
		if($request->ajax())
		{
			$quantity = AttributeProduct::findOrFail($request->id)->qty;
			if($quantity<($oldCart->products[$request->id]['qty']+$request->qty)){
				return response()->json(['messenger'=>'Sản phẩm không đủ hàng','data'=>Session('cart')],500); 
			}else{
				$newCart->updateCart($request->id,$request->qty);
				Session(['cart'=>$newCart]);
				return response()->json(['data'=>Session('cart')],200);
			}
		}
	}

	public function deleteCart(Request $request)
	{
		$oldCart = !empty(Session('cart')) ? Session('cart') : null;
		$newCart = new Cart($oldCart);
		if($request->ajax())
		{
			$newCart->deleteCart($request->id);
			Session(['cart'=>$newCart]);
			if(empty(Session('cart')->products)){Session::forget('cart');}
			return view($this->module.".cart");
		}
	}
}
