<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Slug;
use App\Model\Product;
use App\Model\ListImage;
use App\Model\ProductDetail;
use App\Model\AttributeProduct;
use App\Model\Review;
use App\Model\User;
class ProductDetailController extends Controller
{
	private $module = "frontend.product_detail";
	public function index(Request $request,$name)
	{
		$request->session()->put('urlAction',$name);
		$slug = Slug::where('url','like','%'.$name.'%')->get();
		$products = Product::findOrFail($slug[0]->product_id);
		$productDetail = ProductDetail::findOrFail($slug[0]->product_detail_id);
		$attribute = $productDetail->AttributeProducts()->get();
		$listImage = $products->ListImages()->get();
		$related = Product::where('categories_id',$products->categories_id)
								->with(['ProductDetails','AttributeProducts','Slugs'])
								->orderBy('created_at','desc')
								->take(6)
								->get();
		$totalSlugs = $products->slugs()->get();
		$discount = $products->Discounts()->get('discount_value')[0]->discount_value;
		$name = $products->product_name." ".$productDetail->rom."GB";
		$review = Review::where('product_detail_id',$slug[0]->product_detail_id)
							->orderBy('created_at','desc')
							->get();
		$countReview = $productDetail->CountReview();
		$countStar = [];
		for ($i=5; $i > 0; $i--) { 
			$countStar[] = $productDetail->countStar($i);
		}
		return view($this->module.'.page_product_detail',compact('slug','products','productDetail','attribute','listImage','related','name','discount','totalSlugs','review','countReview','countStar'));
	}

	public function voteReview(Request $request)
	{
		if($request->ajax()){
			$data = [];
			$review = null;
			if(Auth::check()){
				$this->validate($request,
					[
						'point'=>'required',
						'content'=>'required'
					],
					[
						'point.required'=>'Đánh giá không được trống',
						'content.required'=>'Bình luận đang trống'
					]
				);
				$data = [
						'user_id'=>Auth::User()->id,
						'product_id'=>(int)($request->product_id),
						'product_detail_id'=>(int)($request->product_detail_id),
						'name'=>Auth::User()->fullname,
						'email'=>Auth::User()->email,
						'point'=>(int)($request->point),
						'content'=>$request->content,
						'status'=>1
				];
			}else{
				$this->validate($request,
					[
						'point'=>'required',
						'name'=>'required|max:254',
						'email'=>'required|email',
						'content'=>'required'
					],
					[
						'point.required'=>'Đánh giá không được trống',
						'name.required'=>'Tên khách hàng trống',
						'name.max'=>'Tên khách hàng quá dài',
						'email.required'=>'Email đang trống',
						'email.email'=>'Email sai định dạng',
						'content.required'=>'Bình luận đang trống'
					]
				);
				$data = [
					'user_id'=>null,
					'product_id'=>(int)($request->product_id),
					'product_detail_id'=>(int)($request->product_detail_id),
					'name'=>$request->name,
					'email'=>$request->email,
					'point'=>(int)($request->point),
					'content'=>$request->content,
					'status'=>1
				];
			}
			try{
				$review = Review::create($data);
				$productDetail = ProductDetail::findOrFail($review->product_detail_id);
				$review = Review::where('product_detail_id',$review->product_detail_id)				->orderBy('created_at','desc')->get();
				$countStar = [];
				for ($i=5; $i > 0; $i--) { 
					$countStar[] = $productDetail->countStar($i);
				}
				return view('frontend.product_detail.render_review',compact('review','countStar'));
			}catch(Exception $e){
				return response()->json(['messenger'=>'Lỗi! xin thử lại'],500);
			}
		}
	}
}
