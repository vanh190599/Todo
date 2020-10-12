<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customer;
use DB;
use Socialite;
session_start();
class customerController extends Controller
{
    public function login(Request $request){
        $customer_get = DB::table('tbl_customer')
            ->where('customer_email', $request->customer_email)
            ->where('customer_password', md5($request->customer_password))->first();
        if ($customer_get != null) {
            session()->put('customer_email', $customer_get->customer_email);
            session()->put('customer_name', $customer_get->customer_name);
            session()->put('customer_id', $customer_get->customer_id);
            return redirect('trang-chu')->with('message-login', 'đăng nhập thành công');
        } else {
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
        } else {
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
        } else {
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
        } else {
            return redirect('customer-infor')->with('error', 'Sai mật khẩu');
        }
    }

    public function index(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        return view('frontend.login', array(
            'category'=>$category,
            'brand'=>$brand
        ));
    }

    /*
    public function login_facebook(Request $request){
        $data = $request->all();
        session()->put('dieu-huong-customer', 1);
        return Socialite::driver('facebook')->redirect();
    }
    */
}
