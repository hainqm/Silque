<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    //hàm lấy ra danh sách danh mục
    public function index(Request $request){
       //sử dụng Eloquent
       $query = Contact::query();

    //Tìm kiếm theo tên danh mục
    if($request->filled('viet_danh')){
        $query->where('viet_danh','like', '%'.$request->viet_danh . '%');
    }

    //Tìm kiếm theo tên danh mục
    if($request->filled('tieu_de')){
        $query->where('tieu_de','like', '%'.$request->tieu_de . '%');
    }

        $contacts= $query->paginate(10);

       return view('admin.contacts.index',compact('contacts'));
    }


    //hiển thị form thêm
    public function create(){

        return view('admin.contacts.create');
    }


    //thêm danh mục
    public function store(Request $request){

        $contacts = new Contact();


        //validation
        $validateData = $request->validate([
            'viet_danh'       => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'so_dien_thoai'=> 'required|string|max:15',
            'tieu_de'      => 'required|string|max:255',
            'noi_dung'     => 'required|string'
        ]);



        //Thêm dữ liệu
        $contacts::create($validateData);
        return redirect()->route('admin.contacts.index');

    }


    //hiển thị form edit
    public function edit($id){
        // dd($id);
        $contacts = Contact::query()->findOrFail($id);
        // $contacts = Contact::all();
        return view('admin.contacts.edit',compact('contacts'));

    }

    //update
    public function update(Request $request,$id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $contacts = Contact::query()->findOrFail($id);



        //validate
        $validateData = $request->validate([
            'viet_danh'       => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'so_dien_thoai'=> 'required|string|max:15',
            'tieu_de'      => 'required|string|max:255',
            'noi_dung'     => 'required|string'
        ]);


       


        $contacts->update($validateData);
        return redirect()->route('admin.contacts.index');




    }


    //xoá
    public function destroy($id){
        // dd($id);
        //lấy ra thông tin chi tiết
        $contacts = Contact::query()->findOrFail($id);

        $contacts->delete();
        return redirect()->route('admin.contacts.index')->with('success','Đã xoá rồi đấy');

    }
}
