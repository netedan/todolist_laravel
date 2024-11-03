<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\RegisterController;

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
    Route::post('tasks/check-deadlines', 'checkDeadlines')->name('tasks_check_deadlines');
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

