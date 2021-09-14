<?php

namespace App\Http\Requests\Employee;

use App\Models\Employee\Employee;
use App\Models\Position\Position;
use App\Rules\HeadDepthRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'image' => 'sometimes|file|mimes:jpg,png',
            'full_name' => 'required|string',
            'phone_number' => 'required|regex:/^\+380\(\d{2}\)\d{7}$/i',
            'email' => 'required|unique:employees|email',
            'position_id' => [
                'required',
                'integer',
                Rule::in(Position::pluck('id'))
            ],
            'salary' => 'required|numeric',
            'head_id' => [
                'bail',
                'sometimes',
                new HeadDepthRule(),
            ],
            'date_of_employment' => 'required|date'
        ];
    }
}
