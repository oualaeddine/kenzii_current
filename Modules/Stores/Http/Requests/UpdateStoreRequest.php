<?php

namespace Modules\Stores\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->store->id;
        return [
            'name' => 'required|unique:stores,name,' . $id,
            'domain' => 'required|unique:stores,domain,' . $id,
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
