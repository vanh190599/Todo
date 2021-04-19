<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class introduceController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request){
        return view('backend.introduce.index');
    }

    public function store(Request $request){

    }

}
