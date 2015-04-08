<?php namespace Chitunet\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:40 PM
 * All rights reserved.
 */
class Customer extends Model {

    protected $table = 'customers';
    protected $fillable = [ 'name', 'email', 'phone', 'address', 'gender', 'birth', 'avatar', 'memo' ];
}