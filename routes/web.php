<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

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

Route::get('/', [QuestionController::class, 'index'])->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/questions/create', [QuestionController::class, 'create']);
    Route::post('/questions', [QuestionController::class, 'store']);
    Route::get('/questions/{question}', [QuestionController::class ,'show']);
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit']);
    Route::put('/questions/{question}', [QuestionController::class, 'update']);
    Route::delete('/questions/{question}', [QuestionController::class,'delete']);
    Route::get('/answers/{question}/create', [AnswerController::class, 'create']);
    Route::post('/answers/{question}', [AnswerController::class, 'store']);
    Route::get('/answers/{answer}/edit', [AnswerController::class, 'edit']);
    Route::put('/answers/{answer}', [AnswerController::class, 'update']);
    Route::delete('/answers/{answer}', [AnswerController::class,'delete']);
    
});

require __DIR__.'/auth.php';
