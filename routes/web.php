<?php

use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
// Route for the homepage, directing to the welcome view
Route::get('/', function () {
    return view('welcome');
});

  // ################################## tasks ##################################


   Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // Route to display the creation form for tasks (Admin view)
    Route::get('/tasks/create', [TaskController::class, 'createUser'])->name('tasks.create');

    // Route to handle the creation and storage of new tasks
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

     // ################################## tasks ##################################
    Route::get('tasks/statistics', [StatisticController::class, 'index'])->name('statistics.index');

