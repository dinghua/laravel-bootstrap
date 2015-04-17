<?php  namespace Chitunet\Http\Controllers\Api;

use Chitunet\Http\Controllers\Controller;
use Chitunet\Models\Customer;
use Chitunet\Models\Role;
use Datatable;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/17/15
 * Time: 3:36 PM
 * All rights reserved.
 */
class ChooserController extends Controller  {
    public function getRoles(){
        return Datatable::collection(Role::all())
            ->showColumns('id', 'display_name', 'name')
            ->make();
    }

    public function getCustomers(){
        return Datatable::collection(Customer::all())
            ->showColumns('id', 'name', 'email')
            ->make();
    }
}