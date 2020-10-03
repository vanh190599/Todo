<?php


namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\brand;

class brandController extends Controller
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

    public function list_brand(){
        if (!$this->AuthLogin()) return redirect('admin');
        $this->update_qty();

        $data = DB::table("tbl_brand")->orderBy("brand_id", "desc")->paginate(5);
        return view('backend.brand.list_brand', array('data'=>$data));
    }

    public function add_brand(Request $request){
        if (!$this->AuthLogin()) return redirect('admin');
        $formAction = 'admin/do-add-brand';
        return view('backend.brand.add_edit_brand')->with("formAction", $formAction);

    }
    public function do_add_brand(Request $request){
        $data = $request->all();
        $brand = brand::create($data);
        return redirect()->route('danh_sach_thuong_hieu')->with('add', 'thêm thành công !');
    }

    public function edit_brand($brand_id){
        if (!$this->AuthLogin()) return redirect('admin');
        $brand =  DB::table('tbl_brand')->where('brand_id', '=', $brand_id)->first();
        $formAction = "admin/do-edit-brand/".$brand_id;
        return view('backend.brand.add_edit_brand', array('formAction'=>$formAction, 'record'=>$brand));
    }
    public function do_edit_brand(Request $request, $brand_id){
        brand::where('brand_id','=', $brand_id)
        ->update([
            "brand_name" => $request->brand_name,
            "brand_description" => $request->brand_description,
            "brand_status" => $request->brand_status,
        ]);
        return redirect('admin/list-brand')->with("add", "Sửa thành công");
    }

    public function delete_brand($brand_id){
        if (!$this->AuthLogin()) return redirect('admin');
        brand::where('brand_id', '=', $brand_id)->delete();
        return redirect('admin/list-brand')->with('add', 'Xóa thành công');
    }

    public function search_brand(Request $request ){
        if (!$this->AuthLogin()) return redirect('admin');
        $data = DB::table("tbl_brand")
            ->where('brand_name', 'like', '%'.$request->key.'%')
            ->orWhere('brand_description', 'like', '%'.$request->key.'%')
            ->orderBy("brand_id", "desc")->paginate(5);
        return view('backend.brand.list_brand', array("data"=>$data));
    }
}

