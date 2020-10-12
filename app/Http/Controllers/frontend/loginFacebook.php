<?php


namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\customer;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Blade;
use App\Model\social;
use Socialite;
use App\Model\login;
use Carbon\Carbon;
session_start();

class loginFacebook extends Controller
{
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $user_facebook = Socialite::driver('facebook')->user();
        $check_into_tbl_social = DB::table('tbl_social')->where('provider_user_id', $user_facebook->getId())->where('provider','facebook')->first();
        if ($check_into_tbl_social) {
            $get_customer = DB::table('tbl_customer')->where('customer_id', $check_into_tbl_social->user )->first();
            session()->put('customer_avatar', $user_facebook->avatar );
            session()->put('customer_id', $get_customer->customer_id );
            session()->put('customer_name', $get_customer->customer_name );
            session()->put('customer_email', $get_customer->customer_email );
            session()->put('check_change_password', 'dont-show' ); //check view change password

            return redirect('trang-chu')->with('message-login', 'đăng nhập thành công');
        }
        else {
            $customer_id_insert = DB::table('tbl_customer')->insertGetId(array(
                "customer_name"=>$user_facebook->getName(),
                "customer_email"=>$user_facebook->getEmail(),
                "customer_phone"=>"--tài khoản facebook--",
                "customer_password"=>"--tài khoản facebook--",
                "created_at"=>Carbon::now()
            ));
            $customer_just_insert = DB::table('tbl_customer')->where('customer_id', $customer_id_insert )->first();
            DB::table("tbl_social")->insert(array(
                "provider_user_id"=>$user_facebook->getId(),
                "provider"=>"facebook",
                "user"=>$customer_id_insert
            ));
            session()->put('customer_avatar', $user_facebook->avatar );
            session()->put('customer_id', $customer_id_insert);
            session()->put('customer_name', $customer_just_insert->customer_name );
            session()->put('customer_email', $customer_just_insert->customer_email );
            session()->put('check_change_password', 'dont-show' );

            return redirect('trang-chu')->with('message-login', 'đăng nhập thành công');
        }
    }
}
