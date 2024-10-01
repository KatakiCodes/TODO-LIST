<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubtaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/login',[LoginController::class, 'login'])->name('login');

Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('user')->group(function(){
    Route::get('/sign-up',[UserController::class, 'create'])->name('user.create');
    Route::post('/store',[UserController::class, 'store'])->name('user.store');
});

Route::prefix('task')->group(function(){
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::get('/{title}', [TaskController::class, 'show'])->name('task.show');
    Route::post('/', [TaskController::class, 'storage'])->name('task.storage');
    Route::put('/task',[TaskController::class, 'update'])->name('task.update');
    Route::delete('/task',[TaskController::class, 'destroy'])->name('task.delete');
});

Route::prefix('subtask')->group(function(){
    Route::post('/', [SubtaskController::class, 'storage'])->name('subtask.storage');
    Route::put('/task',[SubtaskController::class, 'update'])->name('subtask.update');
    Route::delete('/task',[SubtaskController::class, 'destroy'])->name('subtask.destroy');
});