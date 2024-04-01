<?php

namespace App\Http\Requests;

use App\DTOs\CreateSubscriptionDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateSubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // none-required for now
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        failedFormRequestValidation($validator);
    }

    public function getData(): CreateSubscriptionDTO
    {
        $validated = $this->validated();

        return new CreateSubscriptionDTO(
            userId: $validated['user_id'],
            websiteId: $validated['website_id']
        );
    }
}
