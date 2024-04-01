<?php

namespace App\Services;

use App\DTOs\ApiResponse;
use App\DTOs\CreatePostDTO;
use App\Models\Website;

class PostService
{
    public function create(CreatePostDTO $data): ApiResponse
    {
        // Create a new post in the database.
        $website = Website::find($data->websiteId);
        if (!$website) {
            return ApiResponse::fail('Website not found.', 404);
        }

        $post = $website->posts()->create([
            'title' => $data->title,
            'content' => $data->content,
        ]);

        return ApiResponse::success('Post created.', 201, $post->toArray());
    }
}
