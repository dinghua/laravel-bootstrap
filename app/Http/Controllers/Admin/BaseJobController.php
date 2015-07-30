<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as Controller;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
abstract class BaseJobController extends Controller {
    abstract  public static function show($id);
}