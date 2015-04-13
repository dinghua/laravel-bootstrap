<?php namespace Chitunet\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    protected $table = 'groups';
    protected $fillable = [ 'name', 'desc', 'type', 'photo' ];

    public function customers()
    {
        return $this->belongsToMany('Chitunet\Models\Customer');
    }
}
