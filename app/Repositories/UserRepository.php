<?php namespace Chitunet\Repositories;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:38 PM
 * All rights reserved.
 */

use Chitunet\Models\User;
use Chitunet\Models\Role;

class UserRepository extends BaseRepository {

    /**
     * The Role instance.
     *
     * @var Chitunet\Models\Role
     */
    protected $role;

    /**
     * Create a new UserRepository instance.
     *
     * @param  Chitunet\Models\User $user
     * @param  Chitunet\Models\Role $role
     * @return void
     */
    public function __construct(User $user, Role $role)
    {
        $this->model = $user;
        $this->role  = $role;
    }

}