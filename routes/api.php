<?php

use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\CreateSubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

Route::group(['prefix' => 'v1'], function () {
    Route::match(['GET', 'POST'], '/', StatusController::class)->name('api.status');

    Route::group(['prefix' => 'posts'], function () {
        Route::post('/', CreatePostController::class)->name('api.posts.create');
    });

    Route::group(['prefix' => 'subscriptions'], function () {
        Route::post('/', CreateSubscriptionController::class)->name('api.subscriptions.create');
    });
});
