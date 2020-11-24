<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\FormCategories;
use Illuminate\Support\Facades\File;
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

        if($request->hasFile('categories_img'))
        {
            // Get fileName and move 
            $file = $request->file('categories_img');
            $fileName = $file->getClientOriginalName('categories_img');
            $path = public_path()."/backend/categories_img/".$fileName;

            if(file_exists($path))
            {
                return back()->with('error_image','Ảnh đã tồn tại');
            }else{

                $file->move('backend/categories_img',$fileName);
                try{
                    Categories::create([
                        'categories_name'=>$validated["categories_name"],
                        'categories_desc'=>$validated["categories_desc"],
                        'categories_image'=>$fileName
                    ]);
                    return redirect('admin/categories/list')->with('success','Thêm mới thành công');
                }catch(Exception $e){
                    return back()->with('error','Lỗi! xin thử lại');
                }
            }
        }else{
            return back()->with('error_image','Ảnh không được để trống');
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
        $categories = Categories::findOrFail($id);
        if(empty($categories))
            return back()->with('error','Không tìm thấy dữ liệu');
        return view($this->module.".edit",compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormCategories $request, $id)
    {
        // old method

        // $request->flash();

        //validate form
        $validated = $request->validated();

        $array = [
            'categories_name'=>$validated["categories_name"],
            'categories_desc'=>$validated["categories_desc"]
        ];

        $categories = Categories::findOrFail($id);

        if($request->hasFile('categories_img'))
        {
            // Get fileName and move 
            $file = $request->file('categories_img');
            $fileName = $file->getClientOriginalName('categories_img');
            $path = public_path()."/backend/categories_img/".$fileName;
            // check exists file
            if(file_exists($path))
            {
                return back()->with('error_image','Ảnh đã tồn tại');
            }else{
                // delete file in folder
                unlink(public_path()."/backend/categories_img/".$categories->categories_image);
                // move file in folder
                $file->move('backend/categories_img',$fileName);
                $array["categories_image"] = $fileName;
              
            }
        }try{
            $categories->update($array);
            return redirect('admin/categories/list')->with('success','Chỉnh sửa thành công');
        }catch(Exception $e){
            return back()->with('error','Lỗi! xin thử lại');
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
        $categories = Categories::findOrFail($id);
        unlink(public_path()."/backend/categories_img/".$categories->categories_image);
        $categories->delete();
        return redirect('admin/categories/list');
    }
}
