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
        return TRUE;
    }

}
