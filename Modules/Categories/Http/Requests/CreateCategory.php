<?php

namespace Modules\Categories\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Categories\Entities\Category;

class CreateCategory extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return Category::$rules;
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
