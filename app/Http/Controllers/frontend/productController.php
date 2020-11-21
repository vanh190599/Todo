<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Model\brand;
use App\Model\category;
use Illuminate\Http\Request;
use DB;
use App\Model\product;
use App\Http\Requests\Product\CreateRequest;

use Illuminate\Support\Facades\Storage;
class productController extends Controller
{
    public function show_detail($product_id){
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
        $data = DB::table('tbl_product')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id' )
            ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id' )
            ->where('product_id','=',$product_id)->first();

        $category_id_lien_quan = $data->category_id;
        $brand_id_lien_quan = $data->brand_id;
        $product_id_hientai = $data->product_id;

        $san_pham_lien_quan = DB::table('tbl_product')
            ->where('category_id', $category_id_lien_quan)
            ->where('brand_id', $brand_id_lien_quan)
            ->where('product_id','!=', $product_id_hientai)
            ->paginate(8);
        $sale_product = DB::table('tbl_product')
            ->where('product_sale_price','>', 0)
            ->orderBy('product_id', 'desc')
            ->paginate(8);

        return view('frontend.product_details', array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$data,
            "san_pham_lien_quan"=>$san_pham_lien_quan,
            "sale_product"=>$sale_product
        ));
    }

    public function show_product_category($category_id){
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
        $product = DB::table('tbl_product')
            ->where('tbl_product.category_id', $category_id)
            ->where('product_status', 1)
            ->orderBy('product_id','desc')
            ->paginate(16);
        $sale_product = DB::table('tbl_product')
            ->where('product_sale_price','>', 0)
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')
            ->paginate(4);
        $category_name = category::where('category_id', $category_id)
            ->where('category_status', 1)
            ->value('category_name');

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
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
        $product = DB::table('tbl_product')
            ->where('brand_id', $brand_id)
            ->where('product_status', 1)
            ->orderBy('product_id','desc')
            ->paginate(12);
        $sale_product = DB::table('tbl_product')
            ->where('product_sale_price','>', 0)
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')
            ->paginate(4);
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
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
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
            $category_name = DB::table('tbl_category')
                ->where('category_id','=', $request->category_id)
                ->value('category_name');
            $error = "Kết quả tìm kiếm cho: ".$category_name.' & '.$request->key ;
        }

        $message_search = "kết quả tìm kiếm";
        if ($request->key==null) {
            $error = "";
            $category_name = DB::table('tbl_category')
                ->where('category_id','=', $request->category_id)
                ->value('category_name');
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
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
        $sale_product = DB::table('tbl_product')
            ->where('product_sale_price','>', 0)
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')
            ->paginate(8);

        $min = $request->khoang_gia - 950000;
        $max = $request->khoang_gia + 950000;

        $filter_product = DB::table('tbl_product')
            ->whereBetween('product_sale_price', [$min, $max])
            ->where('category_id', $category_id)
            ->orWhereBetween('product_price', [$min, $max])
            ->where('category_id', $category_id)
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
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
        $new_product = DB::table('tbl_product')
            ->where('product_status', 1)
            ->orderBy('product_id', 'desc')
            ->paginate(12);
        $sale_product = DB::table('tbl_product')
            ->where('product_sale_price','>', 0)
            ->orderBy('product_id', 'desc')
            ->paginate(4);

        return view('frontend.product', array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$new_product,
            "sale_product"=>$sale_product
        ));
    }

    public function top_sale_product(){
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
        $top_sale_product = DB::table('tbl_product')
            ->where('product_so_luong_ban','>',0)
            ->where('product_status', 1)
            ->orderBy('product_so_luong_ban', 'desc')
            ->paginate(16);
        $sale_product = DB::table('tbl_product')
            ->where('product_sale_price','>', 0)
            ->orderBy('product_id', 'desc')
            ->paginate(4);

        return view('frontend.product', array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$top_sale_product,
            "sale_product"=>$sale_product,
            "title_top_sale"=>"Sản phẩm bán chạy"
        ));
    }

    public function sale_product(){
        $category = DB::table('tbl_category')
            ->where('category_status', 1)
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->orderBy('brand_id', 'desc')
            ->get();
        $sale_product = DB::table('tbl_product')
            ->where('product_sale_price','>', 0)
            ->orderBy('product_id', 'desc')
            ->paginate(16);

        return view('frontend.product', array(
            "category"=>$category,
            "brand"=>$brand,
            "data"=>$sale_product,
            "check"=>1
        ));
    }
}
