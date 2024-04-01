<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

Route::match(['GET', 'POST'], '/', StatusController::class)->name('api.status');
