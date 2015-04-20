<?php namespace Chitunet\Http\Controllers\Admin;

use Chitunet\Interfaces\IEntity;
use Chitunet\Models\Customer;
use Chitunet\Models\Group;
use Datatable;
use Response;
use Entrust;

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
        $customers = $model->customers;
        return Datatable::collection($customers)
            ->showColumns('id', 'name', 'gender', 'phone')
            ->addColumn('action',function($model)
            {
                return <<<ACTION
<a href="/admin/customer/{$model->id}" class="btn btn-danger btn-xs">查看</a>
ACTION;
            })
            ->make();
    }

}