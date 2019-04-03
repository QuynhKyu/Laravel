<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.homepages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Route cho adminstrator
 */

Route::prefix('admin')->group(function (){
    // gom nhóm cá route cho phần admin

    /**
     * --------------------Route cho adminstrator--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */
    /**
     * URL: authen2.com/admin
     * Route mặc định của admin
     */
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL: authen2.com/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL: authen2.com/admin/register
     * Route trả về view dùng để đki tài khoản admin
     */
    Route::get('register', 'AdminController@create')->name('admin.register');

    /**
     * URL: authen2.com/admin/register
     * phương thức là POST
     * Route dùng để đki admin từ form POST
     */
    Route::post('register', 'AdminController@store')->name('admin.register.store');

    /**
     * URL: authn2.com/admin/login
     * method GET
     * Route trả về view đăng nhập admin
     */
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * URL: authn2.com/admin/login
     * method POST
     * Route xử lý quá trình đăng nhập admin
     */
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * URL: authn2.com/admin/logout
     * method POST
     * Route dùng để đăng xuất admin
     */
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    /**
     * --------------------Route cho shopping--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */
    Route::get('shop/category', 'Admin\ShopCategoryController@index');

    /**
     * Route tạo danh mục
     */
    Route::get('shop/category/create', 'Admin\ShopCategoryController@create');

    /**
     * Route sửa danh mục
     */
    Route::get('shop/category/{id}/edit', 'Admin\ShopCategoryController@edit');

    /**
     * Route xóa danh mục
     */
    Route::get('shop/category/{id}/delete', 'Admin\ShopCategoryController@delete');



    /**
     * Route dùng để lưu trữ dữ liệu khi tạo danh mục (route logic chạy ngầm)
     */
    Route::post('shop/category', 'Admin\ShopCategoryController@store');

    /**
     * Route dùng để lưu trữ dữ liệu khi sửa danh mục (route logic chạy ngầm)
     */
    Route::post('shop/category/{id}', 'Admin\ShopCategoryController@update');

    /**
     * Route dùng để lưu trữ dữ liệu khi xóa danh mục (route logic chạy ngầm)
     */
    Route::post('shop/category/{id}/delete', 'Admin\ShopCategoryController@destroy');


    /**
     * --------------------Route cho shopping product--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */


    Route::get('shop/product', 'Admin\ShopProductController@index');
    Route::get('shop/product/create', 'Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit', 'Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete', 'Admin\ShopProductController@delete');

    Route::post('shop/product', 'Admin\ShopProductController@store');
    Route::post('shop/product/{id}', 'Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete', 'Admin\ShopProductController@destroy');





    Route::get('shop/order', function (){
        return view('admin.content.shop.order.index');
    });

    Route::get('shop/review', function (){
        return view('admin.content.shop.review.index');
    });

    Route::get('shop/customer', function (){
        return view('admin.content.shop.customer.index');
    });

    Route::get('shop/brands', function (){
        return view('admin.content.shop.brands.index');
    });

    Route::get('shop/statistic', function (){
        return view('admin.content.shop.statistic.index');
    });

    Route::get('shop/product/order', function (){
        return view('admin.content.shop.adminorder.index');
    });

    /**
     * --------------------Route cho nội dung--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('content/category', function (){
        return view('admin.content.content.category.index');
    });

    Route::get('content/post', function (){
        return view('admin.content.content.post.index');
    });

    Route::get('content/page', function (){
        return view('admin.content.content.page.index');
    });

    Route::get('content/tag', function (){
        return view('admin.content.content.tag.index');
    });

    /**
     * --------------------Route cho admin menu--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('menu', function (){
        return view('admin.content.menu.index');
    });

    Route::get('menuitems', function (){
        return view('admin.content.menuitems.index');
    });

    /**
     * --------------------Route cho users--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('users', function (){
        return view('admin.content.users.index');
    });

    /**
     * --------------------Route cho media manager--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('media', function (){
        return view('admin.content.media.index');
    });

    /**
     * --------------------Route cho config--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('config', function (){
        return view('admin.content.config.index');
    });

    /**
     * --------------------Route cho Newletters--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('newletters', function (){
        return view('admin.content.newletters.index');
    });

    /**
     * --------------------Route cho banner--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('banner', function (){
        return view('admin.content.banner.index');
    });

    /**
     * --------------------Route cho contact--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('contacts', function (){
        return view('admin.content.contacts.index');
    });

    /**
     * --------------------Route cho email--------------------------
     * ----------------------------------------------------------------------
     * ----------------------------------------------------------------------
     */

    Route::get('email/inbox', function (){
        return view('admin.content.email.index');
    });

    Route::get('email/draft', function (){
        return view('admin.content.email.draft');
    });

    Route::get('email/send', function (){
        return view('admin.content.email.send');
    });






});

/**
 * Route cho các nhà cung cấp sản phẩm (seller)
 */
Route::prefix('seller')->group(function (){

    /**
     * URL: authen2.com/seller
     * Route mặc định của seller
     */
    Route::get('/', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL: authen2.com/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL: authen2.com/seller/register
     * Route trả về view dùng để đki tài khoản seller
     */
    Route::get('register', 'SellerController@create')->name('seller.register');

    /**
     * URL: authen2.com/seller/register
     * phương thức là POST
     * Route dùng để đki admin từ form POST
     */
    Route::post('register', 'SellerController@store')->name('seller.register.store');

    /**
     * URL: authen2.com/seller/login
     * method GET
     * Route trả về view đăng nhập seller
     */
    Route::get('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');

    /**
     * URL: authn2.com/seller/login
     * method POST
     * Route xử lý quá trình đăng nhập seller
     */
    Route::post('login', 'Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    /**
     * URL: authn2.com/seller/logout
     * method POST
     * Route dùng để đăng xuất seller
     */
    Route::post('logout', 'Auth\Seller\LoginController@logout')->name('seller.auth.logout');

});

/**
 * Route cho các nhà vận chuyển (shipper)
 */
Route::prefix('shipper')->group(function (){

    /**
     * URL: authen2.com/shipper
     * Route mặc định của shipper
     */
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL: authen2.com/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL: authen2.com/shipper/register
     * Route trả về view dùng để đki tài khoản shipper
     */
    Route::get('register', 'ShipperController@create')->name('shipper.register');

    /**
     * URL: authen2.com/shipper/register
     * phương thức là POST
     * Route dùng để đki admin từ form POST
     */
    Route::post('register', 'ShipperController@store')->name('shipper.register.store');

    /**
     * URL: authen2.com/shipper/login
     * method GET
     * Route trả về view đăng nhập shipper
     */
    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * URL: authn2.com/shipper/login
     * method POST
     * Route xử lý quá trình đăng nhập shipper
     */
    Route::post('login', 'Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    /**
     * URL: authn2.com/shipper/logout
     * method POST
     * Route dùng để đăng xuất shipper
     */
    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');

});

