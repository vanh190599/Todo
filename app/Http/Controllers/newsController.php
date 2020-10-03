<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\news;
use App\news_category;
class newsController extends Controller
{
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

    public function list_news(){
        $this->update_qty();
        $news = DB::table('tbl_news')->orderBy('news_id', 'desc')->paginate(8);
        $all_news_category = DB::table('tbl_news_category')->where('news_category_status', 1)->orderBy('news_category_id', 'desc')->paginate(5);
        return view('backend.news.list_news', array(
            "news"=>$news,
            "all_news_category"=>$all_news_category
        ));
    }

    public function list_news_category(){
        $this->update_qty();
        $data = DB::table('tbl_news_category')->orderBy('news_category_id', 'desc')->paginate(5);
        return view('backend.news.list_category_news', array(
            "data"=>$data
        ));
    }

    public function add_news_category(){
        $formAction = "admin/do-add-news-category";
        return view('backend.news.add_edit_news_category',array(
            "formAction"=>$formAction
        ));
    }

    public function do_add_news_category(Request $request){
        $data = $request->all();
        news_category::create($data);
        return redirect('admin/list-news-category')->with('message', 'Thêm thành công');
    }

    public function edit_news_category($news_category_id){
        $formAction = "admin/do-edit-news-category/".$news_category_id;
        $record = news_category::find($news_category_id);
        return view('backend.news.add_edit_news_category',array(
            "formAction"=>$formAction,
            "record"=>$record
        ));
    }

    public function do_edit_news_category(Request $request, $news_category_id){
        $record = news_category::find($news_category_id);
        $record->news_category_name = $request->news_category_name;
        $record->news_category_desc = $request->news_category_desc;
        $record->news_category_status = $request->news_category_status;
        $record->save();
        return redirect('admin/list-news-category')->with('message', 'Sửa thành công');
    }

    public function add_news(){
        $news_category = DB::table('tbl_news_category')->where('news_category_status', 1)->get();
        return view('backend.news.add_news', array(
            "news_category"=>$news_category
        ));
    }

    public function do_add_news(Request $request){
        $data = $request->all();
        $get_image = $request->file('news_image');

        if ($get_image) {
            $file_name = time().'_'.$get_image->getClientOriginalName();
            $get_image->move('upload/news', $file_name);
            $data['news_image'] = $file_name;
            news::create($data);
            return redirect('admin/list-news')->with('message', 'Thêm thành công !');
        }
        $data['news_image'] = "";
        news::create($data);
        return redirect('admin/list-news')->with('message', 'Thêm thành công !');
    }

    public function delete_news_category($news_category_id){
        $record = news_category::find($news_category_id);
        $record->delete();
        return redirect('admin/list-news-category')->with('message', 'Xóa thành công');
    }

    public function delete_news($news_id){
        $file_name = DB::table('tbl_news')->where('news_id', $news_id)->value('news_image');
        if ($file_name) {
            unlink('upload/news/'.$file_name);
        }
        $news = news::find($news_id);
        $news->delete();
        return redirect('admin/list-news')->with('message', 'xoa thanh cong');
    }

    public function edit_news($news_id){
        $news_category = DB::table('tbl_news_category')->orderBy('news_category_id', 'desc')->get();
        $data = news::find($news_id);
        return view('backend.news.edit_news',array(
            "news_category"=>$news_category,
            "data"=>$data
        ));
    }

    public function do_edit_news($news_id, Request $request){
        $old_img = DB::table('tbl_news')->where('news_id', $news_id)->value('news_image');
        $img_update = $old_img;
        $new_img = $request->file('news_image');

        if ($new_img) {
            $img_update = time().'_'.$new_img->getClientOriginalName();
            $new_img->move('upload/news', $img_update);
            unlink('upload/news/'.$old_img);
        }
        $record = news::find($news_id);
            $record->news_category_id = $request->news_category_id;
            $record->news_title = $request->news_title;
            $record->news_desc = $request->news_desc;
            $record->news_content = $request->news_content;
            $record->news_hot = $request->news_hot;
            $record->news_status = $request->news_status;
            $record->news_image = $img_update;
        $record->save();

        return redirect('admin/list-news')->with('message', 'Sửa thành công!');
    }

    //---------------- FRONTEND -------------
    public function index(){
        $big = DB::table('tbl_news')->where('news_status', 1)->orderBy('news_id', 'desc')->first();
        $news_category = DB::table('tbl_news_category')->where('news_category_status', 1)->orderBy('news_category_id', 'desc')->get();
        $news_new = DB::table('tbl_news')->where('news_status', 1)->orderBy('news_id', 'desc')->take(4)->get();
        $news_hot = DB::table('tbl_news')->where('news_hot', 1)->where('news_status', 1)->orderBy('news_id', 'desc')->paginate(6);
        $news_rand = DB::table('tbl_news')->where('news_hot', 1)->where('news_status', 1)->inRandomOrder()->take(5)->get();
        return view('frontend.news.news', array(
            "big"=>$big,
            "news_new"=>$news_new,
            "news_hot"=>$news_hot,
            "news_rand"=>$news_rand,
            "news_category"=>$news_category
        ));
    }

    public function news_category($news_category_id){
        $news_category = DB::table('tbl_news_category')->where('news_category_status', 1)->orderBy('news_category_id', 'desc')->get();
        $data = DB::table('tbl_news')->where('news_category_id', $news_category_id)->where('news_status', 1)->orderBy('news_category_id', 'desc')->paginate(6);
        $name = news_category::where('news_category_id', $news_category_id)->where('news_category_status', 1)->value('news_category_name');
        return view('frontend.news.news_category', array(
            "data"=>$data,
            "news_category"=>$news_category,
            "name"=>$name
        ));
    }

    public function news_detail($news_id){
        $news_category = DB::table('tbl_news_category')->where('news_category_status', 1)->orderBy('news_category_id', 'desc')->get();
        $record = news::find($news_id);
        $news_category_id = $record->news_category_id;
        $data = DB::table('tbl_news')->where('news_category_id', $news_category_id)->orderBy('news_id', 'desc')->take(5)->get();
        return view('frontend.news.news_detail', array(
            "record"=>$record,
            "news_category"=>$news_category,
            "data"=>$data
        ));
    }

    public function tin_moi(){
        $news_category = DB::table('tbl_news_category')->where('news_category_status', 1)->orderBy('news_category_id', 'desc')->get();
        $data = DB::table('tbl_news')->where('news_status', 1)->orderBy('news_id', 'desc')->paginate(6);
        return view('frontend.news.news_category',array(
            "data"=>$data,
            "news_category"=>$news_category,
            "name"=>"Tin mới"
        ));
    }
}
