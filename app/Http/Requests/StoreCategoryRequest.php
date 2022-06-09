<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_en'  => 'required|min:3|max:255',
            'name_ar'  => 'required|min:3|max:255',
            'capacity' => 'required|numeric|min:2',
            'image'    => 'required|file|image',
        ];
    }
}
