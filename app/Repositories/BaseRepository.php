<?php namespace App\Repositories;

/**
 * Created by PhpStorm.
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:30 PM
 */

use App\Interfaces\IRepository;

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
     * @return App\Models\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function __call($method)
    {
        
    }

}