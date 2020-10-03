<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class manageOrderController extends Controller
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

    public function index(){
        if(!$this->AuthLogin()){ return redirect('admin'); }
        $this->update_qty();
        $data = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_order.customer_id')
            ->join('tbl_payment', 'tbl_payment.payment_id', '=', 'tbl_order.payment_id')
            ->join('tbl_shipping', 'tbl_shipping.shipping_id', '=','tbl_order.shipping_id')
            ->orderBy('order_id', 'desc')->paginate(7);
        return view('backend.order.list_order', array('data'=>$data));
    }

    public function show_order_detail($order_id){
        $product = DB::table('tbl_order_details')
            ->join('tbl_order', 'tbl_order.order_id', '=','tbl_order_details.order_id')
            ->where('tbl_order_details.order_id', $order_id)
            ->paginate(5);

        $customer = DB::table('tbl_order_details')
            ->join('tbl_order', 'tbl_order.order_id', '=','tbl_order_details.order_id')
            ->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_order.customer_id')
            ->first();

        $shipping = DB::table('tbl_shipping')
            ->join('tbl_order', 'tbl_order.shipping_id', '=','tbl_shipping.shipping_id')
            ->where('tbl_order.order_id', $order_id)
            ->first();

        return view('backend.order.order_detail')->with("product", $product)->with('customer', $customer)
            ->with('shipping', $shipping);
    }

    public function update_order_status(Request $request){
        if ($request->order_status ==  0) {
            $order_update = array();
            $order_update['order_status'] = 0;
        }
        else {
            $order_update = array();
            $order_update['order_status'] = 1;
        }

         DB::table('tbl_order')->where('order_id', '=', $request->order_id)
             ->update($order_update);
         return redirect('admin/list-order');
    }
}
