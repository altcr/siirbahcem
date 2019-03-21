<?php

Route::get('/',"frontend\GetController@get_index");
Route::get("/detail/{slug}","frontend\GetController@get_detail");
Route::get("/category/{slug}","frontend\GetController@get_category");
Route::get("/search","frontend\GetController@get_search");
Route::post("/comment-add","frontend\PostController@post_comment_add");
Route::post("/user-text-add","frontend\PostController@post_user_text_add");
Route::get("/giris","backend\GetController@get_admin_giris");

/*Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
});*/

Route::group(["prefix" => "Panel", "middleware" => "Admin"], function(){
  //GET
  Route::get("/","backend\GetController@get_index");
  Route::get("/Panel","backend\GetController@get_index");
  Route::get("/categories","backend\GetController@get_category");
  Route::get("/comments","backend\GetController@get_comment");
  Route::get("/admin","backend\GetController@get_admin");
  Route::get("/texts","backend\GetController@get_text");
  Route::get("/text-add","backend\GetController@get_text_add");
  Route::get("/category-add","backend\GetController@get_category_add");
  Route::get("/admin-add","backend\GetController@get_admin_add");
  Route::get("/text/delete/{id}","backend\PostController@post_text_del");
  Route::get("/category/delete/{id}","backend\PostController@post_category_del");
  Route::get("/admin/delete/{id}","backend\PostController@post_admin_del");
  Route::get("/comment/delete/{id}","backend\PostController@post_comment_del");
  Route::get("/comment/check/{id}","backend\PostController@post_comment_check");
  Route::get("/text/update/{id}","backend\GetController@get_text_update");
  Route::get("/category/update/{id}","backend\GetController@get_category_update");
  Route::get("/bildirim-takip","backend\GetController@get_bildirim_takip");
  Route::get("/bildirim-sifirlama","backend\GetController@get_bildirim_sifirlama");
  Route::get("/admin-update/{id}","backend\GetController@get_admin_update");
  Route::get("/cikis","backend\GetController@get_admin_cikis");
  Route::get("/site-ayar","backend\GetController@get_site_ayar");
  Route::get("/sifre-yenile","backend\GetController@get_sifre_yenile");
  Route::get("/tema","backend\GetController@get_tema");
  Route::get("/tema-secim/{renk}","backend\PostController@get_tema_renk");
  Route::get("/text-check","backend\GetController@get_text_check");
  Route::get("/user/text/delete/{id}","backend\PostController@post_user_text_del");
  Route::get("/user/text/check/{id}","backend\PostController@post_user_text_check");

  //POST
  Route::post("/text-add","backend\PostController@post_text_add");
  Route::post("/category-add","backend\PostController@post_category_add");
  Route::post("/admin-add","backend\PostController@post_admin_add");
  Route::post("/text/update/{id}","backend\PostController@post_text_update");
  Route::post("/category/update/{id}","backend\PostController@post_category_update");
  Route::post("/admin-update/{id}","backend\PostController@post_admin_update");
  Route::post("/site-ayar","backend\PostController@post_site_ayar_update");
  Route::post("/sifre-yenile/{id}","backend\PostController@post_sifre_yenile");
});

Auth::routes();
