<?php namespace Chitunet\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:40 PM
 * All rights reserved.
 */


class Profile extends Model {
    protected $table = 'profiles';

    public function field(){
        return $this->belongsTo('Chitunet\Models\ProfileField');
    }

}