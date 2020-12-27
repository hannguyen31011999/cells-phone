<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slug;
use App\Model\Categories;
class ProductController extends Controller
{
    private $module = "frontend.product";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categories,$product)
    {
        $query = reconvertUTF8($categories);
        $slug = Slug::where('url','like',$product)->first();
        $value = $slug->Products()->first();
        $dataProduct = $slug->Products()->first()->ProductDetails()->get();
        $related = Categories::where('categories_name',$query)
                                ->first()
                                ->Products()
                                ->where('id','!=',$slug->Products()->first()->id)
                                ->orderBy('created_at','desc')
                                ->take(2)
                                ->get();
        return view($this->module.'.page_product',compact('slug','dataProduct','related','value'));
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
