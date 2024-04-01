<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriptionRequest;
use Illuminate\Http\JsonResponse;
use App\Services\SubscriptionService;

class CreateSubscriptionController extends Controller
{
    public function __construct(private SubscriptionService $service)
    {
        //        
    }

    /**
     * Handles the incoming request to create a new subscription.
     * @param CreateSubscriptionRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreateSubscriptionRequest $request): JsonResponse
    {
        $result = $this->service->create($request->getData());

        return response()->json($result->toArray(), $result->error_code);
    }
}
