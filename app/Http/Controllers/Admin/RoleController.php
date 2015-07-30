<?php namespace App\Http\Controllers\Admin;

use App\Interfaces\IEntity;
use Auth;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

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

    public function getPermissions(){
        $this->check('permissions');
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.role.permission')->with(compact('roles', 'permissions'));
    }

    public function postPermissions(Request $request){
        $this->check('permissions');
        $data = $request->input('data');

        foreach($data as $role_id=>$perms){
            $role = Role::find($role_id);
            $role->perms()->sync($perms);
        }

        return response()->json(['result'=>1]);
    }

    public function check($action)
    {
        if (Auth::user()->can('manage_role'))
        {
            return TRUE;
        }

        return FALSE;
    }
}