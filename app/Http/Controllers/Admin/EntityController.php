<?php namespace App\Http\Controllers\Admin;

//use App\Http\Requests\CreateEntityRequest as Request;
use App\Interfaces\IEntity;
use Illuminate\Http\Request;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
class EntityController extends BaseAdminController implements IEntity {

    protected $_meta = [
        'model'    => 'Entity',
        'route'    => 'admin/entity',
        'name_key' => 'entity',
        'view'     => 'admin.entity'
    ];

}