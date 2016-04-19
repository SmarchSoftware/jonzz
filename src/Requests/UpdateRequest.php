<?php

namespace Smarch\Jonzz\Requests;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    private $table;
    
    /*
     * constructor to set table
     */
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
            'name' => 'required|unique:'.$this->table.',name,'.$this->jonzz.'|max:32|min:4',
            'slug' => 'required|unique:'.$this->table.',slug,'.$this->jonzz.'|max:255|min:4',
            'value' => 'required|numeric',
            'notes' => 'string|max:255|min:2'
        ];

    }

}