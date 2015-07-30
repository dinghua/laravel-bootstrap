<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:40 PM
 * All rights reserved.
 */
class Entity extends Model {

    protected $table = 'entities';
    protected $fillable = [ 'name', 'description', 'photo', 'body' ];
}