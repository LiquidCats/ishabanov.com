<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Presentation\Http\Controllers\HomepageController;

Route::get('/', HomepageController::class);
