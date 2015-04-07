<?php

use Illuminate\Contracts\Auth\Guard;

Route::get('/', function ()
{
    return view('home');
});

Route::controller('ui', 'UiController');


Route::get('debug', function (Guard $auth)
{
//    $field               = new \Chitunet\Models\ProfileField();
//    $field->key          = 'nickname';
//    $field->display_name = '昵称';
//    $field->type         = 'string';
//    $field->default      = '';
//    $field->save();

    $user = \Chitunet\Models\User::find(1);

    return $user->profile();
});