<?php

use App\Http\Controllers\Api\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tasks/create', [TasksController::class, 'create']);
Route::get('/tasks/list', [TasksController::class, 'list']);
Route::get('/tasks/{task}', [TasksController::class, 'show']);
Route::put('/tasks/{task}/update', [TasksController::class, 'update']);
Route::delete('/tasks/{task}/delete', [TasksController::class, 'delete']);