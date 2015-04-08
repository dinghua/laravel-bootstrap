<?php namespace Chitunet\Http\Controllers\Admin;

use Chitunet\Interfaces\IEntity;

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

    public function _index()
    {
        return 'ok';
    }
}