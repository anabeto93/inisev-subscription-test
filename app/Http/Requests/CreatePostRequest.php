<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\DTOs\CreatePostDTO;

class CreatePostRequest extends FormRequest
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
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string',
            'content' => 'required|string',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        failedFormRequestValidation($validator);
    }

    public function getData(): CreatePostDTO
    {
        $data = $this->validated();

        return new CreatePostDTO(
            websiteId: $data['website_id'],
            title: $data['title'],
            content: $data['content']
        );
    }
}
