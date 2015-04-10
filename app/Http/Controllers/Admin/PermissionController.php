<?php namespace Chitunet\Http\Controllers\Admin;

use Auth;
use Chitunet\Interfaces\IEntity;
use Entrust;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
class PermissionController extends BaseAdminController implements IEntity {

    protected $_meta = [
        'model'    => 'Permission',
        'route'    => 'admin/permission',
        'name_key' => 'permission',
        'view'     => 'admin.permission'
    ];

    public function check($action)
    {
        if (Entrust::can('manage_permission'))
        {
            return TRUE;
        }
        return FALSE;
    }

}