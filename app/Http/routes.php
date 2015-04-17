<?php

use Chitunet\Commands\SendEmail;
use Chitunet\Models\Customer;
use Chitunet\Models\Task;

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

    Route::controller('task', '\Chitunet\Http\Controllers\Admin\TaskController');

    Route::get('showPopup/{input_id}', '\Barryvdh\Elfinder\ElfinderController@showPopup');

    Route::resource('permission', '\Chitunet\Http\Controllers\Admin\PermissionController');
    Route::get('permission/{id}/delete', '\Chitunet\Http\Controllers\Admin\PermissionController@destroy');

    Route::resource('role', '\Chitunet\Http\Controllers\Admin\RoleController');
    Route::get('role/{id}/delete', '\Chitunet\Http\Controllers\Admin\RoleController@destroy');

    Route::get('role_permissions', '\Chitunet\Http\Controllers\Admin\RoleController@getPermissions');
    Route::post('role_permissions', '\Chitunet\Http\Controllers\Admin\RoleController@postPermissions');

    Route::resource('entity', '\Chitunet\Http\Controllers\Admin\EntityController');
    Route::get('entity/{id}/delete', '\Chitunet\Http\Controllers\Admin\EntityController@destroy');

    Route::resource('customer', '\Chitunet\Http\Controllers\Admin\CustomerController');
    Route::get('customer/{id}/delete', '\Chitunet\Http\Controllers\Admin\CustomerController@destroy');

    Route::resource('group', '\Chitunet\Http\Controllers\Admin\GroupController');
    Route::get('group/{id}/delete', '\Chitunet\Http\Controllers\Admin\GroupController@destroy');

    Route::resource('user', '\Chitunet\Http\Controllers\Admin\UserController');
    Route::get('user/{id}/delete', '\Chitunet\Http\Controllers\Admin\UserController@destroy');

});

Route::group([ 'prefix' => 'api', 'middleware' => 'admin' ], function ()
{
    Route::get('group/{id}/customers.json', '\Chitunet\Http\Controllers\Admin\GroupController@apiCustomers');
    Route::get('user/{id}/roles.json', '\Chitunet\Http\Controllers\Admin\UserController@apiRoles');

    Route::post('user/{id}/attach/{relation}', '\Chitunet\Http\Controllers\Admin\UserController@postAttach');
    Route::post('user/{id}/detach/{relation}', '\Chitunet\Http\Controllers\Admin\UserController@postDetach');

    Route::controller('choose', '\Chitunet\Http\Controllers\Api\ChooserController');
});

// debug for templates
Route::get('ui/{name}', 'UiController@get');

Route::any('job', 'JobController@start');

Route::get('debug', function ()
{
    $therelationname = 'roles';
    $user = \Illuminate\Support\Facades\Auth::user();
    $user->$therelationname()->detach([2]);
    return $user->$therelationname;
});