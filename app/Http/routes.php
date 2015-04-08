<?php

Route::get('/', function ()
{
    if (Auth::guest())
    {
        return view('home');
    }

    return Redirect::to('admin/dashboard');
});

Route::controller('auth', 'AuthController');

Route::group([ 'prefix' => 'admin', 'middleware' => 'admin' ], function ()
{
    Route::get('dashboard', function ()
    {
        return view('admin.dashboard');
    });

    Route::resource('permission', '\Chitunet\Http\Controllers\Admin\PermissionController');
    Route::resource('role', '\Chitunet\Http\Controllers\Admin\RoleController');
    Route::get('role/{id}/permissions', '\Chitunet\Http\Controllers\Admin\RoleController@getPermissions');
    Route::post('role/{id}/permissions', '\Chitunet\Http\Controllers\Admin\RoleController@postPermissions');

    Route::resource('entity', '\Chitunet\Http\Controllers\Admin\EntityController');
    Route::get('customer/{id}/delete', '\Chitunet\Http\Controllers\Admin\CustomerController@destroy');

    Route::resource('customer', '\Chitunet\Http\Controllers\Admin\CustomerController');
    Route::get('entity/{id}/delete', '\Chitunet\Http\Controllers\Admin\EntityController@destroy');
});

// debug for templates
Route::controller('ui', 'UiController');