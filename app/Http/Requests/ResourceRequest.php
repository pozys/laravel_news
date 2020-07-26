<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'name' => 'max:255',
            'resource' => 'required|max:200|url',
            'source_id' => 'required|integer|min:1|exists:sources,id',
            'category_id' => 'required|integer|min:1|exists:categories,id',
        ];
    }

    public function attributes()
    {
        return [
            'resource' => 'Адрес ресурса',
            'source_id' => 'Новостной источник',
            'category_id' => 'Категория по умолчанию',
        ];
    }
}
