<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\tbl_payment;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Model\product;
use App\Model\customer;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
session_start();
class checkoutController extends Controller
{
    public function login_checkout(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

        if(session('customer_email') == null){
            return redirect('show-login');
        }
        else{
            return view('frontend.checkout', array(
                "category"=>$category,
                "brand"=>$brand,
                "content"=>Cart::content()
            ));
        }
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_note'] = $request->shipping_note;
        $shipping_id = DB::table('tbl_shipping')->insertGetID($data);

        session()->put('shipping_id', $shipping_id);
        session()->put('shipping_name', $request->shipping_name);
        session()->put('shipping_phone', $request->shipping_phone);
        session()->put('shipping_email', $request->shipping_email);
        session()->put('shipping_address', $request->shipping_address);
        session()->put('shipping_note', $request->shipping_note);

        return redirect('payment');
    }

    public function show_payment(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        return view('frontend.cart.payment', array(
            "category"=>$category,
            "brand"=>$brand,
            "content"=>Cart::content()
        ));
    }

    public function save_order(Request $request){
        $data = array(
            "payment_method"=>$request->payment_method,
            "payment_status"=>"đang chờ xử lý"
        );
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        $data_2 = array(
            "customer_id"=>session('customer_id'),
            "shipping_id"=>session('shipping_id'),
            "payment_id"=>$payment_id,
            "order_total"=>Cart::priceTotal(),
            "order_status"=>0,
            "order_time"=>Carbon::now()
        );

        $order_id = DB::table('tbl_order')->insertGetId($data_2);
        $content = Cart::content();
        foreach ($content as $rows) {
            DB::table('tbl_order_details')->insert(array(
                "order_id" => $order_id,
                "product_id" => $rows->id,
                "product_name" => $rows->name,
                "product_price" => $rows->price,
                "product_sale_qty" => $rows->qty,
                "date_c" => time(),
            ));
        }

        //update lại số lượng trong tbl_product
        foreach ($content as $rows) {
            $so_luong_ban_dau =   DB::table('tbl_product')->where('product_id',$rows->id)->value('product_so_luong');
            $so_luong_ban_ban_dau =   DB::table('tbl_product')->where('product_id',$rows->id)->value('product_so_luong_ban');
            DB::table('tbl_product')
                ->where('product_id','=',$rows->id)
                ->update(array(
                "product_so_luong"=> $so_luong_ban_dau - $rows->qty,
                "product_so_luong_ban"=> $so_luong_ban_ban_dau + $rows->qty
            ));
        }

        /*
        $data_email = array();
        Mail::send ( 'frontend.email_blank', $data_email, function ($sendemail) {
            $sendemail->from ( 'facebook19051999@gmail.com', 'VA-store');
            $sendemail->to ( session('shipping_email') , 'Van Anh' )->subject ('Đặt hàng thành công') ;
        });
        */

        session()->put("payment_menthod", $data["payment_method"]);

        if ($data["payment_method"] == 1) {
            Cart::destroy();
            return redirect('show-cart')->with("order-message", "Đặt hàng thành công, kiểm tra email của bạn.");
        }
        else {
            echo "Thanh toán qua thẻ ATM";
        }
    }
}
