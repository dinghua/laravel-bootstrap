<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->initRoles();
    }

    public function initRoles()
    {
        if (Chitunet\Models\Role::where('name', 'admin')->count() > 0)
        {
            echo "admin role exist\n";
            return FALSE;
        }
        $admin               = new Chitunet\Models\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description  = 'User is allowed to manage and edit other anything';
        $admin->save();
        echo "admin role created\n";

        $user=new Chitunet\Models\User();
        $user->name='admin';
        $user->email='admin@me.com';
        $user->password='admin';
        $user->save();
        $user->attachRole($admin->id);
        echo "add admin user\n";

        $manage_users = new \Chitunet\Models\Permission();
        $manage_users->name = 'manage_users';
        $manage_users->display_name = '管理用户  '; // optional
        $manage_users->description  = 'edit existing users'; // optional
        $manage_users->save();
        echo "manager user permission created\n";
        $admin->attachPermission($manage_users);
        echo "add attach to admin role\n";


        $manage_permission = new \Chitunet\Models\Permission();
        $manage_permission->name = 'manage_permission';
        $manage_permission->display_name = '权限管理  '; // optional
        $manage_permission->description  = 'show entity list'; // optional
        $manage_permission->save();
        echo "manager user permission created\n";
        $admin->attachPermission($manage_permission);
        echo "add attach to admin role\n";


        $manage_role = new \Chitunet\Models\Permission();
        $manage_role->name = 'manage_role';
        $manage_role->display_name = '角色管理  '; // optional
        $manage_role->description  = 'show entity list'; // optional
        $manage_role->save();
        echo "manager user permission created\n";
        $admin->attachPermission($manage_role);
        echo "add attach to admin role\n";

        $manage_group = new \Chitunet\Models\Permission();
        $manage_group->name = 'manage_group';
        $manage_group->display_name = '客户组管理  '; // optional
        $manage_group->description  = 'show entity list'; // optional
        $manage_group->save();
        echo "manager group permission created\n";
        $admin->attachPermission($manage_group);
        echo "add attach to admin group\n";

        $manage_customer = new \Chitunet\Models\Permission();
        $manage_customer->name = 'manage_customer';
        $manage_customer->display_name = '客户管理  '; // optional
        $manage_customer->description  = 'show entity list'; // optional
        $manage_customer->save();
        echo "manager customer permission created\n";
        $admin->attachPermission($manage_customer);
        echo "add attach to admin customer\n";
        return TRUE;


    }

}
