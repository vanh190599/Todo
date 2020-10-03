<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use DB;
use Socialite;
session_start();
class customerController extends Controller
{
    public function AuthLogin(){
        $admin_id = session('admin_id');
        if(!$admin_id){
            return false;
        }
        return true;
    }

    public function update_qty(){
        $order_qty = DB::table('tbl_order')->count();
        $order_qty_waitting = DB::table('tbl_order')->where('order_status', 0)->count();
        $order_qty_prosessed = DB::table('tbl_order')->where('order_status', 1)->count();

        $customer_qty = DB::table('tbl_customer')->count();
        $admin_qty = DB::table('tbl_admin')->count();
        $products_qty = DB::table('tbl_product')->count();
        $brand_qty = DB::table('tbl_brand')->count();
        $category_qty = DB::table('tbl_category')->count();

        $news_qty = DB::table('tbl_news')->count();
        session()->put('news_qty', $news_qty);
        $news_category_qty = DB::table('tbl_news_category')->count();
        session()->put('news_category_qty', $news_category_qty);

        session()->put('order_qty', $order_qty);
        session()->put('customer_qty', $customer_qty);
        session()->put('admin_qty', $admin_qty);
        session()->put('product_qty', $products_qty);
        session()->put('category_qty', $category_qty);
        session()->put('order_qty_waitting', $order_qty_waitting);
        session()->put('order_qty_processed', $order_qty_prosessed);
        session()->put('brand_qty', $brand_qty);
    }

    public function list_customer(){
        if(!$this->AuthLogin()){ return redirect('admin'); }
        $data = DB::table('tbl_customer')->orderBy('customer_id', 'desc')->paginate(6);
        return view('backend.list_customer', array("data"=>$data));
    }

    public function delete_customer($customer_id){
        if(!$this->AuthLogin()){ return redirect('admin'); }
        $this->update_qty();
        customer::where('customer_id', '=', $customer_id)->delete();
        return redirect('admin/list-customer')->with('message', "Xóa thành công!");
    }

    public function index(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        return view('frontend.login', array(
            'category'=>$category,
            'brand'=>$brand
        ));
    }

    public function login(Request $request){
        $customer_get = DB::table('tbl_customer')
            ->where('customer_email', $request->customer_email)
            ->where('customer_password', md5($request->customer_password))->first();
        if ($customer_get != null) {
            session()->put('customer_email', $customer_get->customer_email);
            session()->put('customer_name', $customer_get->customer_name);
            session()->put('customer_id', $customer_get->customer_id);
            return redirect('trang-chu')->with('message-login', 'đăng nhập thành công');
        }
        else {
            return redirect('show-login')->with('error-login', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout(){
        session()->flush();
        return redirect()->route('trang-dang-nhap');
    }

    public function register_customer(Request $request){
        $get_customer_to_check = DB::table('tbl_customer')->where('customer_email', $request->customer_email)->first();
        if (!$get_customer_to_check) {
            $data = $request->all();
            $data['customer_password'] = md5($request->customer_password);
            $customer = customer::create($data);
            return redirect('show-login')
                ->with('message-register', 'Đăng ký thành công');
        }
        else {
            return redirect('show-login')->with('message', '* Email đã tồn tại')
                ->with('name', $request->customer_name)
                ->with('email', $request->customer_email)
                ->with('phone', $request->customer_phone);
        }
    }

    public function customer_infor(){
        if (session('customer_email') && session('customer_name')) {
            $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
            $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
            $customer_infor = DB::table('tbl_customer')->where('customer_email', session('customer_email'))->first();
            return view('frontend.customer_infor', array(
                "customer_name"=>$customer_infor->customer_name,
                "customer_email"=>$customer_infor->customer_email,
                "customer_phone"=>$customer_infor->customer_phone,
                "customer_id"=>$customer_infor->customer_id,
                "category"=>$category,
                "brand"=>$brand
            ));
        }
        else {
            return redirect('show-login');
        }
    }

    public function edit_customer(Request $request){
        $customer_get = DB::table('tbl_customer')
            ->where('customer_email', $request->customer_email)->where('customer_password',md5($request->customer_old_password) )
            ->first();
        if ($customer_get) {
            customer::where('customer_id','=', $request->customer_id)
                ->update([
                    "customer_password"=> md5($request->customer_password)
                ]);
            return redirect('customer-infor')->with('edit-complete', 'Thay đổi mật khẩu thành công');
        }
        else {
            return redirect('customer-infor')->with('error', 'Sai mật khẩu');
        }
    }

    //test
    public function login_facebook(Request $request){
        $data = $request->all();
        session()->put('dieu-huong-customer', 1);
        return Socialite::driver('facebook')->redirect();
    }
}
