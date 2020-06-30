<?php

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

App\Helpers\UserRouteHelper::routes();
Route::group(['middleware' => ['role:admin,administer-users']], function () {
    Route::get('/roles-list', '\App\Http\Controllers\Auth\RoleController@listAll')->name('role_list');
    Route::get('/role/add', '\App\Http\Controllers\Auth\RoleController@add')->name('role_add');
    Route::post('/role/add-post', '\App\Http\Controllers\Auth\RoleController@addPost')->name('role_add_post');
    Route::get('/role/{id}/edit', '\App\Http\Controllers\Auth\RoleController@edit')->name('role_edit');
    Route::get('/role/{id}/delete', '\App\Http\Controllers\Auth\RoleController@delete')->name('role_delete');
    Route::post('/role/{id}/role-post/', '\App\Http\Controllers\Auth\RoleController@editPost')->name('role_post');

    Route::get('/permissions-list', '\App\Http\Controllers\Auth\PermissionController@listAll')->name('permission_list');
    Route::get('/permission/add', '\App\Http\Controllers\Auth\PermissionController@add')->name('permission_add');
});
