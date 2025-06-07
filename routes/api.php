<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Dashboard
use App\Http\Controllers\Api\Dashboard\VoteController as DashboardVoteController;
use App\Http\Controllers\Api\Dashboard\CommentController as DashboardCommentController;

// Frontend
use App\Http\Controllers\Api\VoteController;
use App\Http\Controllers\Api\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Dashboard
Route::middleware('auth:sanctum')->group(function () {
  Route::get('/votes', [DashboardVoteController::class, 'get']);
  Route::get('/comments', [DashboardCommentController::class, 'get']);
  Route::put('/comments/update/{comment}', [DashboardCommentController::class, 'update']);
  Route::put('/comments/restore/{id}', [DashboardCommentController::class, 'restore']);
  Route::put('/comments/toggle/{comment}', [DashboardCommentController::class, 'toggle']);
  Route::delete('/comments/{comment}', [DashboardCommentController::class, 'destroy']);
});

// Frontend
Route::post('voter/check', [VoteController::class, 'check']);
Route::post('vote', [VoteController::class, 'store']);
Route::put('vote', [VoteController::class, 'remove']);
Route::post('comment', [CommentController::class, 'store']);