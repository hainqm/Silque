<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // $banners = Banner::all();
        $banners = Banner::where('trang_thai', 1)->get();
        // dd($banners);
        $newProducts = Product::latest()->take(6)->get();
        // dd($newProducts);
        $newPosts = Post::latest()->take(4)->get();
        // dd($newPosts);
        $topReviews = Review::orderByDesc('so_sao')->latest()->take(10)->get();
        // dd($topReviews);


        return view('client.home', compact('banners', 'newProducts', 'newPosts', 'topReviews'));
    }
    public function list(Request $request)
    {
        //sử dụng Eloquent
        $query = Product::with('category');
        //    dd($products);//$products là một mảng dữ liệu sản phẩm
        // dd($request->all());





        //Tìm kiếm theo: tên sản phẩm, danh mục, khoảng giá, ngày nhập, trạng thái
        //Tìm kiếm theo tên sản phẩm
        if ($request->filled('ten_san_pham')) {
            $query->where('ten_san_pham', 'like', '%' . $request->ten_san_pham . '%');
        }

        //Tìm kiếm theo danh mục
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }



        // Tìm kiếm theo khoảng giá
        if ($request->filled('gia_min') && $request->filled('gia_max')) {
            $query->whereBetween('gia_khuyen_mai', [$request->gia_min, $request->gia_max]);
        }





        $products = $query->paginate(10);




        //lấy dữ liệu mới nhất
        // $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::all(); // Lấy danh sách tất cả danh mục

        return view('client.list', compact('products', 'categories'));
    }



    public function detail($id)
    {
        // Lấy sản phẩm đang xem, kèm theo thông tin category
        $product = Product::with('category')->findOrFail($id);

        // Lấy 5 sản phẩm khác cùng danh mục (trừ chính sản phẩm này)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(5)
            ->get();

        // Trả dữ liệu cho view
        return view('client.detail', compact('product', 'relatedProducts'));
    }


    public function list_post()
    {
        $posts = Post::latest()->paginate(6); // phân trang 6 bài/ trang
        return view('client.post', compact('posts'));
    }

    public function post_detail($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return view('client.post_detail', compact('post'));
    }
}
