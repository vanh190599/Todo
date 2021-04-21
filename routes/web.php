<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function(){
    dd(1);
});

Route::namespace('backend')->group(function () {    
    require 'backend/admin.php';
});

//Route::get( '/test', 'testController@test');

Route::namespace('frontend')->group(function () {
    require 'frontend/user.php';
});





