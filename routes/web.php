<?php
use Illuminate\Support\Facades\Route;
//FRONTEND======================================================
Route::get('/','homeController@index');
Route::get('trang-chu', 'homeController@index');

//product
Route::get('chi-tiet-san-pham/{product_id}','productController@show_detail');
Route::get('danh-muc-san-pham/{category_id}', 'productController@show_product_category');
Route::get('thuong-hieu-san-pham/{brand_id}', 'productController@show_product_brand');
Route::get('tim-kiem-san-pham', 'productController@search_product_frontend');
Route::get('loc-san-pham-theo-gia/{category_id}', 'productController@filter_product_price');
Route::get('san-pham-ban-chay', 'productController@san_pham_ban_chay');
Route::get('new-product', 'productController@new_product');
Route::get('sale-product', 'productController@sale_product');
Route::get('top-sale-product', 'productController@top_sale_product');


// Cart--------------------------------------------
Route::post('cart','cartController@save_cart');
Route::get('show-cart', 'cartController@show_cart');
Route::get('delete-cart/{id}', 'cartController@delete_cart');
Route::get('delete-all-cart', 'cartController@delete_all_cart');
Route::get('tiep-tuc-mua-hang', 'cartController@tiep_tuc_mua_hang');
Route::post('update-cart-qty','cartController@update_cart_qty');

//Check_out(shipping) ->payment -> Order ----------------------------------------
Route::get('show-checkout','checkoutController@login_checkout'); //nếu chưa đăng nhập thì di chuyển trang Login
Route::post('save-checkout-customer','checkoutController@save_checkout_customer'); // save to tbl_shipping
Route::get('payment', 'checkoutController@show_payment');
Route::post('save-order','checkoutController@save_order');  //func to save in tbl_payment, tbl_order, tbl_detail_order

//Customer-----------------------------------------------------------------------
Route::get('show-login','customerController@index')->name('trang-dang-nhap');
Route::get('logout','customerController@logout');
Route::post('login','customerController@login');
Route::post('register-customer','customerController@register_customer');
Route::get('customer-infor','customerController@customer_infor');
Route::post('edit-customer', 'customerController@edit_customer');

//=========================== ADMIN ===========================
//Backend
Route::get( 'admin', 'adminController@index');
Route::get( 'admin/dashboard', 'adminController@show_dashboard'); //HIEN VIEW
Route::post('admin-dashboard', 'adminController@dashboard');
Route::get( 'admin/logout', 'adminController@logout');

//Login facebook-------------------------------------
Route::get('login-facebook', 'loginFacebook@login_facebook');
Route::get('callback','loginFacebook@callback_facebook'); //khi dang nhap se goi den ham nay
//Login google-------------------------------------
Route::get('login-google', 'loginGoogle@login_google');
Route::get('google-callback','loginGoogle@callback_google'); //khi dang nhap se goi den ham nay

//End Login facebook---------------------------------

Route::group(array("prefix"=>"admin"), function (){
    Route::get('admin','adminController@list')->name('list_admin');
    Route::get('admin/add-admin', 'adminController@add_admin')->name('form_admin');
    Route::post('admin/do-add-admin', 'adminController@do_add_admin');
    route::get('admin/edit-admin/{admin_id}', 'adminController@edit_admin');
    Route::post('admin/do-edit-admin/{admin_id}', 'adminController@do_edit');
    Route::get('admin/delete-admin/{admin_id}', 'adminController@delete');
    Route::get('admin/search-admin','adminController@search_admin');
});
//CATEGORY------------------------------------------------------
    Route::get( 'list-category', 'categoryController@list_category');
    Route::get( 'add-category', 'categoryController@add_category');
    Route::post('do-add-category', 'categoryController@do_add_category');
    Route::get( 'edit-category/{category_id}', 'categoryController@edit_category');
    Route::post('do-edit-category/{category_id}', 'categoryController@do_edit_category');
    Route::get( 'delete-category/{category_id}', 'categoryController@delete_category');
    Route::get( 'search-category/', 'categoryController@search_category');
    Route::get('sapxep-category', 'categoryController@sapxep_category');
//Brand----------------------------------------------------------
Route::group(array("prefix"=>'admin'), function (){
    Route::get( 'list-brand', 'brandController@list_brand')->name('danh_sach_thuong_hieu');
    Route::get( 'add-brand', 'brandController@add_brand');
    Route::post('do-add-brand', 'brandController@do_add_brand');
    Route::get( 'edit-brand/{brand_id}', 'brandController@edit_brand');
    Route::post('do-edit-brand/{brand_id}', 'brandController@do_edit_brand');
    Route::get( 'delete-brand/{brand_id}', 'brandController@delete_brand');
    Route::get( 'search-brand', 'brandController@search_brand');
});
// Product -----------------------------------------------------
Route::group(array("prefix"=>'admin'), function (){
    Route::get( 'list-product', 'productController@list_product')->name('list_product');
    Route::get( 'add-product', 'productController@add_product');
    Route::post('do-add-product', 'productController@do_add_product');
    Route::get( 'edit-product/{product_id}', 'productController@edit_product');
    Route::post('do-edit-product/{product_id}', 'productController@do_edit_product');
    Route::get( 'delete-product/{product_id}', 'productController@delete_product');
    Route::get( 'search-product', 'productController@search_product');
    Route::get('fil-product', 'productcontroller@fil_product');
});
//Customer ------------------------------------------------------
Route::group(array("prefix"=>'admin'), function (){
    Route::get( 'list-customer', 'customerController@list_customer');
    Route::get( 'delete-customer/{customer_id}', 'customerController@delete_customer');
    //Route::get( 'add-product', 'productController@add_product');
});
// Manage-order --------------------------------------------------
Route::group(array("prefix"=>'admin'), function (){
    Route::get( 'list-order', 'manageOrderController@index');
    //Route::get( 'delete-customer/{customer_id}', 'customerController@delete_customer');
    Route::get('show-order-detail/{order_id}', 'manageOrderController@show_order_detail');
    Route::get('update-order-status','manageOrderController@update_order_status');
});
// News--------------------------------------------------------
Route::group(array("prefix"=>'admin'), function (){
    Route::get( 'list-news', 'newsController@list_news');
    Route::get( 'list-news-category', 'newsController@list_news_category');
    Route::get( 'add-news-category', 'newsController@add_news_category');
    Route::post('do-add-news-category', 'newsController@do_add_news_category');
    Route::get( 'edit-news-category/{news_category_id}', 'newsController@edit_news_category');
    Route::post('do-edit-news-category/{news_category_id}', 'newsController@do_edit_news_category');
    Route::get('delete-news-category/{news_category_id}', 'newsController@delete_news_category');
    Route::get('add-news', 'newsController@add_news');
    Route::post('do-add-news', 'newsController@do_add_news');
    Route::get('news-detail/{news_id}','newsController@news_detail_admin');
    Route::get('edit-news/{news_id}', 'newsController@edit_news');
    Route::post('do-edit-news/{news_id}', 'newsController@do_edit_news');
    Route::get('delete-news/{news_id}', 'newsController@delete_news');
});



//frontend news
Route::get('news', 'newsController@index');
Route::get('news-category/{news_category_id}', 'newsController@news_category');
Route::get('news-detail/{news_id}', 'newsController@news_detail');
Route::get('tin-moi', 'newsController@tin_moi');




