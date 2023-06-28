<?php

use App\Http\Controllers\EmpreendimentoController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
require __DIR__.'/auth.php';

Route::get('/', function () {
    if (Auth::check()) { // Check if the user is logged in
        return redirect('/dashboard'); // Redirect to dashboard
    }
    return view('auth/login');
});

// Route::get('/reg', function () {
//     return view('auth/register');
// });

// Route::post('/reg', function () {
//     return view('auth/register');
// });

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

// Route::get('dashboard/register', function () {
//     return view('auth/register');
// })->middleware(['auth','verified'])->name('register');

// Route::post('dashboard/register', function () {
//     return view('auth/register');
// })->middleware(['auth','verified'])->name('register');

Route::get('/dashboard',[EmpreendimentoController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard/empreendimentos',[EmpreendimentoController::class, 'read']);
    Route::get('dashboard/empreendimentos/cadastrar',[EmpreendimentoController::class, 'readAction']);
    Route::post('dashboard/empreendimentos/cadastrar',[EmpreendimentoController::class, 'createAction']);
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard/empreendimento/{id}',[EmpreendimentoController::class, 'findOne']);
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard/cadastrar/lote/quadra/{id}',[LoteController::class, 'index']);
    Route::post('dashboard/cadastrar/lote/',[LoteController::class, 'createAction']);
    Route::post('dashboard/atualizar/lote/',[LoteController::class, 'updateAction']);
});

