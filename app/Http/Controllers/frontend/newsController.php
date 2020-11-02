<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\news;
use App\Model\news_category;
class newsController extends Controller
{
    //---------------- FRONTEND -------------
    public function index(){
        $big = DB::table('tbl_news')
            ->where('news_status', 1)
            ->orderBy('updated_at', 'desc')
            ->first();
        $news_category = DB::table('tbl_news_category')
            ->where('news_category_status', 1)
            ->orderBy('news_category_id', 'desc')
            ->get();
        $news_new = DB::table('tbl_news')
            ->where('news_status', 1)
            ->orderBy('news_id', 'desc')
            ->take(4)->get();
        $news_hot = DB::table('tbl_news')
            ->where('news_hot', 1)
            ->where('news_status', 1)
            ->orderBy('news_id', 'desc')
            ->paginate(6);
        $news_rand = DB::table('tbl_news')
            ->where('news_hot', 1)
            ->where('news_status', 1)
            ->inRandomOrder()
            ->take(5)->get();

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
