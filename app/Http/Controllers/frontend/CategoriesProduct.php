<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slug;
use App\Model\Product;
use App\Model\ListImage;
use App\Model\ProductDetail;
use App\Model\AttributeProduct;
use App\Model\Categories;
class CategoriesProduct extends Controller
{
    private $module = "frontend.shop";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$name)
    {
        $name = reconvertUTF8($name);
        try{
            $menu = Categories::where('categories_name','like','%'.$name)
                            ->first()
                            ->Products()
                            ->get();
            $cate = Categories::where('categories_name','like','%'.$name)
                                    ->first()
                                    ->Products()
                                    ->paginate(2);
            $data = Categories::where('categories_name','like','%'.$name)->first();
        }catch(\Exception $e){

        }
        if($request->ajax()){
            if(!empty($request->filter)){
                switch ($request->filter) {
                    case 'high':
                        return view($this->module.'.content_high',compact('cate'));
                        break;
                    case 'low':
                        return view($this->module.'.content_low',compact('cate'));
                        break;
                    default:
                        break;
                }
            }else if(!empty($request->check)){
                $rom = $request->check;
                return view($this->module.'.content_radio',compact('cate','rom'));
            }
        }else{
            return view($this->module.'.page_shop',compact('cate','menu','data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
