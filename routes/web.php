<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks_store');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('task_add');
Route::get('/tasks/{task}', [TaskController::class, 'show']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks_destroy');

