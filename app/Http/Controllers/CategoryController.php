<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    //hàm lấy ra danh sách danh mục
    public function index(Request $request){
       //sử dụng Eloquent
       $query = Category::query();

    //Tìm kiếm theo tên danh mục
    if($request->filled('ten_danh_muc')){
        $query->where('ten_danh_muc','like', '%'.$request->ten_danh_muc . '%');
    }

    //Tìm kiếm theo trạng thái
    if($request->filled('trang_thai')){
        $query->where('trang_thai', $request->trang_thai );
    }

        $categories= $query->paginate(10);

       return view('admin.categories.index',compact('categories'));
    }


    //hiển thị form thêm
    public function create(){

        return view('admin.categories.create');
    }


    //thêm danh mục
    public function store(Request $request){

        $categories = new Category();


        //validation
        $validateData = $request->validate([
            'ten_danh_muc'=>'required|string|max:255',
            'trang_thai'=>'required|boolean'
        ]);



        //Thêm dữ liệu
        $categories::create($validateData);
        return redirect()->route('admin.categories.index');

    }


    //hiển thị form edit
    public function edit($id){
        // dd($id);
        $categories = Category::query()->findOrFail($id);
        // $categories = Category::all();
        return view('admin.categories.edit',compact('categories'));

    }

    //update
    public function update(Request $request,$id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $categories = Category::query()->findOrFail($id);



        //validate
        $validateData = $request->validate([
            'ten_danh_muc'=>'required|string|max:255',
            'trang_thai'=>'required|boolean'
        ]);


        //Xử lý ảnh


        $categories->update($validateData);
        return redirect()->route('admin.categories.index');




    }


    //xoá
    public function destroy($id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $categories = Category::query()->findOrFail($id);

        $categories->delete();
        return redirect()->route('admin.categories.index')->with('success','Đã xoá rồi đấy');

    }

}
