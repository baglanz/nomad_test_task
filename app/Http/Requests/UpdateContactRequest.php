<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    protected $contactId;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', Rule::unique('contacts')->ignore($this->contactId),],
            'number' => ['required', 'regex:/^\+7\d{10}$/', Rule::unique('contacts')->ignore($this->contactId),],
        ];
    }

    public function withValidator($validator)
    {
        if ($contact = $this->route('contact')) {
            $this->contactId = $contact->id;
        }
    }
}
