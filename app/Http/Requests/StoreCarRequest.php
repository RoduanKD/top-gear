<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'brand'         => 'required',
            'model'         => 'required',
            'category_id'   => 'required|numeric|exists:categories,id',
            'price'         => 'required|numeric|min:100000',
            'colors'        => 'required_without:new_colors|array|nullable',
            'colors.*'      => 'required|numeric|exists:colors,id',
            'new_colors'    => 'required_without:colors|nullable|string',
            'gear_type'     => 'required',
            'year'          => 'required',
            'country'       => 'required',
            'is_new'        => 'boolean|nullable',
            'description'   => 'required|string',
            'images'        => 'required|array',
            'images.*'      => 'required|file|image'
        ];
    }
}
