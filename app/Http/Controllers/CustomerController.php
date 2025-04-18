<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    //hàm lấy ra danh sách danh mục
    public function index(Request $request){
       //sử dụng Eloquent
       $query = Customer::query();

    //Tìm kiếm theo tên danh mục
    if($request->filled('ten_khach_hang')){
        $query->where('ten_khach_hang','like', '%'.$request->ten_khach_hang . '%');
    }

    //Tìm kiếm theo địa chỉ
    if($request->filled('dia_chi')){
        $query->where('dia_chi','like', '%'.$request->dia_chi . '%');
    }



        $customers= $query->paginate(10);

       return view('admin.customers.index',compact('customers'));
    }


    //hiển thị form thêm
    public function create(){

        return view('admin.customers.create');
    }


    //thêm danh khách hàng
    public function store(Request $request){

        $customers = new Customer();


        //validation
        $validateData = $request->validate([
        'ten_khach_hang' => 'required|string|max:255',
        'tuoi'           => 'required|integer|min:1',
        'email'          => 'required|email|unique:customers,email',
        'gioi_tinh'      => 'required|in:Nam,Nữ,Khác',
        'dia_chi'        => 'required|string|max:500'
        ]);



        //Thêm dữ liệu
        $customers::create($validateData);
        return redirect()->route('admin.customers.index');

    }


    //hiển thị form edit
    public function edit($id){
        // dd($id);
        $customers = Customer::query()->findOrFail($id);
        // $customers = Customer::all();
        return view('admin.customers.edit',compact('customers'));

    }

    //update
    public function update(Request $request,$id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $customers = Customer::query()->findOrFail($id);



        //validate
        $validateData = $request->validate([
        'ten_khach_hang' => 'required|string|max:255',
        'tuoi'           => 'required|integer|min:1',
        'email'          => 'required|email|unique:customers,email',
        'gioi_tinh'      => 'required|in:Nam,Nữ,Khác',
        'dia_chi'        => 'required|string|max:500'
        ]);





        $customers->update($validateData);
        return redirect()->route('admin.customers.index');




    }


    //xoá
    public function destroy($id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $customers = Customer::query()->findOrFail($id);

        $customers->delete();
        return redirect()->route('admin.customers.index')->with('success','Đã xoá rồi đấy');

    }
}