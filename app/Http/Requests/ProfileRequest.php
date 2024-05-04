<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'birthday' => 'required|date_format:Y-m-d|nullable',
            'place_of_birth' => 'required|string|max:255|nullable',
            'phone' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'responsable_id' => 'nullable|exists:profiles,id',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'month_paid' => 'nullable|string|max:255',
        ];
    }
}
