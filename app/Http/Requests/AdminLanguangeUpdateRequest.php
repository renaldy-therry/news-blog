<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLanguangeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $langId = $this->route('languange');

        return [
            'lang'=>['required', 'max:255', 'unique:languanges,lang,'.$langId],
            'name'=>['required', 'max:255'],
            'slug'=>['required', 'max:255', 'unique:languanges,slug,'.$langId],
            'default' => ['required', 'boolean'],
            'status' => ['required', 'boolean']
        ];
    }
}
