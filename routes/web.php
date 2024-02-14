<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::group(['middleware'=>['auth','admin']],function(){
//     Route::get('admin',[AuthController::class,'index']);
// });

Route::get('admin',[AuthController::class,'index']);

// Route::get('admin',function(){
//     dd('admin.page');
// })->middleware('auth','admin');

Route::get('teacher',function(){
    dd(auth()->user()->toArray());
})->middleware(['auth','role:teacher']);

Route::get('student',function(){
    dd(auth()->user()->toArray());
})->middleware(['auth','role:student']);
require __DIR__.'/auth.php';
