<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\category;
use DB;

class categoryController extends Controller
{
    public function AuthLogin(){
        $admin_id = session('admin_id');
        if(!$admin_id){
            return false;
        }
        return true;
    }

    public function list_category(){
        if (!$this->AuthLogin()) return redirect('admin');

        $data = DB::table("tbl_category")->orderBy("category_id", "desc")->paginate(5);
        return view('backend.category.list_category', array("data"=>$data));
    }

    public function add_category(){
        if (!$this->AuthLogin()) return redirect('admin');
        $formAction = "do-add-category";
        return view('backend.category.add_edit_category')->with('formAction', $formAction);
    }

    public function do_add_category(Request $request){
        $data = $request->all();
        $product = category::create($data);
        return redirect('list-category')->with('add', 'Thêm thành công !');
    }

    public function edit_category($category_id){
        if (!$this->AuthLogin()) return redirect('admin');
        $formAction = "do-edit-category/".$category_id;
        $record = DB::table('tbl_category')->where('category_id', $category_id)->first();
        return view('backend.category.add_edit_category', array('formAction'=>$formAction, "record"=>$record));
    }

    public function do_edit_category(Request $request, $category_id){
        $category_name = $request->category_name;
        $category_description = $request->category_description;
        $category_status = $request->category_status;

        category::where('category_id', '=', $category_id)->update(array(
            "category_name"=>$category_name,
            "category_description"=>$category_description,
            "category_status"=>$category_status,
        ));
        return redirect('list-category')->with('add', 'sửa thành công !');
    }

    public function delete_category($category_id){
        if (!$this->AuthLogin()) return redirect('admin');
        category::where('category_id', '=', $category_id)->delete();
        return redirect('list-category')->with('add', 'Xóa thành công !');
    }

    public function search_category(Request $request){
        if (!$this->AuthLogin()) return redirect('admin');
        $data = DB::table("tbl_category")
            ->where('category_name', 'like', '%'.$request->key.'%')
            ->orWhere('category_description', 'like', '%'.$request->key.'%')
            ->orderBy("category_id", "desc")->paginate(5);
        return view('backend.category.list_category', array("data"=>$data));
    }

    public function sapxep_category(){
        $data = DB::table("tbl_category")->orderBy("category_name", "asc")->paginate(5);
        return view('backend.category.list_category', array('data'=>$data))->with('message','Sắp xếp theo tên' );
    }

}
