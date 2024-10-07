<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;




// Start Admin
Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class,'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard');

    // Task
    Route::get('/user/view',[UserController::class,'index'])->name('user.view');
    Route::get('/task/all',[TaskController::class,'index'])->name('task.all');
    Route::get('/task/create',[TaskController::class,'taskCreate'])->name('taske.create');
    Route::post('/task/create',[TaskController::class,'taskPost'])->name('task.post');
    Route::get('/task/mark/{id}',[TaskController::class,'taskMark'])->name('task.mark');
    Route::get('/task/edit/{id}',[TaskController::class,'taskEdit'])->name('task.edit');
    Route::post('/task/update',[TaskController::class,'taskUpdate'])->name('task.update');
    Route::get('/task/deleteall',[TaskController::class,'taskDeleteAll'])->name('task.deleteAll');
    Route::get('/task/delete/{id}',[TaskController::class,'taskDelete'])->name('task.delete');
    Route::post('/task/filter',[TaskController::class,'taskFilter'])->name('task.filter');
});


// End Admin



Route::get('/', function () {
    return view('admin.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
