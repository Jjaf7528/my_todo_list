<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'description' => 'required|min:5|max:30',
            'date' => 'required|date',
            'status' => 'nullable|boolean'
        ];
    }
}
