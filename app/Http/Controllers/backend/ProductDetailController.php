<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\FormProductDetail;
use App\Http\Requests\backend\FormProductDetailUpdate;
use App\Model\Product;
use App\Model\ProductDetail;
class ProductDetailController extends Controller
{
    private $module = "backend.product_detail";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $id = $product->id;
        $productDetail = $product->ProductDetails()->get();
        return view($this->module.".list",compact('product','id','productDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view($this->module.".create",compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProductDetail $request,$id)
    {
        try{
            $product = Product::findOrFail($id)
                        ->ProductDetails()
                        ->create($request->all());
            return redirect()->route('product_detail.list',['id'=>$id])->with('success','Thêm sản phẩm thành công');
        }catch(Exception $e){
            return back()->with('error','Đã xảy ra lỗi! xin thử lại');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$idDetail)
    {
        $product = Product::findOrFail($id);
        $productDetail = $product->ProductDetails()->findOrFail($idDetail);
        return view($this->module.".edit",compact('product','productDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormProductDetailUpdate $request, $id,$idDetail)
    {
        try{
            Product::findOrFail($id)
                    ->ProductDetails()
                    ->findOrFail($idDetail)
                    ->update($request->all());
            return redirect()->route('product_detail.list',['id'=>$id])->with('success','Cập sản phẩm thành công');
        }catch(Exception $e){
            return back()->with('error','Đã xảy ra lỗi! xin thử lại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idDetail)
    {
        try{
            $product = Product::findOrFail($id);
            $product->ProductDetails()->findOrFail($idDetail)->delete();
            return redirect()->route('product_detail.list',['id'=>$product->id]);
        }catch(Exception $e){
            return back()->with('error','Đã xảy ra lỗi,xin thử lại');
        }
    }
}
