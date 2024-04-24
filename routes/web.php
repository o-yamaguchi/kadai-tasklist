<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [TasksController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [TasksController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::resource('tasks', TasksController::class, ['only' => ['store', 'create' , 'show', 'edit', 'update', 'destroy']]);
    Route::resource('users', UsersController::class, ['only' => ['store', 'destroy']]);
});

require __DIR__.'/auth.php';
