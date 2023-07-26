<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FontEnd

Route::get('/','HomeController@index' );

Route::get('/404','HomeController@error_page');
Route::get('/lien-he','ContactController@lien_he' );
Route::post('/tim-kiem','HomeController@search');

//Modun 1 bài viết
Route::get('/1-bai-viet/{one_news_slug}','OneNewsController@one_bai_viet');
//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/chi-tiet/{product_slug}','ProductController@details_product');

//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');

//Cart
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart','CartController@show_cart');
Route::get('/show-cart','CartController@show_cart_menu');

Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');
Route::get('/hover-cart','CartController@hover_cart');

Route::get('/remove-item','CartController@remove_item');

Route::get('/cart-session','CartController@cart_session');

//Checkout
Route::get('/dang-nhap','CheckoutController@login_checkout');
Route::get('/del-fee','CheckoutController@del_fee');

Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/confirm-order','CheckoutController@confirm_order');



//Backend
//login
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');


Route::get('/logout','AdminController@logout');
Route::post('/admin-login','AdminController@admin_login');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');

Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');

Route::get('/all-category-product','CategoryProduct@all_category_product');


Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');


//Gallery
Route::get('add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('select-gallery','GalleryController@select_gallery');
Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('update-gallery-name','GalleryController@update_gallery_name');
Route::post('delete-gallery','GalleryController@delete_gallery');
Route::post('update-gallery','GalleryController@update_gallery');

//Category Post

Route::get('/add-category-post','CategoryPost@add_category_post');
Route::get('/all-category-post','CategoryPost@all_category_post');
Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post');

Route::post('/save-category-post','CategoryPost@save_category_post');
Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post');

//POst

Route::get('/add-post','PostController@add_post');
Route::get('/all-post','PostController@all_post');
Route::get('/delete-post/{post_id}','PostController@delete_post');
Route::get('/edit-post/{post_id}','PostController@edit_post');
Route::post('/save-post','PostController@save_post');
Route::post('/update-post/{post_id}','PostController@update_post');


//MODULE 1 BÀI VIẾT

Route::get('/add-one_news','OneNewsController@add_one_news');
Route::get('/all-one_news','OneNewsController@all_one_news');
Route::get('/delete-one_news/{one_news_id}','OneNewsController@delete_one_news');
Route::get('/edit-one_news/{one_news_id}','OneNewsController@edit_one_news');
Route::post('/save-one_news','OneNewsController@save_one_news');
Route::post('/update-one_news/{one_news_id}','OneNewsController@update_one_news');

//slider
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::get('/delete-slide/{slide_id}','SliderController@delete_slide');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');
Route::get('/edit_slider/{slide_id}','SliderController@edit_slider');
Route::post('/update-slider/{slide_id}','SliderController@update_slider');


//Information

Route::get('/information','ContactController@information' );
Route::post('/update-info/{info_id}','ContactController@update_info' );

Route::get('/list-nut','ContactController@list_nut' );
Route::get('/delete-icons','ContactController@delete_icons' );
Route::post('/add-nut','ContactController@add_nut' );

//Order
Route::get('/view-history-order/{order_code}','OrderController@view_history_order');
Route::get('/history','OrderController@history');
Route::get('/delete-order/{order_code}','OrderController@order_code');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');
Route::post('/huy-don-hang','OrderController@huy_don_hang');



