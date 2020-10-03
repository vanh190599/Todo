<?php

namespace App\Http\Controllers;


use App\customer;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Blade;
use App\social;
use Socialite;
use App\login;
use App\admin;
session_start();
class adminController extends Controller
{
    public function Authlogin(){
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

    public function index(){
        return view('backend.admin_login');
    }
    public function show_dashboard(){
        if (!$this->Authlogin())  return redirect('admin');
        $this->update_qty();

        return view('backend.dashboard.index');
    }

    public function dashboard(Request $request){
        $login_email = $request->admin_email;
        $login_password = md5($request->admin_password);
        $login = admin::where('admin_email', $login_email)->where('admin_password', $login_password)->first();
        if ( $login != null) {
            session()->put('admin_id', $login->admin_id );
            session()->put('admin_name', $login->admin_name );
            return redirect('admin/dashboard');
        }
        else {
            return view('backend.login.admin_login')->with('loi', 'Email or password not exist !');
        }
    }

    public function logout(){
        if(!$this->Authlogin()){ return redirect('admin'); }
//        session()->put('admin_id', null );
//        session()->put('admin_name', null );
        session()->flush();
        return redirect('admin');
    }

    public  function list(){
        $this->update_qty();
        if (!$this->Authlogin()){ return redirect('admin'); }

        $data = DB::table("tbl_admin")->orderBy("admin_id", "desc")->paginate(5);
        return view('backend.admin.list', array('data'=>$data));
    }

    public function add_admin(){
        if (!$this->Authlogin()) return redirect('admin');
        $formAction = "admin/admin/do-add-admin";
        return view('backend.admin.add_edit_admin', array('formAction'=>$formAction));
    }

    public function do_add_admin(Request $request){
        $admin = DB::table('tbl_admin')->where('admin_email', $request->admin_email )->first();
        if ($admin) {
            return redirect()->route('form_admin')->with('message', "Error: Email đã tồn tại!");
        }
        else {
            $data = $request->all();
            $data["admin_password"] = md5($request->admin_password);
            $ad = admin::create($data);
            return redirect()->route('list_admin')->with('add', "Thêm thành công!");
        }
    }

    public function edit_admin($admin_id){
        if (!$this->Authlogin()) return redirect('admin');
        $admin = DB::table('tbl_admin')->where('admin_id', '=', $admin_id)->first();
        $formAction = "admin/admin/do-edit-admin/".$admin_id;
        return view('backend.admin.add_edit_admin', array('formAction'=>$formAction, 'record'=>$admin));
    }
    public function do_edit(Request $request ,$admin_id){
        /*nếu không nhập mật khẩu thì chỉ edit những thành phân còn lại*/
        if ($request->admin_password == NULL) {
            admin::where('admin_id','=', $admin_id)
                ->update([
                    "admin_name" => $request->admin_name,
                    "admin_phone" => $request->admin_phone,
                ]);
        }
        else {
            admin::where('admin_id','=', $admin_id)
                ->update([
                    "admin_name" => $request->admin_name,
                    "admin_password" => md5($request->admin_password),
                    "admin_phone" => $request->admin_phone,
                ]);
        }
        return redirect()->route('list')->with('add', "Sửa thành công!");
    }

    public function delete($admin_id){
        if (!$this->Authlogin()) return redirect('admin');
        admin::where('admin_id', '=', $admin_id)->delete();
        return redirect()->route('list_admin')->with('add', "Xóa thành công!");
    }

    public function search_admin(Request $request){
        if (!$this->Authlogin()) return redirect('admin');
        $data = DB::table("tbl_admin")
            ->where('admin_name', 'like', '%'.$request->key.'%')
            ->orWhere('admin_email', 'like', '%'.$request->key.'%')
            ->orderBy("admin_id", "desc")->paginate(5);
        return view('backend.admin.list', array("data"=>$data));
    }
}
