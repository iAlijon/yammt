<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequests extends FormRequest
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
            'title_uz' => 'nullable|string',
            'description_oz' => 'nullable|string',
            'description_uz' => 'nullable|string',
            'content_oz' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'date' => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title_*' => 'Sarlavhasi maydon toʼdirish majburiy',
            'description_*' => 'Qisqacha maʼlumot maydon toʼdirish majburiy',
            'content_*' => 'Kontent maydon toʼdirish majburiy'
        ];
    }
}
