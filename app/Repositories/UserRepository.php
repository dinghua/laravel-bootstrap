<?php namespace App\Repositories;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:38 PM
 * All rights reserved.
 */

use App\Models\User;
use App\Models\Role;

class UserRepository extends BaseRepository {

    /**
     * The Role instance.
     *
     * @var App\Models\Role
     */
    protected $role;

    /**
     * Create a new UserRepository instance.
     *
     * @param  App\Models\User $user
     * @param  App\Models\Role $role
     * @return void
     */
    public function __construct(User $user, Role $role)
    {
        $this->model = $user;
        $this->role  = $role;
    }

}