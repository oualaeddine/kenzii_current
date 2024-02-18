<?php

namespace Modules\Stores\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:stores',
            'domain' => 'required|unique:stores',
            'privacy' => 'nullable|sometimes|string',
            'terms' => 'nullable|sometimes|string',
            'fb_pixel' => 'nullable|sometimes|string',
            'access_token' => 'nullable|sometimes|string',
            'fb' => 'nullable|sometimes|string',
            'google_analytics' => 'nullable|sometimes|string',
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
