<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\tbl_payment;
use Illuminate\Http\Request;
use DB;
use Cart;
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
}
