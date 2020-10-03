<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class gmailController extends Controller
{
    public function test()
    {
        $data = array();
        Mail::send ( 'frontend.email_blank', $data, function ($sendemail) {
            $sendemail->from ( 'kieutuananh2121999@gmail.com', 'VAstore');
            $sendemail->to ( 'facebook19051999@gmail.com', 'Vawn Anh' )->subject ('gui thanh cong') ;
        });
    }
}
