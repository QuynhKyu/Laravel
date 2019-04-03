<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //

    /**
     * hàm khởi tạo của class sẽ được chạy ngay khi khởi tạo đối tượng
     * hàm luôn đc chạy trc các hàm khác trong class
     * SellerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }

    /**
     * phương thức trả về view khi đăng nhập thành công
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function index(){

        return view('seller.dashboard');
    }

    /**
     * phương thức trả về view dùng để đki tài khoản admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function create(){

        return view('seller.auth.register');
    }

    public  function store(Request $request){

        // validate dữ liệu từ form đi
        $this->validate($request, array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        // khởi tạo model để lưu seller mới
        $sellerModel = new SellerModel();
        $sellerModel->name = $request->name;
        $sellerModel->email = $request->email;
        $sellerModel->password = bcrypt( $request->password); // mã hóa mật khẩu
        $sellerModel->save();


        return redirect()->route('seller.auth.login');
    }
}
