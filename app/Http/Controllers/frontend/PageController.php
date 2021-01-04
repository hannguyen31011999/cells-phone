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
use App\Model\Slug;
use App\Model\Visitor;
use Session;
use Carbon\Carbon;
class PageController extends Controller
{
	private $module = "frontend.home";

	public function index(Request $request)
	{
		if($request->ajax()){
			// if(!empty($request->seach)){
			// 	try{
			// 		$productDetail = ProductDetail::whereBetween('price_product',[0,$request->seach])->get();
			// 		$product = Product::where('product_name','like',$request->seach.'%')->get();
			// 		if($product->isEmpty()){
			// 			if(!($productDetail->isEmpty())){
			// 				return $productDetail;
			// 			}
			// 		}else{
			// 			return $product;
			// 		}
			// 	}catch(\Exception $e){

			// 	}
			// }
		}else{
			// Session::forget('compare');
			Visitor::create(['ip'=>$request->ip()]);
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
	}

	public function loadPage(Request $request)
	{
		if($request->ajax()){
			return view('frontend.header.cart');
		}
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
										->where('discount_end','>',Carbon::now('Asia/Ho_Chi_Minh'))
										->first();
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
										->where('discount_end','>',Carbon::now('Asia/Ho_Chi_Minh'))
										->first();
				return response()->json(['data'=>$attribute,'discount'=>$discount],200);
			}catch(Exception $e){

			}
		}
	}

	public function seachQuery(Request $request)
	{
		if(!$request->get('query')){
			return view('frontend.seach.page_seach',['error'=>'Không tìm thấy kết quả']);
		}else{
			try{
				$query = $request->get('query');
				$productDetail = ProductDetail::whereBetween('price_product',[0,$query])
												->orderBy('created_at','desc')
												->take(6)
												->get();
				$product = Product::where('product_name','like',$query.'%')->first();
				if(empty($product)){
					if(!($productDetail->isEmpty())){
						return view('frontend.seach.page_seach',compact('productDetail'));
					}
					else{
						return view('frontend.seach.page_seach',['error'=>'Không tìm thấy kết quả']);
					}
				}else{
					$slug = Slug::where('url',utf8tourl($product->product_name))->first()->url;
					$categories = $product->Categories()->first()->categories_name;
					return redirect()->route('product',['categories'=>$categories,'product'=>$slug]);
				}
			}catch(\Exception $e){

			}
		}
	}
}
