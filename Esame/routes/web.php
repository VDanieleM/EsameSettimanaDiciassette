<?php

use App\Http\Controllers\AttivitaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgettoController;
use App\Models\Progetto;
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

// routes/web.php

Route::get('/progetti-personali', function () {
    $progetti = App\Models\Progetto::where('user_id', Auth::id())->get();
    return view('progetti_personali', ['progetti' => $progetti]);
})->name('progetti-personali')->middleware('auth');

Route::post('/progetti-personali', [ProgettoController::class, 'store'])->name('progetti-personali.store')->middleware('auth');
Route::put('/progetti-personali/{progetto}', [ProgettoController::class, 'update'])->name('progetti-personali.update')->middleware('auth');
Route::delete('/progetti-personali/{progetto}', [ProgettoController::class, 'destroy'])->name('progetti-personali.destroy')->middleware('auth');

Route::post('/progetti-personali/{progetto}/attivita', [AttivitaController::class, 'store'])->name('progetti-personali.attivita.store')->middleware('auth');
Route::delete('/progetti-personali/{progetto}/attivita/{attivita}', [AttivitaController::class, 'destroy'])->name('progetti-personali.attivita.destroy')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $progetti = Progetto::all();
    return view('dashboard', ['progetti' => $progetti]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/progetti', [ProgettoController::class, 'index'])->name('progetti.index');
});

require __DIR__ . '/auth.php';
