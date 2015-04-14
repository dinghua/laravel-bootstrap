<?php namespace Chitunet\Http\Controllers\Admin;

use Chitunet\Interfaces\IEntity;
use Chitunet\Models\Customer;
use Chitunet\Models\Group;
use Chitunet\Models\Permission;
use Chitunet\Models\Role;
use Response;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
class GroupController extends BaseAdminController implements IEntity {

    protected $_meta = [
        'model'    => 'Group',
        'route'    => 'admin/group',
        'name_key' => 'group',
        'view'     => 'admin.group'
    ];

    public function apiCustomers($id)
    {
        $model     = Group::findOrFail($id);
        $customers = $model->customers();
        $customers = $model->customers();
        return \Datatables::of($customers)->make();
    }
}