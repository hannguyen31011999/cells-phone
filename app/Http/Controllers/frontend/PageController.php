<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Product;
use App\Model\ProductDetail;
use App\Model\AttributeProduct;
use App\Model\OrderDetail;
use App\Model\ListImage;
use Session;
class PageController extends Controller
{
	private $module = "frontend.home";

	public function index()
	{
		// Session::forget('compare');
		$product = Product::orderBy('created_at','desc')
							->with(['ProductDetails','ListImages'])
							->take(8)
							->get();
		$data = OrderDetail::groupBy(['attribute_product_id','product_price'])
		    	->selectRaw('sum(qty) as total,attribute_product_id,product_price')
		    	->orderBy('total','desc')
		    	->take(8)
		    	->get();
		$seller = [];
		foreach ($data as $value) {
			$arr = AttributeProduct::findOrFail($value->attribute_product_id)
											->ProductDetails()
											->first();
			if(!in_array($arr,$seller)){
				$seller[] = $arr;
			}
		}
		return view($this->module.'.index',compact('product','seller'));
	}

	public function detailProduct(Request $request)
	{
		if($request->ajax())
		{
			try{
				$productDetail = ProductDetail::findOrFail($request->id);
				$attribute = $productDetail->AttributeProducts()->get();
				$product = $productDetail->Products()->get(['product_name','id']);
				$discount = Product::findOrFail($product[0]->id)
										->Discounts()
										->get('discount_value')[0]
										->discount_value;
				return view($this->module.'.modal_product',compact('productDetail','attribute','product','discount'));
			}catch(Exception $e){

			}
			
		}
	}

	public function changeColorProduct(Request $request)
	{
		if($request->ajax())
		{
			try{
				$attribute = AttributeProduct::findOrFail($request->id);
				$discount = Product::findOrFail($attribute->product_id)
										->Discounts()
										->get('discount_value')[0]
										->discount_value;
				return response()->json(['data'=>$attribute,'discount'=>$discount],200);
			}catch(Exception $e){

			}
		}
	}
}
