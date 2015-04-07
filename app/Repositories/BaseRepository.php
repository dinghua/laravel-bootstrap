<?php namespace Chitunet\Repositories;

/**
 * Created by PhpStorm.
 * Author: Alex (dinghua@me.com)
 * Date: 4/7/15
 * Time: 1:30 PM
 */

use Chitunet\Interfaces\IRepository;

abstract class BaseRepository implements IRepository
{

    /**
     * The Model instance.
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

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

    /**
     * IRepository接口store方法
     * 请在子类中重写或重载具体的实现方法
     *
     * @param  array $inputs
     * @param  string|array $extra
     * @return void
     */
    public function store($inputs = [], $extra = ''){
        return;
    }

    /**
     * IRepository 接口 destroy 方法
     * 请在子类中重写或重载具体的实现方法
     *
     * @param  int $id
     * @param  string|array $extra
     * @return void
     */
    public function destroy($id = 0, $extra = '')
    {
        return;
    }

}