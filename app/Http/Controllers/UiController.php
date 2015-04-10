<?php namespace Chitunet\Http\Controllers;

class UiController extends Controller {

    public function get($name){
        return view('templates.'.$name);
    }

}
