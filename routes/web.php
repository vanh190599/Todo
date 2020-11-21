<?php
use Illuminate\Support\Facades\Route;

Route::namespace('backend')->group(function () {
    require 'backend/admin.php';
});

Route::namespace('frontend')->group(function () {
    require 'frontend/user.php';
});





