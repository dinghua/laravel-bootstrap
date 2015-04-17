<?php namespace Chitunet\Http\Controllers\Traits;

use Input;

trait AssignTrait {

    public function postAttach($id, $relation)
    {
        $ids = Input::get('ids');
        if(!$ids) return response()->json(['result'=>0, 'msg'=>'no ids']);
        $model = app($this->_modelName)->findOrFail($id);
        $model->$relation()->attach($ids);
        return response()->json(['result'=>1]);
    }

    public function sync()
    {

    }

    public function postDetach($id, $relation)
    {
        $ids = Input::get('ids');
        if(!$ids) return response()->json(['result'=>0, 'msg'=>'no ids']);
        $model = app($this->_modelName)->findOrFail($id);
        $model->$relation()->detach($ids);
        return response()->json(['result'=>1]);
    }

}