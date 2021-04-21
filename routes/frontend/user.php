<?php
    Route::get('/','homeController@index');
    Route::get('trang-chu', 'homeController@index');

    Route::get('chi-tiet-san-pham/{product_id}','productController@show_detail');
    Route::get('danh-muc-san-pham/{category_id}', 'productController@show_product_category');
    Route::get('thuong-hieu-san-pham/{brand_id}', 'productController@show_product_brand');
    Route::get('tim-kiem-san-pham', 'productController@search_product_frontend');
    Route::get('loc-san-pham-theo-gia/{category_id}', 'productController@filter_product_price');
    Route::get('san-pham-ban-chay', 'productController@san_pham_ban_chay');
    Route::get('new-product', 'productController@new_product');
    Route::get('sale-product', 'productController@sale_product');
    Route::get('top-sale-product', 'productController@top_sale_product');

    // Cart
    Route::post('cart','cartController@save_cart');
    Route::get('show-cart', 'cartController@show_cart');
    Route::get('delete-cart/{id}', 'cartController@delete_cart');
    Route::get('delete-all-cart', 'cartController@delete_all_cart');
    Route::get('tiep-tuc-mua-hang', 'cartController@tiep_tuc_mua_hang');
    Route::post('update-cart-qty','cartController@update_cart_qty');

    //Check_out(shipping) ->payment -> Order
    Route::get('show-checkout','checkoutController@login_checkout'); //nếu chưa đăng nhập thì di chuyển trang Login
    Route::post('save-checkout-customer','checkoutController@save_checkout_customer'); // save to tbl_shipping
    Route::get('payment', 'checkoutController@show_payment');
    Route::post('save-order','checkoutController@save_order');  //func to save in tbl_payment, tbl_order, tbl_detail_order

    //Customer
    Route::get('show-login','customerController@index')->name('trang-dang-nhap');
    Route::get('logout','customerController@logout');
    Route::post('login','customerController@login');
    Route::post('register-customer','customerController@register_customer');
    Route::get('customer-infor','customerController@customer_infor');
    Route::post('edit-customer', 'customerController@edit_customer');

    //frontend news
    Route::get('news', 'newsController@index');
    Route::get('news-category/{news_category_id}', 'newsController@news_category');
    Route::get('news-detail/{news_id}', 'newsController@news_detail');
    Route::get('tin-moi', 'newsController@tin_moi');

    Route::get('/introduce', 'introduceController@index')->name('user.introduce.index');

    Route::get('test', function(){
        dd(2);
    });
?>
