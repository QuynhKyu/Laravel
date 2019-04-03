<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //
    /**
     * hàm khởi tạo của class sẽ được chạy ngay khi khởi tạo đối tượng
     * hàm luôn đc chạy trc các hàm khác trong class
     * SellerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }

    /**
     * phương thức trả về view khi đăng nhập thành công
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function index(){

        return view('shipper.dashboard');
    }

    /**
     * phương thức trả về view dùng để đki tài khoản shipper
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function create(){

        return view('shipper.auth.register');
    }

    public  function store(Request $request){

        // validate dữ liệu từ form đi
        $this->validate($request, array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        // khởi tạo model để lưu seller mới
        $shipperModel = new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt( $request->password); // mã hóa mật khẩu
        $shipperModel->save();


        return redirect()->route('shipper.auth.login');
    }
}
