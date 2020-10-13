<?php

namespace App\Http\Controllers\backend;

use App\Model\brand;
use App\Model\category;
use Illuminate\Http\Request;
use DB;
use App\Model\product;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class productController extends Controller
{
    public function AuthLogin(){
        $admin_id = session('admin_id');
        if(!$admin_id){
            return false;
        }
        return true;
    }

    public function list_product(){
        if (!$this->AuthLogin()) return redirect('admin');
        $this->update_qty();
        $data = DB::table("tbl_product")
            ->orderBy("product_id", "desc")
            ->paginate(5);
        $category = DB::table("tbl_category")
            ->where('category_status', 1)
            ->orderBy("category_id", "desc")
            ->get();
        return view('backend.product.list_product', array('data'=>$data, 'category'=>$category));
    }

    public function add_product(){
        if (!$this->AuthLogin()) return redirect('admin');
        $formAction = "admin/do-add-product";
        $category =  DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();

       return view('backend.product.add_product',
           array(
               "formAction"=>$formAction,
               "category"=>$category,
               "brand"=>$brand
           )
       );
    }

    public function do_add_product(CreateRequest $request){
        if (!$this->AuthLogin()) return redirect('admin');
        $data = $request->all();
        $data['product_so_luong_ban'] = 0;
        $get_image = $request->file('product_image');

        if ($get_image) {
            $file_name = time().'_'.$get_image->getClientOriginalName();
            $get_image->move('upload/product', $file_name);
            $data['product_image'] = $file_name;
            product::create($data);
            return redirect('admin/list-product')->with('add', 'Success!');
        }
        $data['product_image'] = "";
        product::create($data);

        return redirect('admin/list-product')->with('add', 'Success! !');
    }

    public function edit_product( $product_id){
        if (!$this->AuthLogin()) return redirect('admin');
        $formAction = 'admin/do-edit-product/'.$product_id;
        $category =  DB::table('tbl_category')->orderBy('category_id', 'desc')->get();
        $brand =  DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
        $record =  DB::table('tbl_product')->where('product_id', '=', $product_id)->first();

        return view('backend.product.edit_product', array('record'=>$record, 'formAction'=>$formAction,
                'category'=>$category, 'brand'=>$brand
        ));
    }

    public function do_edit_product(Request $request, $product_id){
        if(!$this->AuthLogin()){ return redirect('admin'); }
        $get_image = $request->file('product_image');
        if (!$get_image) {
            product::where('product_id','=', $product_id)
                ->update([
                    "brand_id" => $request->brand_id,
                    "category_id" => $request->category_id,
                    "product_name" => $request->product_name,
                    "product_price" => $request->product_price,
                    "product_status" => $request->product_status,
                    "product_sale_price" => $request->product_sale_price,
                    "product_desc" => $request->product_desc,
                    "product_uu_dai" => $request->product_uu_dai,
                    "product_so_luong" => $request->product_so_luong,
                    "product_so_luong_ban" => $request->product_so_luong_ban
                ]);
        } else {
            $file_name_old = product::where('product_id', $product_id)->value('product_image');
            if ($file_name_old!=NULL) {
                unlink('upload/product/'.$file_name_old);
            }
            $file_name = time().'_'.$get_image->getClientOriginalName();
            $get_image->move('upload/product', $file_name);
            product::where('product_id','=', $product_id)
                ->update([
                    "brand_id" => $request->brand_id,
                    "category_id" => $request->category_id,
                    "product_name" => $request->product_name,
                    "product_price" => $request->product_price,
                    "product_status" => $request->product_status,
                    //update ten file anh
                    "product_image" => $file_name,
                    "product_sale_price" => $request->product_sale_price,
                    "product_desc" => $request->product_desc,
                    "product_uu_dai" => $request->product_uu_dai,
                    "product_so_luong" => $request->product_so_luong,
                    "product_so_luong_ban" => $request->product_so_luong_ban
                ]);
        }
        return redirect()->route('list_product')->with('add', "Sửa thành công!");
    }

    public function delete_product($product_id){
        if (!$this->AuthLogin()) return redirect('admin');

        $file_name = product::where('product_id', $product_id)->value('product_image');
        //dd($file_name);
        if ($file_name) {
            unlink('upload/product/'.$file_name);
        }
        product::where('product_id', '=', $product_id)->delete();

        return redirect('admin/list-product')->with('add', 'Success!');
    }
    public function search_product(Request $request){
        if (!$this->AuthLogin()) return redirect('admin');

        $category = DB::table("tbl_category")->where('category_status', 1)->orderBy("category_id", "desc")->get();
        $data = DB::table('tbl_product')
                        ->where('product_name','like','%'.$request->key.'%')
                        ->orderBy('product_id', 'desc')
                        ->paginate(5);
        return view('backend.product.list_product', array("data"=>$data, "category"=>$category, "key_search"=>$request->key));
    }

    public function fil_product(Request $request){
        if(!$this->AuthLogin()){ return redirect('admin'); }

        $category = DB::table("tbl_category")->where('category_status', 1)->orderBy("category_id", "desc")->get();
        $data = DB::table('tbl_product')->where('category_id','=',$request->category_id)->paginate(5);
        $category_name = category::where('category_id', $request->category_id)->value('category_name');

        return view('backend.product.list_product', array(
            "data"=>$data,
            "category"=>$category,
            "category_name"=>$category_name,
            "check"=>$request->category_id
        ));
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

        session()->put('order_qty', $order_qty);
        session()->put('customer_qty', $customer_qty);
        session()->put('admin_qty', $admin_qty);
        session()->put('product_qty', $products_qty);
        session()->put('category_qty', $category_qty);
        session()->put('order_qty_waitting', $order_qty_waitting);
        session()->put('order_qty_processed', $order_qty_prosessed);
        session()->put('brand_qty', $brand_qty);
    }

}
