<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    //hàm lấy ra danh sách danh mục
    public function index(Request $request){
       //sử dụng Eloquent
       $query = Review::query();

    //Tìm kiếm theo tên danh mục
    if($request->filled('ten_san_pham')){
        $query->where('ten_san_pham','like', '%'.$request->ten_san_pham . '%');
    }


    //tìm kiếm theo số sao
    if($request->filled('so_sao')){
        $query->where('so_sao', $request->so_sao );
    }


        $reviews= $query->paginate(10);

       return view('admin.reviews.index',compact('reviews'));
    }


    //hiển thị form thêm
    public function create(){

        return view('admin.reviews.create');
    }


    //thêm danh mục
    public function store(Request $request){

        $reviews = new Review();


        //validation
        $validateData = $request->validate([
            'ten_nguoi_dung'  => 'required|string|max:255',
            'ten_san_pham'    => 'required|string|max:255',
            'so_sao'          => 'required|integer|min:1|max:5', // Số sao từ 1 - 5
            'noi_dung_danh_gia'        => 'required|string'
        ]);



        //Thêm dữ liệu
        $reviews::create($validateData);
        return redirect()->route('admin.reviews.index');

    }


    //hiển thị form edit
    public function edit($id){
        // dd($id);
        $reviews = Review::query()->findOrFail($id);
        // $reviews = Review::all();
        return view('admin.reviews.edit',compact('reviews'));

    }

    //update
    public function update(Request $request,$id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $reviews = Review::query()->findOrFail($id);



        //validate
        $validateData = $request->validate([
            'ten_nguoi_dung'  => 'required|string|max:255',
            'ten_san_pham'    => 'required|string|max:255',
            'so_sao'          => 'required|integer|min:1|max:5', // Số sao từ 1 - 5
            'noi_dung_danh_gia'        => 'required|string'
        ]);





        $reviews->update($validateData);
        return redirect()->route('admin.reviews.index');




    }


    //xoá
    public function destroy($id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $reviews = Review::query()->findOrFail($id);

        $reviews->delete();
        return redirect()->route('admin.reviews.index')->with('success','Đã xoá rồi đấy');

    }
}