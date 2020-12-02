<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductDetail;
use App\Model\AttributeProduct;
use App\Http\Requests\backend\FormAttributeProduct;
class AttributeProductController extends Controller
{
    private $module = "backend.attribute_product";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $productDetail = ProductDetail::findOrFail($id);
        $product = $productDetail->Products()->get();
        $attributeProduct = $productDetail->AttributeProducts()->get();
        
        return view($this->module.".list",compact('product','productDetail','attributeProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $productDetail = ProductDetail::findOrFail($id);
        $product = $productDetail->Products()->get('product_name');
        return view($this->module.'.create',compact('product','productDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormAttributeProduct $request,$id)
    {
        $productDetail = ProductDetail::findOrFail($id);
        $bool = $productDetail->AttributeProducts()
                                ->where('color',$request['color'])
                                ->get()
                                ->isEmpty();
        if($bool)
        {
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName('image');
                $path = public_path()."/backend/attribute_img/".$fileName;
                if(file_exists($path))
                {
                    unlink(public_path()."/backend/attribute_img/".$fileName);
                }
                try{
                    AttributeProduct::create(
                    [
                        'product_id'=>$productDetail->product_id,
                        'product_detail_id'=>$productDetail->id,
                        'color'=>$request['color'],
                        'price_attribute'=>$request['price_attribute'],
                        'qty'=>$request['qty'],
                        'image'=>$fileName
                    ]);
                    $file->move('backend/attribute_img',$fileName);
                    return redirect()->route('attribute_product.list',['id'=>$productDetail->id])->with('success','Thêm mới thành công');
                }catch(Exception $e){
                    return back()->with('error','Lỗi! xin thử lại');
                }
            }else{
                return back()->with('error_image','Ảnh không được để trống'); 
            }
        }else{
            return back()->with('error','Màu đã bị trùng');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$idAttribute)
    {
        $productDetail = ProductDetail::findOrFail($id);
        $product = $productDetail->Products()->get('product_name');
        $attribute = $productDetail->AttributeProducts()->findOrFail($idAttribute);

        return view($this->module.".edit",compact('productDetail','product','attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormAttributeProduct $request, $id , $idAttribute)
    {
        $productDetail = ProductDetail::findOrFail($id);
        $bool = $productDetail->AttributeProducts()
                                ->where('color',$request['color'])
                                ->where('id',$idAttribute)
                                ->get()
                                ->isEmpty();
        $fileName = null;
        if(!$bool)
        {
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName('image');
                $path = public_path()."/backend/attribute_img/".$fileName;
                if(file_exists($path))
                {
                    unlink($path);
                }
                $file->move('backend/attribute_img',$fileName);
            }
            else{
                $fileName = $productDetail->AttributeProducts()->findOrFail($idAttribute)->image;
            }
            try{
                $productDetail->AttributeProducts()
                                ->findOrFail($idAttribute)
                                ->update([
                    'product_id'=>$productDetail->product_id,
                    'product_detail_id'=>$productDetail->id,
                    'color'=>$request['color'],
                    'price_attribute'=>$request['price_attribute'],
                    'qty'=>$request['qty'],
                    'image'=>$fileName
                ]);
                return redirect()->route('attribute_product.list',['id'=>$productDetail->id])->with('success','Cập nhật attribute thành công');
            }catch(Exception $e){
                return back()->with('error','Lỗi! xin thử lại');
            }
        }else{
            if(!$productDetail->AttributeProducts()->where('color',$request['color'])->get()->isEmpty()){
                return back()->with('error','Màu đã bị trùng');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idAttribute)
    {
        try{
            $attribute = AttributeProduct::findOrFail($idAttribute);
            $path = public_path()."backend/attribute_img/".$attribute->image;
            if(file_exists($path))
            {
                unlink($path);
            }
            $attribute->delete();
            return redirect()->route('attribute_product.list',['id'=>$attribute->product_detail_id])->with('success','Cập nhật attribute thành công');
        }
        catch(Exception $e){
            return back()->with('error','Lỗi! xin thử lại');
        }
    }
}
