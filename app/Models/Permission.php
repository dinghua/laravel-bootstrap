<?php  namespace App\Models;
use Zizaco\Entrust\EntrustPermission;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:52 PM
 * All rights reserved.
 */
class Permission extends EntrustPermission {
    protected $fillable = ['name', 'display_name'];
    public function user_count(){
        if($this->user){
            return $this->user->count();
        }
        return 0;
    }
}