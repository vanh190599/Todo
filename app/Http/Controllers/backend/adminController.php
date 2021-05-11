<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Model\product;
use App\Services\AdminService;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Model\admin;
session_start();
class adminController extends Controller
{
    private $admin;
    private $product;

    public function __construct(admin $admin, product $product)
    {
        $this->admin = $admin;
        $this->product = $product;
    }

    public function Authlogin(){
        $admin_id = session('admin_id');
        if(!$admin_id){
            return false;
        }
        return true;
    }

    public function index(){
        if (! empty(session('admin_id'))) {
            return redirect('admin/dashboard')->w;
        }

        return view('backend.login.admin_login');
    }

    public function show_dashboard(){
        if (! $this->Authlogin())  return redirect('admin');

        $top_sale = $this->product->orderBy('product_so_luong_ban', 'desc')->paginate(10);

        return view('backend.dashboard.index')->with('top_sale', $top_sale);
    }

    public function logout(){
        if (!$this->Authlogin()) return redirect('admin');
        session()->put('admin_id', null );
        session()->put('admin_name', null );

        return redirect('admin');
    }

    public function dashboard(AdminLoginRequest $request){
        $data = $request->only('admin_email', 'admin_password');

        $admin = $this->admin
            ->where('admin_email', $data['admin_email'] )
            ->where('admin_password', md5($data['admin_password']))
            ->first();

        if (!empty($admin)) {
            session()->put('admin_id', $admin->admin_id);
            session()->put('admin_name', $admin->admin_name);
            return redirect('admin/dashboard');
        }

        return back()->with('message', 'Tài khoản hoặc mật khẩu không chính xác!');
    }

    public  function list(Request $request){
        if (!$this->Authlogin()) return redirect('admin');

        $admins = $this->admin;

        if (!empty($request->search )) {
            $admins = $admins->where('admin_name', 'like', '%'.$request->search.'%')
                ->orWhere('admin_email', 'like', '%'.$request->search.'%')
                ->orderBy('admin_id', 'DESC')->paginate(10);
            return view('backend.admin.list', compact('admins'));
        }

        $admins = $admins->orderBy('admin_id', 'DESC')->paginate(10);

        return view('backend.admin.list', compact('admins'));
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
            admin::create($data);
            return redirect()->route('admin.index')->with('add', "Thêm thành công!");
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
}
