<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Compare;
use App\Model\Product;
use App\Model\ProductDetail;
use App\Model\AttributeProduct;
use App\Model\Categories;
class CompareController extends Controller
{
    private $module = "frontend.compare";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->action)&&!empty($request->compare_id)&&!empty($request->product_id&&!empty($request->categories_id))){

            $oldCompare = !(empty(Session('compare'))) ? Session('compare') : null;

            $newCompare = new Compare($oldCompare);

            $categories_name = Categories::findOrFail($request->categories_id)
                                            ->categories_name;
            $product = Product::findOrFail($request->product_id);

            $productDetail = ProductDetail::findOrFail($request->compare_id);

            $name = ProductDetail::findOrFail($request->compare_id)->rom;

            $compare = [
                'categories_name'=>$categories_name,
                'productName'=>$product->product_name." ".$name,
                'desc'=>$product->desc,
                'price'=>$productDetail->price_product,
                'vote'=>null,
                'image'=>$product->ListImages()->get('image')[0]->image,
                'color'=>$productDetail->AttributeProducts()->get()
            ];

            $newCompare->addCompare($request->compare_id,$compare);
            if(!empty($oldCompare)&&count($oldCompare->products)<3){
                Session(['compare'=>$newCompare]);
                return view($this->module.'.page_compare');
            }else if(empty($oldCompare)){
                Session(['compare'=>$newCompare]);
                return view($this->module.'.page_compare');
            }else if(!empty($oldCompare)&&count($oldCompare->products)>2){
                return view($this->module.'.page_compare',['error'=>'Chọn tối đa 3 sản phẩm so sánh']);
            }
        }else{
            return view($this->module.'.page_compare');
        }
    }
    public function destroy($id)
    {
        $oldCompare = !(empty(Session('compare'))) ? Session('compare') : null;
        $newCompare = new Compare($oldCompare);
        $newCompare->deleteCompare($id);
        Session(['compare'=>$newCompare]);
        if(empty(Session('compare')->products)){Session::forget('compare');}
        return redirect('/compare');
    }
}
