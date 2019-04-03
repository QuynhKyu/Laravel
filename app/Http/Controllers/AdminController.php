<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    /**
     * hàm khởi tạo của class sẽ được chạy ngay khi khởi tạo đối tượng
     * hàm luôn đc chạy trc các hàm khác trong class
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }

    /**
     * phương thức trả về view khi đăng nhập thành công
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function index(){

        return view('admin.dashboard');
    }

    /**
     * phương thức trả về view dùng để đki tài khoản admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function create(){

        return view('admin.auth.register');
    }

    public  function store(Request $request){

        // validate dữ liệu từ form đi
        $this->validate($request, array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        // khởi tạo model để lưu admin mới
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt( $request->password); // mã hóa mật khẩu
        $adminModel->save();


        return redirect()->route('admin.auth.login');
    }
}
