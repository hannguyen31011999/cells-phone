<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Post;
use App\Model\User;
class PostController extends Controller
{
    private $module = "backend.post";

    private $id = null;
    // Khởi tạo id khi đăng nhập thành công
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->middleware(function ($request, $next) {
            $this->id = Auth::user()->id;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $post = Post::findOrFail((int)$request->id);
            return view($this->module.'.modal',compact('post'));
        }else{
            $post = Post::all();
            return view($this->module.'.list',compact('post'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->module.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flush();
        $this->validate($request,
            [
                'title'=>'required|max:254',
                'content'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'title.required'=>'Tiêu đề không được trống',
                'title.max'=>'Tiêu đề vượt quá 254 kí tự',
                'content.required'=>'Nội dung bài viết không được trống',
                'image.image'=>'Ảnh không đúng định dạng',
                'image.mimes'=>'Không đúng loại ảnh jpeg,png,jpg,gif,svg',
                'image.max'=>'Kích thước ảnh quá lớn',
                'image.required'=>'Ảnh không được trống'
            ]
        );

        
            if($request->hasFile('image')){
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName('image');
                $path = public_path()."/backend/post/".$fileName;
                if(file_exists($path))
                {
                    return back()->with('error_image','Ảnh đã tồn tại');
                }else{
                    try{
                        $file->move('backend/post',$fileName);
                        Post::create([
                            'title'=>$request->title,
                            'content'=>$request->content,
                            'image'=>$fileName,
                            'user_id_created'=>$this->id
                        ]);
                        return redirect('admin/post/list')->with('success','Thêm mới thành công');
                    }catch(\Exception $e){
                        return back()->with('error','Lỗi! xin thử lại');
                    }
                }
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
        $post = Post::findOrFail($id);
        return view($this->module.'.edit',compact('post'));
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
        $this->validate($request,
            [
                'title'=>'required|max:254',
                'content'=>'required',
                'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'title.required'=>'Tiêu đề không được trống',
                'title.max'=>'Tiêu đề vượt quá 254 kí tự',
                'content.required'=>'Nội dung bài viết không được trống',
                'image.image'=>'Ảnh không đúng định dạng',
                'image.mimes'=>'Không đúng loại ảnh jpeg,png,jpg,gif,svg',
                'image.max'=>'Kích thước ảnh quá lớn'
            ]
        );
        $post = Post::findOrFail($id);
        $array = $request->all();
        $array['user_id_created'] = $this->id;
        if(strcmp($request->title,$post->title)!==0)
        {
            $this->validate($request,
                [
                    'title'=>'unique:post,title'
                ],
                [
                    'title.unique'=>'Tiêu đề đã tồn tại'
                ]
            );
        }else{
            if($request->hasFile('image'))
            {
                // Get fileName and move 
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName('image');
                $path = public_path()."/backend/post/".$fileName;
                // check exists file
                if(file_exists($path))
                {
                    return back()->with('error_image','Ảnh đã tồn tại');
                }else{
                    // delete file in folder
                    unlink(public_path()."/backend/post/".$post->image);
                    // change file name
                    $array['image'] = $fileName;
                    // move file in folder
                    $file->move('backend/post',$fileName);
                }

            }try{
                $post->update($array);
                return redirect('admin/post/list')->with('success','Chỉnh sửa thành công');
            }catch(Exception $e){
                return back()->with('error','Lỗi! xin thử lại');
            }
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
        Post::findOrFail($id)->delete();
        return redirect('admin/post/list');
    }
}
