<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Services\introduceService;
use Illuminate\Http\Request;

class introduceController extends Controller
{
    private $introduceService;

    public function __construct(introduceService $introduceService)
    {
        $this->introduceService = $introduceService;
    }

    public function index(Request $request){
        $data = $this->introduceService->first();
        $intro = isset($data) ? $data : null;

        return view('backend.introduce.index', compact('intro'));
    }

    public function store(Request $request){
        $content = $request->content1;
        $data = $this->introduceService->first();
        if (isset($data)) { //edit
            $this->introduceService->edit($data, ['content' => $content]);
        } else { //create
            $this->introduceService->create(['content' => $content]);
        }

        return redirect()->route('admin.introduce.index');

    }

}
