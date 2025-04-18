<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    //
    //hàm lấy ra danh sách banner
    public function index(Request $request)
    {
        //sử dụng Eloquent
        $query = Banner::query();

        //Tìm kiếm theo tên banner
        if ($request->filled('tieu_de')) {
            $query->where('tieu_de', 'like', '%' . $request->tieu_de . '%');
        }

        //Tìm kiếm theo trạng thái
        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }

        $banners = $query->paginate(10);

        return view('admin.banners.index', compact('banners'));
    }


    //hiển thị form thêm
    public function create()
    {

        return view('admin.banners.create');
    }


    //thêm banner
    public function store(Request $request)
    {

        $banners = new Banner();


        //validation
        $validateData = $request->validate([
            'tieu_de'      => 'required|string|max:255',
            'mo_ta'        => 'nullable|string',
            'duong_dan_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Chỉ chấp nhận ảnh dưới 2MB
            'trang_thai'   => 'required|boolean'
        ]);


        //xử lý ảnh
        if ($request->hasFile('duong_dan_anh')) {
            $imagePath = $request->file('duong_dan_anh')->store('images/banners', 'public');
            $validateData['duong_dan_anh'] = $imagePath;
        }

        //Thêm dữ liệu
        $banners::create($validateData);
        return redirect()->route('admin.banners.index');
    }


    //hiển thị form edit
    public function edit($id)
    {
        // dd($id);
        $banners = Banner::query()->findOrFail($id);
        // $banners = Banner::all();
        return view('admin.banners.edit', compact('banners'));
    }

    //update
    public function update(Request $request, $id)
    {
        // dd($id);
        //lấy ra thông tin chi tiết
        $banners = Banner::query()->findOrFail($id);



        //validate
        $validateData = $request->validate([
            'tieu_de'      => 'required|string|max:255',
            'mo_ta'        => 'nullable|string',
            'duong_dan_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Chỉ chấp nhận ảnh dưới 2MB
            'trang_thai'   => 'required|boolean'
        ]);


        //Xử lý ảnh
        if ($request->hasFile('duong_dan_anh')) {
            $imagePath = $request->file('duong_dan_anh')->store('images/banners', 'public');
            $validateData['duong_dan_anh'] = $imagePath;
        }


        $banners->update($validateData);
        return redirect()->route('admin.banners.index');
    }


    //xoá
    public function destroy($id)
    {
        // dd($id);
        //lấy ra thông tin chi tiết
        $banners = Banner::query()->findOrFail($id);

        $banners->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Đã xoá rồi đấy');
    }
}
