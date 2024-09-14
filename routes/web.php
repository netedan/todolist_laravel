<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('task_show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('task_edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('task_update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks_destroy');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects_store');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('project_add');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project_show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('project_edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('project_update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects_destroy');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users', [UserController::class, 'store'])->name('users_store');
Route::get('/users/create', [UserController::class, 'create'])->name('user_add');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user_show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user_edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('user_update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users_destroy');
