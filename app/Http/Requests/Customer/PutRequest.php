<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nit' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'email' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:50']
        ];
    }
}
