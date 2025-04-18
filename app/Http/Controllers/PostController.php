<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    //hàm lấy ra danh sách post
    public function index(Request $request){
       //sử dụng Eloquent
       $query = Post::query();

    //Tìm kiếm theo tên post
    if($request->filled('tieu_de')){
        $query->where('tieu_de','like', '%'.$request->tieu_de . '%');
    }


        $posts= $query->paginate(10);

       return view('admin.posts.index',compact('posts'));
    }


    //hiển thị form thêm
    public function create(){

        return view('admin.posts.create');
    }


    //thêm post
    public function store(Request $request){

        $posts = new Post();


        //validation
        $validateData = $request->validate([
            'tieu_de'      => 'required|string|max:255',
            'tac_gia'      => 'required|string|max:255',
            'mo_ta'        => 'nullable|string',
            'anh_bai_viet' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Chỉ chấp nhận ảnh dưới 2MB

        ]);


        //xử lý ảnh
        if($request->hasFile('anh_bai_viet')){
            $imagePath = $request->file('anh_bai_viet')->store('images/posts','public');
            $validateData['anh_bai_viet']= $imagePath;
        }

        //Thêm dữ liệu
        $posts::create($validateData);
        return redirect()->route('admin.posts.index');

    }


    //hiển thị form edit
    public function edit($id){
        // dd($id);
        $posts = Post::query()->findOrFail($id);
        // $posts = post::all();
        return view('admin.posts.edit',compact('posts'));

    }

    //update
    public function update(Request $request,$id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $posts = Post::query()->findOrFail($id);



        //validate
        $validateData = $request->validate([
            'tieu_de'      => 'required|string|max:255',
            'tac_gia'      => 'required|string|max:255',
            'mo_ta'        => 'nullable|string',
            'anh_bai_viet' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Chỉ chấp nhận ảnh dưới 2MB

        ]);


        //Xử lý ảnh
        if($request->hasFile('anh_bai_viet')){
            $imagePath = $request->file('anh_bai_viet')->store('images/posts','public');
            $validateData['anh_bai_viet']= $imagePath;
        }


        $posts->update($validateData);
        return redirect()->route('admin.posts.index');




    }


    //xoá
    public function destroy($id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $posts = Post::query()->findOrFail($id);

        $posts->delete();
        return redirect()->route('admin.posts.index')->with('success','Đã xoá rồi đấy');

    }
}