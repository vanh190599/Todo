<?php


namespace App\Http\Controllers\frontend;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\Services\introduceService;
use DB;

class introduceController extends BaseController
{
    private $introduceService;
    public function __construct(introduceService $introduceService)
    {
        $this->introduceService = $introduceService;
    }

    public function index(){
        $category = DB::table('tbl_category')->where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $news = DB::table('tbl_news')->where('news_status', 1)->orderBy('news_id', 'desc')->paginate(4);

        $data = $this->introduceService->first();
        return view('frontend.introduce.index', compact('data', 'category', 'brand', 'news'));
    }
}
