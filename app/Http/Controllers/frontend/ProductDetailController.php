<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slug;
use App\Model\Product;
use App\Model\ListImage;
use App\Model\ProductDetail;
use App\Model\AttributeProduct;

class ProductDetailController extends Controller
{
	private $module = "frontend.product_detail";
	public function index(Request $request,$name)
	{
		$slug = Slug::where('url','like','%'.$name.'%')->get();
		$products = Product::findOrFail($slug[0]->product_id);
		$productDetail = ProductDetail::findOrFail($slug[0]->product_detail_id);
		$attribute = $productDetail->AttributeProducts()->get();
		$listImage = $products->ListImages()->get();
		$related = Product::where('categories_id',$products->categories_id)
								->with(['ProductDetails'])
								->orderBy('created_at','desc')
								->take(8)
								->get();
		$totalSlugs = $products->slugs()->get();
		$discount = $products->Discounts()->get('discount_value')[0]->discount_value;
		$name = $products->product_name." ".$productDetail->rom."GB";
		return view($this->module.'.page_product_detail',compact('products','productDetail','attribute','listImage','related','name','discount','totalSlugs'));
	}
}
