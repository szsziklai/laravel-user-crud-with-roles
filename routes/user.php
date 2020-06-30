<?php

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/users-list', '\App\Http\Controllers\Auth\UserCrudController@listAll')->name('user_list');
Route::get('/user/{id}/show', '\App\Http\Controllers\Auth\UserCrudController@show')->name('user_show');
Route::get('/user/{id}/edit', '\App\Http\Controllers\Auth\UserCrudController@edit')->name('user_edit');
Route::get('/user/{id}/delete', '\App\Http\Controllers\Auth\UserCrudController@delete')->name('user_delete')->middleware('role:admin');
Route::post('/user/{id}/edit-post/', '\App\Http\Controllers\Auth\UserCrudController@editPost')->name('user_edit_post');
Route::post('/user/{id}/attach-roles/', '\App\Http\Controllers\Auth\UserCrudController@attachRoles')->name('user_attach_roles');
