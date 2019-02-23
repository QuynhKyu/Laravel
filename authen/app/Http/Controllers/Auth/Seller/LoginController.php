<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }

    /**
     * phương thức trả về view dùng để đăng nhập cho seller
     */
    public function login(){

        return view('seller.auth.login');
    }

    /**
     * phương thức dùng để đăng nhập cho seller
     * lấy thông tin tin form có method là POST
     */
    public function loginSeller(Request $request){

        // validate dữ liệu đăng nhập
        $this->validate($request, array(
            'email'=> 'required|email',
            'password'=>'required|min:6'

        ));


        //đăng nhập
        if (Auth::guard('seller')->attempt(
            ['email' => $request->email, 'password' => $request->password], $request->remember
        ))
        {
            // nếu đăng nhập thành công thì chuyển hướng về dashboard của seller
            return redirect() -> intended(route('seller.dashboard'));
        }

        // nếu đăng nhập thất bại thì quay trở lị form đăng nhập
        // với giá trị của 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request-> only('email', 'remember'));
    }

    /**
     * phương thức dùng để đăng xuất
     */
    public function logout(){

        Auth::guard('seller')-> logout;

        // chuyển hướng về trang login cùa seller
        return redirect()->route('seller.auth.login');
    }
}
