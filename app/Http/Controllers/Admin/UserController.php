<?php namespace Chitunet\Http\Controllers\Admin;

use Chitunet\Http\Controllers\Traits\AssignTrait;
use Chitunet\Interfaces\IEntity;
use Chitunet\Models\User;
use Datatable;
use Entrust;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
class UserController extends BaseAdminController implements IEntity {
    use AssignTrait;

    protected $_meta = [
        'model'    => 'User',
        'route'    => 'admin/user',
        'name_key' => 'user',
        'view'     => 'admin.user'
    ];

    public function check($action)
    {
        if (Entrust::can('manage_users'))
        {
            return TRUE;
        }

        return FALSE;
    }

    private $_id;
    public function apiRoles($id)
    {
        $this->_id = $id;
        $model = User::findOrFail($id);
        $roles = $model->roles;
        return Datatable::collection($roles)
            ->showColumns('id', 'display_name', 'name')
            ->addColumn('action',function($model)
            {
                return <<<ACTION
<button class="btn btn-danger btn-xs" id="detach-{$model->id}" data-id="{$model->id}" data-url="/api/user/{$this->_id}/detach/roles" onclick="$.detach({$model->id})">删除</button>
ACTION;
            }
            )
            ->make();
    }


}