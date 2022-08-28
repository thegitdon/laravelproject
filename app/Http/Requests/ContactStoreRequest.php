<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                //
                'first_name' => 'required|string|max:10',
                'email' => 'required|string'
            ];
        } else {
            return [
                //
                'first_name' => 'required|string|max:258',
                'email' => 'required|string'
            ];
        }
    }
}
