<?php


namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use DB;


class homeController extends BaseController
{
    public function index(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $new_product = DB::table('tbl_product')->where('product_status', 1)->orderBy('product_id', 'desc')->paginate(12);
        $sale_product = DB::table('tbl_product')->where('product_sale_price','>', 0)->orderBy('product_id', 'desc')->paginate(16);
        $product_top_sale = DB::table('tbl_product')
            ->where('product_so_luong_ban','>',0)
            ->where('product_status', 1)
            ->orderBy('product_so_luong_ban', 'desc')
            ->paginate(4);
        $news = DB::table('tbl_news')->where('news_status', 1)->orderBy('news_id', 'desc')->paginate(4);
        return view('frontend.home', array(
              "category"=>$category,
              "brand"=>$brand,
              "data" => $new_product,
              "sale_product"=>$sale_product,
              "product_top_sale"=>$product_top_sale,
              "news"=>$news
        ));
    }

}
