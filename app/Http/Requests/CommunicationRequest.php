<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommunicationRequest extends FormRequest
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
            'sender_id' => 'required|exists:profiles,id',
            'recipient_id' => 'required|exists:profiles,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'read_at' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }
}
