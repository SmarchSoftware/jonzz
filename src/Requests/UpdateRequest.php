<?php

namespace Smarch\Amazo\Requests;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|unique:damage_types,slug,'.$this->get('id').'|max:255|min:4',
            'name' => 'required|unique:damage_types,name,'.$this->get('id').'|max:32|min:4',
            'enabled' => 'required|boolean',
            'notes' => 'string|max:255|min:2'
        ];

    }

}