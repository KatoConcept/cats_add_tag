<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCatRequest extends FormRequest
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
            'name' => 'required|max:255',
            'breed' => ['required','max:255'],
            'description' => 'required',
            'gender' => ['required', Rule::in(['MALE', 'FEMALE'])],
            'birthday' => 'required|date',
            'image' => 'image|max:' . 1024 * 5, //5mb
            'tags' => 'required',
        ];
    }
}
