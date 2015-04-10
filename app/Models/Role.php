<?php namespace Chitunet\Models;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:40 PM
 * All rights reserved.
 */

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

    protected $fillable = [ 'name', 'display_name' ];

    public function hasPerm($name){
        $perms = $this->perms;
        foreach($perms as $perm){
            if($name == $perm->name){
                return TRUE;
            }
        }
        return FALSE;
    }

}