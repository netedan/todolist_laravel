<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TaskController::class)->prefix('tasks')->group(function () {
    Route::get('/', 'index')->name('tasks');
    Route::get('/create', 'create')->name('task_add');
    Route::post('/', 'store')->name('tasks_store');
    Route::get('/{task}', 'show')->name('task_show');
    Route::get('/{task}/edit', 'edit')->name('task_edit');
    Route::put('/{task}', 'update')->name('task_update');
    Route::delete('/{task}', 'destroy')->name('tasks_destroy');
});

Route::controller(ProjectController::class)->prefix('projects')->group(function () {
    Route::get('/', 'index')->name('projects');
    Route::get('/create', 'create')->name('project_add');
    Route::post('/', 'store')->name('projects_store');
    Route::get('/{project}', 'show')->name('project_show');
    Route::get('/{project}/edit', 'edit')->name('project_edit');
    Route::put('/{project}', 'update')->name('project_update');
    Route::delete('/{project}', 'destroy')->name('projects_destroy');
});

Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'index')->name('users');
    Route::get('/create', 'create')->name('user_add');
    Route::post('/', 'store')->name('user_store');
    Route::get('/{user}', 'show')->name('user_show');
    Route::get('/{user}/edit', 'edit')->name('user_edit');
    Route::put('/{user}', 'update')->name('user_update');
    Route::delete('/{user}', 'destroy')->name('users_destroy');
});

Route::controller(TagController::class)->prefix('tags')->group(function () {
    Route::get('/', 'index')->name('tags');
    Route::get('/create', 'create')->name('tag_add');
    Route::post('/', 'store')->name('tags_store');
    Route::get('/{tag}', 'show')->name('tag_show');
    Route::get('/{tag}/edit', 'edit')->name('tag_edit');
    Route::put('/{tag}', 'update')->name('tag_update');
    Route::delete('/{tag}', 'destroy')->name('tags_destroy');
});

Route::controller(SearchController::class)->prefix('search')->group(function () {
    Route::get('/', 'index')->name('search');
});

