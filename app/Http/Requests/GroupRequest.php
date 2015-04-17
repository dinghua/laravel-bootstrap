<?php namespace Chitunet\Http\Requests;

use Chitunet\Http\Requests\Request;

class GroupRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:groups',
            'desc' => 'required'
        ];
    }

}