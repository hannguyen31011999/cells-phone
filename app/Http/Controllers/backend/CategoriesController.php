<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\FormCategories;
use App\Model\Categories;
class CategoriesController extends Controller
{
    private $module = "backend.categories";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return view($this->module.".list",compact('categories'));
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
    public function store(FormCategories $request)
    {
        // old method
        $request->flash();

        //validate form
        $validated = $request->validated();

        //save file in storage
        $path = $request->file('categories_img')->store('categories');

        //get file name
        $image = $request->file('categories_img')->hashName();

        try{
            Categories::create([
                'categories_name'=>$validated["categories_name"],
                'categories_desc'=>$validated["categories_desc"],
                'categories_image'=>$image
            ]);
            return redirect('admin/categories/list');
        }catch(Exception $e){
            return back()->with('error','Lỗi! xin thử lại');
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
