<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\FormProduct;
use App\Http\Requests\backend\FormUpdateProduct;
use App\Model\Product;
use App\Model\Categories;
use App\Model\Discount;
use App\Model\ProductDetail;
use App\Model\ListImage;
class ProductController extends Controller
{
    private $module = "backend.product";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $product = Product::all();
        $categories = Categories::all();
        $discount = Discount::all();
        $productdetail = ProductDetail::all();
        $listImage = ListImage::all();
        return view($this->module.".list",compact('product','categories','discount','productdetail','listImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categories::all();
        $discount = Discount::all();
        return view($this->module.".create",compact('categories','discount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProduct $request)
    {
        $request->flash();

        // $color = explode(',', $request["color"]);

        if($request->hasFile('image'))
        {
            $files = $request->file('image');
            try{
                $product = Product::create($request->all());
                // save data to table product_detail
                $product->ProductDetails()->create([
                    'rom'=>$request["rom"],
                    'price_product'=>$request["price_product"],
                    'qty'=>$request["qty"]
                ]);
                // save image to table product_detail
                foreach ($files as $file) {
                    $file->move('backend/product_img',$file->getClientOriginalName());
                    ListImage::create([
                        'product_id'=>$product->id,
                        'image'=>$file->getClientOriginalName(),
                    ]);
                }
                return redirect()->route('product.list');
            }catch(Exception $e){
                return back()->with('error','Đã xảy ra lỗi,xin thử lại');
            }
        }else{
            return back()->with('image_error','Chưa chọn ảnh');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::all();
        $discount = Discount::all();
        $product = Product::findOrFail($id);
        $listImage = ListImage::where('product_id',$id)->get();
        return view($this->module.".edit",compact('categories','discount','product','listImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormUpdateProduct $request, $id)
    {
        $checkExtention = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg'];
        $product = Product::findOrFail($id);
        $listImage = $product->ListImages()->get();
        $path = public_path()."/backend/product_img/";
        $temp = -1;
        if($request->hasFile('image'))
        {
            //update product
            $product->update($request->all());
            try{
                foreach ($listImage as $key1 => $value) {
                    foreach ($request->file('image') as $key => $file) {
                        $fileName = $file->getClientOriginalName();
                        // check error image
                        if(in_array($fileName,$checkExtention))
                        {
                            return back()->with('image_error','Ảnh không đúng định dạng jpg,jpeg,png,svg');
                        }
                        else{
                            // update image
                            if($key > $temp)
                            {
                                // check file exists in folder
                                if(file_exists($path.$value->image))
                                {   
                                    unlink($path.$value->image);
                                }
                                // update list image
                                $value->update(['image'=>$fileName]);
                                $file->move('backend/product_img',$fileName);
                                $temp = $key;
                                break;
                            }
                        }
                    }
                }
                return redirect('admin/product/list')->with('success','Cập nhật sản phẩm thành công');
            }catch(Exception $e){
                return back()->with('error','Đã xảy ra lỗi,xin thử lại');
            }
        }
        else{
            return back()->with('image_error','Chưa chọn file');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
