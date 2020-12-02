<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\FormDiscountCreate;
use App\Http\Requests\backend\FormUpdateDiscount;
use App\Model\Discount;
class DiscountController extends Controller
{
    private $module = "backend.discount";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = Discount::all();
        return view($this->module.".list",compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->module.".create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormDiscountCreate $request)
    {
        $request->flash();
        try{
            Discount::create($request->all());
            return redirect()->route('discount.list')->with('success','Thêm khuyến mãi thành công');
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
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view($this->module.".edit",compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormUpdateDiscount $request, $id)
    {
        $discount = Discount::findOrFail($id);
        if(strcmp($request['discount_name'],$discount->discount_name)!==0)
        {
            $this->validate($request,
                [
                    'discount_name'=>'unique:discount,discount_name'
                ],

                [
                    'discount_name.unique'=>"Tên khuyến mãi bị trùng"
                ]
            );
        }
        try{
            $discount->update($request->all());
            return redirect()->route('discount.list')->with('success','Cập khuyến mãi thành công');
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
    public function destroy($id)
    {
        try{
            Discount::findOrFail($id)->delete();
            return redirect()->route('discount.list')->with('success','Xóa thành công');
        }catch(Exception $e){
            return back()->with('error','Đã xảy ra lỗi! xin thử lại');
        }
    }
}
