<?php

use Chitunet\Commands\SendEmail;

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

    Route::get('showPopup/{input_id}', '\Barryvdh\Elfinder\ElfinderController@showPopup');
    Route::get('connector', '\Barryvdh\Elfinder\ElfinderController@showIndex');
    Route::get('connector1', function ()
    {
        return 'ok';
    });
    Route::resource('permission', '\Chitunet\Http\Controllers\Admin\PermissionController');
    Route::get('permission/{id}/delete', '\Chitunet\Http\Controllers\Admin\PermissionController@destroy');

    Route::resource('role', '\Chitunet\Http\Controllers\Admin\RoleController');
    Route::get('role/{id}/delete', '\Chitunet\Http\Controllers\Admin\RoleController@destroy');

    Route::get('role_permissions', '\Chitunet\Http\Controllers\Admin\RoleController@getPermissions');
    Route::post('role_permissions', '\Chitunet\Http\Controllers\Admin\RoleController@postPermissions');

    Route::resource('entity', '\Chitunet\Http\Controllers\Admin\EntityController');
    Route::get('customer/{id}/delete', '\Chitunet\Http\Controllers\Admin\CustomerController@destroy');

    Route::resource('customer', '\Chitunet\Http\Controllers\Admin\CustomerController');
    Route::get('entity/{id}/delete', '\Chitunet\Http\Controllers\Admin\EntityController@destroy');
});

// debug for templates
Route::get('ui/{name}', 'UiController@get');

Route::any('job', 'JobController@start');

Route::get('debug', function ()
{
    Queue::push(new SendEmail([
        'title'=>'hello'
    ]));
});