<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => "Back-end Challenge 2021 🏅 - Space Flight News");
Route::apiResource('articles', ArticleController::class);
