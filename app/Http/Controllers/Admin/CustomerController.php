<?php namespace App\Http\Controllers\Admin;

use App\Interfaces\IEntity;
use App\Models\Permission;
use App\Models\Role;
use Entrust;

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

}