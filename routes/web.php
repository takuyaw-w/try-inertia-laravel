<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('App');
})->name('app');

Route::group(['prefix' => 'todo-list', 'as' => 'todo-list.'], function() {
    Route::get('/', [TodosController::class, 'index'])->name('index');
    Route::post('/create', [TodosController::class, 'create'])->name('create');
    Route::delete('/delete/{id}', [TodosController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [TodosController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TodosController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'auth', 'as' => 'auth'], function() {
    Route::get('/login', [AuthController::class, 'index'])->name('.login');
    Route::post('/login', [AuthController::class, 'login'])->name('.login');
    Route::get('/register', [AuthController::class, 'register'])->name('.register');
    Route::post('/create', [AuthController::class, 'create'])->name('.create');
    // logout
    Route::post('/logout', function () {
        auth()->logout();
        return redirect()->route('app');
    })->name('.logout');
});
