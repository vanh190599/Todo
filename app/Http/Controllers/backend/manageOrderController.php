<?php


namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
class manageOrderController extends Controller
{
    public function AuthLogin(){
        $admin_id = session('admin_id');
        if(!$admin_id){
            return false;
        }
        return true;
    }

    public function index(){
        if(!$this->AuthLogin()){ return redirect('admin'); }

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
