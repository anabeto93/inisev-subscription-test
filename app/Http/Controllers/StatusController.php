<?php

namespace App\Http\Controllers;

use App\DTOs\ApiResponse;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $status = ApiResponse::success('API is running', 200);

        return response()->json($status->toArray());
    }
}
