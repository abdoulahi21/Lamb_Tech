<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturationRequest extends FormRequest
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
            'profile_id' => 'required|exists:profiles,id',
            'month' => 'required|string|max:255',
            'delay' => 'nullable|date_format:H:i',
            'status' => 'required|string|max:255',
        ];
    }
}
