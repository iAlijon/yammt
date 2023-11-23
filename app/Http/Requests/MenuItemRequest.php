<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuItemRequest extends FormRequest
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
            'title_oz' => 'required|string',
            'title_uz' => 'required|string',
            'menu_id' => 'required|',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'title_oz' => 'The must field is required',
          'title_uz' => 'The must field is required',
          'status' => 'The must field is required',
          'menu_id' => 'The must field is required'
        ];
    }
}
