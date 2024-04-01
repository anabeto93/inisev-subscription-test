<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

Route::group(['prefix' => 'v1'], function () {
    Route::match(['GET', 'POST'], '/', StatusController::class)->name('api.status');

});
