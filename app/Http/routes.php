<?php

use App\Console\Commands\SendEmail;
use App\Models\Task;

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

    Route::controller('task', '\App\Http\Controllers\Admin\TaskController');

    Route::get('showPopup/{input_id}', '\Barryvdh\Elfinder\ElfinderController@showPopup');

    Route::resource('permission', '\App\Http\Controllers\Admin\PermissionController');
    Route::get('permission/{id}/delete', '\App\Http\Controllers\Admin\PermissionController@destroy');

    Route::resource('role', '\App\Http\Controllers\Admin\RoleController');
    Route::get('role/{id}/delete', '\App\Http\Controllers\Admin\RoleController@destroy');

    Route::get('role_permissions', '\App\Http\Controllers\Admin\RoleController@getPermissions');
    Route::post('role_permissions', '\App\Http\Controllers\Admin\RoleController@postPermissions');

    Route::resource('entity', '\App\Http\Controllers\Admin\EntityController');
    Route::get('entity/{id}/delete', '\App\Http\Controllers\Admin\EntityController@destroy');

    Route::resource('customer', '\App\Http\Controllers\Admin\CustomerController');
    Route::get('customer/{id}/delete', '\App\Http\Controllers\Admin\CustomerController@destroy');

    Route::resource('group', '\App\Http\Controllers\Admin\GroupController');
    Route::get('group/{id}/delete', '\App\Http\Controllers\Admin\GroupController@destroy');

    Route::resource('user', '\App\Http\Controllers\Admin\UserController');
    Route::get('user/{id}/delete', '\App\Http\Controllers\Admin\UserController@destroy');

});

Route::group([ 'prefix' => 'api', 'middleware' => 'admin' ], function ()
{
    Route::get('group/{id}/customers.json', '\App\Http\Controllers\Admin\GroupController@apiCustomers');
    Route::get('user/{id}/roles.json', '\App\Http\Controllers\Admin\UserController@apiRoles');

    Route::post('user/{id}/attach/{relation}', '\App\Http\Controllers\Admin\UserController@postAttach');
    Route::post('user/{id}/detach/{relation}', '\App\Http\Controllers\Admin\UserController@postDetach');

    Route::controller('choose', '\App\Http\Controllers\Api\ChooserController');

    Route::post('sms', '@');
});

// debug for templates
Route::get('ui/{name}', 'UiController@get');

Route::any('job', 'JobController@start');

Route::get('debug', function ()
{
    $task         = new Task();
    $task->name   = 'debug';
    $task->tube   = 'send_email';
    $task->module = 'JobSendEmail';
    $task->save();

    $result = SendEmail::push($task);
    dd($result);
});

