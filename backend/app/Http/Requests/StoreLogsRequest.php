<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogsRequest extends FormRequest
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
        return [
            "user_id" => "required",
            "month" => "required|integer|min:1|max:12",
            "is_deposit" => "required|boolean",
            "amount" => "required|numeric",
            "category" => "required|integer",
            "description" => "required|string|max:255"
        ];
    }
}
