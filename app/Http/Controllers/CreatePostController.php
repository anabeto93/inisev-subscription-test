<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\JsonResponse;
use App\Services\PostService;

class CreatePostController extends Controller
{
    public function __construct(private PostService $service)
    {
        //   
    }

    /**
     * Handle the request to create a new website post.
     * @param CreatePostRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreatePostRequest $request): JsonResponse
    {
        $result = $this->service->create($request->getData());

        return response()->json($result->toArray(), $result->error_code);
    }
}
