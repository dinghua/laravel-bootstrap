<?php namespace Chitunet\Http\Controllers\Admin;

use Chitunet\Interfaces\IEntity;
use Chitunet\Models\Permission;
use Chitunet\Models\Role;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
class CustomerController extends BaseAdminController implements IEntity {

    protected $_meta = [
        'model'    => 'Customer',
        'route'    => 'admin/customer',
        'name_key' => 'customer',
        'view'     => 'admin.customer'
    ];

    public function _index()
    {
        return 'ok';
    }
}