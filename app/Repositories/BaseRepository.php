<?php namespace Chitunet\Repositories;

/**
 * Created by PhpStorm.
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:30 PM
 */

use Chitunet\Interfaces\IRepository;

abstract class BaseRepository implements IRepository {

    /**
     * The Model instance.
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

    protected $index_ability;

    /**
     * Get Model by id.
     *
     * @param  int $id
     * @return Chitunet\Models\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function __call($method)
    {
        
    }

}