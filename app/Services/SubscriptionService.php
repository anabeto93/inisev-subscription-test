<?php

namespace App\Services;

use App\DTOs\ApiResponse;
use App\DTOs\CreateSubscriptionDTO;
use App\Models\User;
use App\Models\Website;

class SubscriptionService
{
    public function create(CreateSubscriptionDTO $data): ApiResponse
    {
        $user = User::where('id', $data->userId)->first();
        if (!$user) {
            return ApiResponse::fail('User not found.', 404);
        }

        $website = Website::where('id', $data->websiteId)->first();
        if (!$website) {
            return ApiResponse::fail('Website not found.', 404);
        }

        $user->websites()->attach($website->id);

        return ApiResponse::success('Subscription created.', 201);
    }
}
