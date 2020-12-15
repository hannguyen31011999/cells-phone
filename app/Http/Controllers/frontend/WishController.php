<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wish;
use Session;
use App\Model\AttributeProduct;
use App\Model\ProductDetail;
use App\Model\Product;
class WishController extends Controller
{
    private $module = "frontend.wish";
    public function addWish(Request $request)
    {
        $oldWish = !empty(Session('wish')) ? Session('wish') : null;
        $newWish = new Wish($oldWish);
        if($request->ajax())
        {
            try{
                $productDetail = ProductDetail::findOrFail($request->id);
                $name = $productDetail->Products()->get('product_name')[0]->product_name;
                $name = $name." ".$productDetail->rom."GB";
                $image = Product::findOrFail($productDetail->product_id)
                                    ->ListImages()
                                    ->get()[0]->image;
                $color = $productDetail->AttributeProducts()->get();
                $data = [
                    'productName'=>$name,
                    'image'=>$image,
                    'price'=>$productDetail->price_product,
                    'color'=>$color
                ];
                $newWish->addWish($data,$productDetail->id);
                Session(['wish'=>$newWish]);
                $count = count(Session('wish')->products);
                return $count;
            }catch(Exception $e){

            }
        }
    }

    public function changeAttribute(Request $request)
    {
        if($request->ajax()){
            try{
                $attribute = AttributeProduct::findOrFail($request->id_attribute);
                return response()->json(['data'=>$attribute],200);
            }catch(Exception $e){

            }
        }
    }

    public function index(Request $request)
    {
        $oldWish = !empty(Session('wish')) ? Session('wish') : null;
        $newWish = new Wish($oldWish);
        if(!empty($request->delete)){
            try{
                $newWish->deleteWish($request->delete);
                Session(['wish'=>$newWish]);
                if(count(Session('wish')->products)<1){
                    Session::forget('wish');
                }
                return view('frontend.wish.page_wish');
            }catch(Exception $e){

            }
        }else{
            return view('frontend.wish.page_wish');
        }
    }
}
