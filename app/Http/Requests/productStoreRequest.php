<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productStoreRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'image' => ['required'],
            'price' => ['required', 'string', 'max:50', 'min:0'],
            'price_unit' => ['required', 'string'],
            'quantity' => ['required', 'string', 'max:50', 'min:0'],
            'quantity_unit' => ['required', 'string'],
            'is_daily' => ['required'],
            'is_hidden' => ['required'],
            // 'has_reminder' => ['required'],
        ];
    }
}
