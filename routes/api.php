<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/task', [TaskController::class, 'getUpcomingTasks'])->name('api.get-upcoming-tasks');


Route::post('/task', [TaskController::class, 'createTask'])->name('api.create-task');
