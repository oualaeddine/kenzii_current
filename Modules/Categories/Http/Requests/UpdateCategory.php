<?php

namespace Modules\Categories\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name'  => 'required|string|max:255|unique:categories,name',
            'desc'  => 'nullable|string|max:65000',
            'image' => 'nullable|file|max:2048|mimes:png,jpg',
            'icon'  =>  'nullable|file|max:2048|mimes:png,jpg',
        ];
        
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
}
