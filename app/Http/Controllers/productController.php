<?php

namespace App\Http\Controllers;

use App\brand;
use App\category;
use Illuminate\Http\Request;
use DB;
use App\product;
use App\Http\Requests\Product\CreateRequest;

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

    public function list_product(){
        if (!$this->AuthLogin()) return redirect('admin');
        $this->update_qty();
        $data = DB::table("tbl_product")->orderBy("product_id", "desc")->paginate(5);
        $category = DB::table("tbl_category")->where('category_status', 1)->orderBy("category_id", "desc")->get();
        return view('backend.product.list_product', array('data'=>$data, 'category'=>$category));
    }

    public function add_product(){
        if (!$this->AuthLogin()) return redirect('admin');
        $formAction = "admin/do-add-product";
        $category =  DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand =  DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
       return view('backend.product.add_product',array("formAction"=>$formAction, "category"=>$category, "brand"=>$brand));
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
        if (!$this->AuthLogin()) return redirect('admin');

        $get_image = $request->file('product_image');

        if (!$get_image) {
            product::where('product_id','=', $product_id)
                ->update([
                    "brand_id" => $request->brand_id,
                    "category_id" => $request->category_id,
                    "product_name" => $request->product_name,
                    "product_price" => $request->product_price,
                    "product_bao_hanh" => $request->product_bao_hanh,
                    "product_status" => $request->product_status,
                    "product_sale_price" => $request->product_sale_price,
                    "product_desc" => $request->product_desc,
                    "product_uu_dai" => $request->product_uu_dai,
                    "product_so_luong" => $request->product_so_luong,
                    "product_so_luong_ban" => $request->product_so_luong_ban
                ]);
        }
        else {
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
                    "product_bao_hanh" => $request->product_bao_hanh,
                    "product_status" => $request->product_status,

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

    //FRONTEND
    public function show_detail($product_id){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $data = DB::table('tbl_product')
                                 ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id' )
                                 ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id' )
                                 ->where('product_id','=',$product_id)->first();
        $category_id_lien_quan = $data->category_id;
        $brand_id_lien_quan = $data->brand_id;
        $product_id_hientai = $data->product_id;
        $san_pham_lien_quan = DB::table('tbl_product')->where('category_id', $category_id_lien_quan)
                                                       ->where('brand_id', $brand_id_lien_quan)
                                                       ->where('product_id','!=', $product_id_hientai)
                                                       ->paginate(8);
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)->orderBy('product_id', 'desc')->paginate(8);
        return view('frontend.product_details', array(
                    "category"=>$category,
                    "brand"=>$brand,
                    "data"=>$data,
                    "san_pham_lien_quan"=>$san_pham_lien_quan,
                    "sale_product"=>$sale_product
        ));
    }

    public function show_product_category($category_id){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $product = DB::table('tbl_product')->where('tbl_product.category_id', $category_id)->where('product_status', 1)->orderBy('product_id','desc')->paginate(16);
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)->where('product_status', 1)->orderBy('product_id', 'desc')->paginate(4);
        $category_name = category::where('category_id', $category_id)->where('category_status', 1)->value('category_name');
        return view('frontend.product',array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$product,
            "sale_product"=>$sale_product,
            "category_name"=>$category_name,
            "category_id"=>$category_id,
            "check_show_search"=>1
        ));
    }

    public function show_product_brand($brand_id){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $product = DB::table('tbl_product')->where('brand_id', $brand_id)
                                            ->where('product_status', 1)
                                            ->orderBy('product_id','desc')
                                            ->paginate(12);
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)
                                                 ->where('product_status', 1)->orderBy('product_id', 'desc')->paginate(4);
        $brand_name = brand::where('brand_id', $brand_id)->value('brand_name');
        return view('frontend.product',array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$product,
            "sale_product"=>$sale_product,
            "brand_name"=>$brand_name
        ));
    }

    public function search_product_frontend(Request $request){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')->paginate(8);
        $error = "Kết quả tìm kiếm cho: ".$request->key;

        if ($request->category_id == 0) {
            $product_search = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id', '=','tbl_product.category_id')
                ->join('tbl_brand', 'tbl_brand.brand_id', '=','tbl_product.brand_id')
                ->where('product_name','like','%'.$request->key.'%')
                ->orWhere('category_name', 'like', '%'.$request->key.'%')
                ->where('product_status', 1)
                ->orderby('tbl_product.product_id', 'desc')
                ->paginate(16);
        }
        else {
            $product_search = DB::table('tbl_product')
                ->join('tbl_category', 'tbl_category.category_id','=','tbl_product.category_id')
                ->where('tbl_product.category_id','=',$request->category_id)
                ->where('product_name', 'like','%'.$request->key.'%')
                ->paginate(16);
            $category_name = DB::table('tbl_category')->where('category_id','=', $request->category_id)->value('category_name');
            $error = "Kết quả tìm kiếm cho: ".$category_name.' & '.$request->key ;
        }

        $message_search = "kết quả tìm kiếm";
        if ($request->key==null) {
            $error = "";
            $category_name = DB::table('tbl_category')->where('category_id','=', $request->category_id)->value('category_name');
            $message_search = $category_name;
        }
        return view('frontend.product', array(
            "sale_product"=>$sale_product,
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$product_search,
            "message_search"=>$message_search,
            "error"=>$error,
            "key"=>$request->key,
            "category_selected"=>$request->category_id
        ));
    }
    public function filter_product_price($category_id, Request $request){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')->paginate(8);

        $min = $request->khoang_gia - 950000;
        $max = $request->khoang_gia + 950000;

        $filter_product = DB::table('tbl_product')
            ->whereBetween('product_sale_price', [$min, $max])->where('category_id', $category_id)
            ->orWhereBetween('product_price', [$min, $max])->where('category_id', $category_id)
            ->where('product_status', 1)
            ->paginate(16);

        return view('frontend.product', array(
            "sale_product"=>$sale_product,
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$filter_product,
            "message_filter"=>'Kết quả lọc',
            "khoang_gia"=>$request->khoang_gia,
            "check_show_search"=>1,
            "category_id"=>$category_id
        ));
    }

    public function new_product(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $new_product = DB::table('tbl_product')->where('product_status', 1)->orderBy('product_id', 'desc')->paginate(12);
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)->orderBy('product_id', 'desc')->paginate(4);

        return view('frontend.product', array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$new_product,
            "sale_product"=>$sale_product
        ));
    }

    public function top_sale_product(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $top_sale_product = DB::table('tbl_product')
            ->where('product_so_luong_ban','>',0)
            ->where('product_status', 1)
            ->orderBy('product_so_luong_ban', 'desc')
            ->paginate(16);
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)->orderBy('product_id', 'desc')->paginate(4);

        return view('frontend.product', array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$top_sale_product,
            "sale_product"=>$sale_product,
            "title_top_sale"=>"Sản phẩm bán chạy"
        ));
    }

    public function sale_product(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)->orderBy('product_id', 'desc')->paginate(16);

        return view('frontend.product', array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$sale_product,
            "check"=>1
        ));
    }

}
