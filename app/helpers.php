<?php

if (!function_exists('failedFormRequestValidation')) {
    function failedFormRequestValidation(Illuminate\Contracts\Validation\Validator $validator)
    {
        $final = \App\DTOs\ApiResponse::fail('The given data was invalid.', 422, ['errors' => $validator->errors()]);

        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json($final, 422));
    }
}
