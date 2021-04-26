<?php

namespace App\Http\Controllers\backend;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        if (empty($file)) {
            return response()->json(['success' => 0, 'mess' => 'File không tồn tại']);
        }

        $fileName = $file->getClientOriginalName();
        $fileExt = strtolower($file->getClientOriginalExtension());
        $filePath = $file->getPathName();

        //di chuyển
        $file_name = time().'_'.$fileName;
        $file->move('upload/upload', $file_name);

        return response(['success' => 1, 'message'=> 'Tải ảnh lên thành công', 'data'=>$file_name]);
    }
}
