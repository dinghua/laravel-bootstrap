<?php namespace App\Http\Controllers\Admin;

use Auth;
use App\Exceptions\NotAllowException;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use App\Interfaces\IEntity;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Log;
use Entrust;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
abstract class BaseAdminController extends BaseController {

    private $_model_namespace = 'App\Models';
    private $_form_namespace = 'App\Forms';
    private $_request_namespace = 'App\Http\Requests';

    public $displayPerPage = 10;
    protected $_meta = [
        'model'    => 'Base',
        'route'    => 'admin/base',
        'name_key' => 'base',
        'view'     => 'admin.base'
    ];

    /**
     * Object repository
     *
     * @var IEntity
     */
    public $model;

    protected $_modelName = '';
    protected $_formName = '';
    protected $_requestName = '';
    public $formBuilder;
    public $request;

    public $permission_map = [
        'view' => 'manager_base'
    ];

    /**
     * BaseAdminController constructor.
     * @param array $meta
     */
    public function __construct(FormBuilder $formBuilder)
    {
        $this->_modelName  = $this->_model_namespace . '\\' . $this->meta('model');
        $this->_formName   = $this->_form_namespace . '\\' . $this->meta('model') . 'Form';
        $this->_requestName = $this->_request_namespace . '\\' . $this->meta('model') . 'Request';
        $this->formBuilder = $formBuilder;
        view()->share('controller', $this);
    }

    public function index()
    {
        $this->_check('view');
        $models = App::make($this->_modelName)->paginate($this->displayPerPage);

        return view($this->view . '.index')->with(compact('models'));
    }

    public function show($id)
    {
        $this->_check('view');
        $model = App::make($this->_modelName)->findOrFail($id);
        return view($this->view . '.show')->with(compact('model'));
    }

    public function create()
    {
        $this->_check('create');
        $form = $this->formBuilder->create($this->_formName, [
            'method' => 'POST',
            'url'    => $this->route
        ])->add('保存', 'submit', [ 'attr' => [ 'class' => 'btn btn-primary btn-sm' ] ]);

        return view($this->route . '.form')->with(compact('form'));
    }

    public function store()
    {
        $this->_check('create');
        $request = $this->getRequest();
        $this->save($request->input());
        return Redirect::to($this->route);
    }

    public function destroy($id)
    {
        $this->_check('delete');
        $model = App::make($this->_modelName)->findOrFail($id);
        $model->delete();

        return Redirect::to($this->route);
    }


    public function edit($id)
    {
        $this->_check('edit');
        $model = App::make($this->_modelName)->findOrFail($id);
        $this->_check('create');
        $form = $this->formBuilder->create($this->_formName, [
            'method' => 'PUT',
            'url'    => $this->route . '/' . $id,
            'model'  => $model
        ])->add('保存', 'submit', [ 'attr' => [ 'class' => 'btn btn-primary btn-sm' ] ]);

        return view($this->route . '.form')->with(compact('form'));
    }

    public function update($id)
    {
        $this->_check('edit');
        $request = $this->getRequest();
        $this->save($request->input(), $id);

        return Redirect::to($this->route);
    }

    public function save($input, $id = NULL)
    {
        if ($id)
        {
            $model = App::make($this->_modelName)->findOrFail($id);
            $model->update($input);
        } else
        {
            $model = App::make($this->_modelName)->create($input);
        }

        return $model;
    }


    public function check($action)
    {
        return FALSE;
    }

    protected function _check($action)
    {
        if ($this->check($action))
        {
            return TRUE;
        }

        $permission = strtolower($this->meta('model') . '_' . $action);
        if (Entrust::can($permission))
        {
            return TRUE;
        }
        Log::error('access denny:' . $permission . ' user:' . Auth::user()->id);
        throw new NotAllowException('Access denny');
    }

    public function meta($key)
    {
        return $this->_meta[ $key ];
    }

    public function initModel($id = NULL){
        if($id){
            $model =  App::make($this->_modelName)->findOrFail($id);
        }else{
            $model = App::make($this->_modelName);
        }
        return $model;
    }

    public function getRequest(){
        $this->beforeGetRequest();
        if(class_exists($this->_requestName)){
            return App::make($this->_requestName);
        }else{
            return new Request();
        }
    }

    public function beforeRequest(){
        return true;
    }

    public function __call($method, $param)
    {
        Log::error('Call unknown method:' . $method);

        return;
    }

    public function __get($key)
    {
        return $this->meta($key);
    }
}