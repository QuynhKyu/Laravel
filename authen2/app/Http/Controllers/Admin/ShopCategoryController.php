<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends Controller
{
    //
    public function index(){

        $items = DB::table('shop_category')->paginate(10);

        /**
         * đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['cats'] = $items;

        return view('admin.content.shop.category.index', $data);
    }

    public function create(){

        /**
         * đây là biến truyền từ controller xuống view
         */
        $data = array();
        return view('admin.content.shop.category.submit', $data);
    }

    public function edit($id){

        /**
         * đây là biến truyền từ controller xuống view
         */
        $data = array();
        $items = ShopCategoryModel::find($id);
        $data['cat'] = $items;
        return view('admin.content.shop.category.edit', $data);
    }

    public function delete($id){

        /**
         * đây là biến truyền từ controller xuống view
         */
        $data = array();
        $items = ShopCategoryModel::find($id);
        $data['cat'] = $items;
        return view('admin.content.shop.category.delete', $data);
    }

    public function store(Request $request){

        $input = $request->all();

        $items = new ShopCategoryModel();

        $items ->name = $input['name'];
        $items ->slug = $input['slug'];
        $items ->images = $input['images'];
        $items ->intro = $input['intro'];
        $items ->desc = $input['desc'];

        $items->save();
        return redirect('/admin/shop/category');
    }
    public function update(Request $request, $id){

        $input = $request->all();

        $items =  ShopCategoryModel::find($id);

        $items ->name = $input['name'];
        $items ->slug = $input['slug'];
        $items ->images = $input['images'];
        $items ->intro = $input['intro'];
        $items ->desc = $input['desc'];

        $items->save();
        return redirect('/admin/shop/category');

    }
    public function destroy($id){

        $items = ShopCategoryModel::find($id);

        $items->delete();
        return redirect('/admin/shop/category');
    }

}
