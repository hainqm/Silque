<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    //hàm lấy ra danh sách sản phẩm
    public function index(Request $request){
       //sử dụng Eloquent
       $query = Product::with('category');
    //    dd($products);//$products là một mảng dữ liệu sản phẩm
    // dd($request->all());



    //tìm kiếm mã sản phẩm
    if($request->filled('ma_san_pham')){
        $query->where('ma_san_pham','like', '%'.$request->ma_san_pham . '%');
    }

    //Tìm kiếm theo: tên sản phẩm, danh mục, khoảng giá, ngày nhập, trạng thái
    //Tìm kiếm theo tên sản phẩm
    if($request->filled('ten_san_pham')){
        $query->where('ten_san_pham','like', '%'.$request->ten_san_pham . '%');
    }

    //Tìm kiếm theo danh mục
    if($request->filled('category_id')){
        $query->where('category_id', $request->category_id );
    }

    //Tìm kiếm theo trạng thái
    if($request->filled('trang_thai')){
        $query->where('trang_thai', $request->trang_thai );
    }

     // Tìm kiếm theo khoảng giá
    if ($request->filled('gia_min') && $request->filled('gia_max')) {
        $query->whereBetween('gia_khuyen_mai', [$request->gia_min, $request->gia_max]);
    }


     //  Tìm kiếm theo ngày nhập (Từ ngày - Đến ngày)
    if ($request->filled('ngay_nhap_tu') && $request->filled('ngay_nhap_den')) {
        $query->whereBetween('ngay_nhap', [$request->ngay_nhap_tu, $request->ngay_nhap_den]);
    }


    $products= $query->paginate(10);



       //BTVN1
       //Xây dựng master layout của trang admin
       //tạo 1 trang quản trị quản lý sản phẩm
       //hiển thị danh sách sản phẩm ra dưới dạng bảng

       //lấy dữ liệu mới nhất
       $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::all(); // Lấy danh sách tất cả danh mục

       return view('admin.products.index',compact('products','categories'));
    }


        //Hàm hiển thị chi tiết sản phẩm
    public function show($id){
        //    dd($id);
        //lấy dữ liệu thông tin chi tiết
        $products = Product::with('category')->findOrFail($id);
        // dd($products);
        //hiển thị dữ liệu ra màn hình chi tiết sản phẩm
        return view('admin.products.show',compact('products'));

    }


    //hiển thị form thêm
    public function create(){
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function store(Request $request){

        $products = new Product();
        //lấy dữ liệu gửi từ Form
        // $product->ma_san_pham = $request->ma_san_pham;
        // $product->ten_san_pham = $request->ten_san_pham;
        // $product->category_id = $request->category_id;
        // $product->gia = $request->gia;
        // $product->gia_khuyen_mai = $request->gia_khuyen_mai;
        // $product->so_luong = $request->so_luong;
        // $product->ngay_nhap = $request->ngay_nhap;
        // $product->mo_ta = $request->mo_ta;
        // $product->trang_thai = $request->trang_thai;




        //xử lý hình ảnh
        // if($request->hasFile('anh')){
        //     $imagePath = $request->file('anh')->store('images/products','public');
        //     $product->anh= $imagePath;
        // }

        // //Thêm dữ liệu
        // $product->save();

        // return redirect()->route('admin.products.index');



        //validation
        $validateData = $request->validate([
            'ma_san_pham'=>'required|string|max:20|unique:products,ma_san_pham',
            'ten_san_pham'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'gia'=>'required|numeric|max:99999999',
            'gia_khuyen_mai'=>'required|numeric|lt:gia',
            'anh'=>'nullable|image|mimes:jpg,png,jpeg,gif',
            'so_luong'=>'required|integer|min:1',
            'ngay_nhap'=>'required|date',
            'mo_ta'=>'nullable|string',
            'trang_thai'=>'required|boolean'
        ]);

        //Xử lý ảnh
        if($request->hasFile('anh')){
            $imagePath = $request->file('anh')->store('images/products','public');
            $validateData['anh']= $imagePath;
        }

        //Thêm dữ liệu
        $products::create($validateData);
        return redirect()->route('admin.products.index');

    }



    //hiển thị form edit
    public function edit($id){
        // dd($id);
        $products = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit',compact('products','categories'));

    }

    //update
    public function update(Request $request,$id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $products = Product::with('category')->findOrFail($id);


        //validate
        $validateData = $request->validate([
            'ma_san_pham'=>'required|string|max:20|unique:products,ma_san_pham,'.$id,
            'ten_san_pham'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'gia'=>'required|numeric|max:99999999',
            'gia_khuyen_mai'=>'required|numeric|lt:gia',
            'anh'=>'nullable|image|mimes:jpg,png,jpeg,gif',
            'so_luong'=>'required|integer|min:1',
            'ngay_nhap'=>'required|date',
            'mo_ta'=>'nullable|string',
            'trang_thai'=>'required|boolean'
        ]);


        //Xử lý ảnh
        if($request->hasFile('anh')){
            $imagePath = $request->file('anh')->store('images/products','public');
            $validateData['anh']= $imagePath;

            //xoá ảnh cũ
            if($products->image){
                Storage::disk('public')->delete($products->anh);
            }

        }

        $products->update($validateData);
        return redirect()->route('admin.products.index');




    }

    //xoá
    public function destroy($id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $products = Product::with('category')->findOrFail($id);
        //xoá ảnh cũ
            if($products->image){
                Storage::disk('public')->delete($products->anh);
            }
        $products->delete();
        return redirect()->route('admin.products.index')->with('success','Đã xoá rồi đấy');

    }




    // Lấy danh sách sản phẩm đã bị xóa mềm
    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.products.trashed', compact('products'));
    }

    // Khôi phục sản phẩm
    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product) {
            $product->restore();
            return redirect()->route('admin.products.trashed')->with('success', 'Sản phẩm đã được khôi phục!');
        }
        return redirect()->route('admin.products.trashed')->with('error', 'Không tìm thấy sản phẩm!');
    }


    public function forceDelete($id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $products = Product::withTrashed()->findOrFail($id);
        //xoá ảnh cũ
            if($products->image){
                Storage::disk('public')->delete($products->anh);
            }

        $products->forceDelete();
        return redirect()->route('admin.products.trashed')->with('success','Xoá xong đừng hối hận nhé!!!');

    }



}
