<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class UserRouteHelper {

    public static function routes() {
        Route::group(['middleware' => ['role:admin,administer-users']], function () {
            Route::get('/users-list', '\App\Http\Controllers\Auth\UserCrudController@listAll')->name('user_list');
            Route::get('/user/{id}/show', '\App\Http\Controllers\Auth\UserCrudController@show')->name('user_show');
            Route::get('/user/{id}/edit', '\App\Http\Controllers\Auth\UserCrudController@edit')->name('user_edit');
            Route::get('/user/{id}/delete', '\App\Http\Controllers\Auth\UserCrudController@delete')->name('user_delete');
            Route::post('/user/{id}/edit-post/', '\App\Http\Controllers\Auth\UserCrudController@editPost')->name('user_edit_post');
            Route::post('/user/{id}/change-password-post/', '\App\Http\Controllers\Auth\UserCrudController@changePasswordPost')->name('user_change_password_post');
        });
    }

}
