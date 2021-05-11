<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Model\product;
session_start();
class cartController extends Controller
{
    public function save_cart(Request $request){
        //$product_infor = DB::table('tbl_product')->where('product_id', $request->product_id)->where('product_status', 1)->first();

        $product_infor = product::where('product_id', $request->product_id)->first();

        if ($product_infor->product_sale_price == 0) {
            $gia_san_pham = $product_infor->product_price;
        }
        else {
            $gia_san_pham = $product_infor->product_sale_price;
        }

        $data['id'] = $product_infor->product_id;
        $data['qty'] = $request->so_luong;
        $data['name'] = $product_infor->product_name;
        $data['price'] = $gia_san_pham;
        $data['weight'] = 1;
        $data['options']['image'] = $product_infor->product_image;
        Cart::add($data);

        return redirect('show-cart');
    }

    public function show_cart(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        return view('frontend.cart.cart',
            array(
                "category"=>$category,
                "brand"=>$brand,
                "content"=>Cart::content()
            )
        );
    }

    public function delete_cart($rowId){
        Cart::remove($rowId);
        return redirect('show-cart');
    }

    public function delete_all_cart(){
        Cart::destroy();
        return redirect('show-cart');
    }

    public function update_cart_qty(Request $request) {
        $product_infor = product::where('product_id', $request->product_id)->first();

        if ($product_infor->product_so_luong < $request->qty) {
            return back()->with('error', 'Số lượng hiện tại không đủ!');
        }

        Cart::update($request->rowId, $request->qty);
        return redirect('show-cart');
    }

    public function tiep_tuc_mua_hang(){
        return redirect('trang-chu');
    }
}
