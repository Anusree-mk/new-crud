<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'tname'=>'required|string|max:255',
            'temail'=>'required|string|max:255',
            'task'=>'required|string|max:255',
            'tpassword'=>'required|string|max:'
        ];
    }
}
