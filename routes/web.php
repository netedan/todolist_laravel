<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks', 'index')->name('tasks');
    Route::get('/tasks/create', 'create')->name('task_add');
    Route::post('/tasks', 'store')->name('tasks_store');
    Route::get('/tasks/{task}', 'show')->name('task_show');
    Route::get('/tasks/{task}/edit', 'edit')->name('task_edit');
    Route::put('/tasks/{task}', 'update')->name('task_update');
    Route::delete('/tasks/{task}', 'destroy')->name('tasks_destroy');
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('/projects', 'index')->name('projects');
    Route::get('/projects/create', 'create')->name('project_add');
    Route::post('/projects', 'store')->name('projects_store');
    Route::get('/projects/{project}', 'show')->name('project_show');
    Route::get('/projects/{project}/edit', 'edit')->name('project_edit');
    Route::put('/projects/{project}', 'update')->name('project_update');
    Route::delete('/projects/{project}', 'destroy')->name('projects_destroy');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
    Route::get('/users/create', 'create')->name('user_add');
    Route::post('/users', 'store')->name('user_store');
    Route::get('/users/{user}', 'show')->name('user_show');
    Route::get('/users/{user}/edit', 'edit')->name('user_edit');
    Route::put('/users/{user}', 'update')->name('user_update');
    Route::delete('/users/{user}', 'destroy')->name('users_destroy');
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->name('tags');
    Route::get('/tags/create', 'create')->name('tag_add');
    Route::post('/tags', 'store')->name('tags_store');
    Route::get('/tags/{tag}', 'show')->name('tag_show');
    Route::get('/tags/{tag}/edit', 'edit')->name('tag_edit');
    Route::put('/tags/{tag}', 'update')->name('tag_update');
    Route::delete('/tags/{tag}', 'destroy')->name('tags_destroy');
});

