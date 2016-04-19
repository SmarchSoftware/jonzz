<?php

namespace Smarch\Jonzz\Requests;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    private $table;

    public function __construct()
    {
        $this->table = config('jonzz.table', 'attributes');
    }

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
            'slug' => 'required|unique:'.$this->table.',slug,'.$this->jonzz.'|max:255|min:4',
            'name' => 'required|unique:'.$this->table.',name,'.$this->jonzz.'|max:32|min:4',
            'value' => 'required|numeric',
            'notes' => 'string|max:255|min:2'
        ];

    }

}