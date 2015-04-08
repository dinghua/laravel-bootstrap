<?php namespace Chitunet\Http\Controllers\Admin;

use Chitunet\Interfaces\IEntity;
use Auth;
use Chitunet\Models\Permission;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
class RoleController extends BaseAdminController implements IEntity {

    protected $_meta = [
        'model'    => 'Role',
        'route'    => 'admin/role',
        'name_key' => 'role',
        'view'     => 'admin.role'
    ];

    public function getPermissions($id){
        $this->check('permissions');
        $role = $this->initModel($id);
        $perms = $role->perms;
        $all_perms = Permission::all();
        return view('admin.role.permission')->with(compact('role', 'perms', 'all_perms'));
    }

    public function postPermissions($id){
        $this->check('permissions');
        return redirect('/admin/role');
    }

    public function check($action)
    {
        if (Auth::user()->can('manage_role'))
        {
            return TRUE;
        }

        return FALSE;
    }

    public function _index()
    {

    }
}