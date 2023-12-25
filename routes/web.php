<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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
})->middleware(['auth', 'verified', 'kuisioner'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['role:user', 'kuisioner'])->name('user.')->group(function () {
        Route::get('/kuisioner/sessionOne', [UserController::class, 'kuisionerSessionOne'])->name('kuisionerSessionOne');
        Route::post('/kuisioner/sessionOneStore', [UserController::class, 'kuisionerSessionOneStore'])->name('kuisionerSessionOneStore');
        Route::get('/kuisioner/sessionTwo', [UserController::class, 'kuisionersessionTwo'])->name('kuisionerSessionTwo');
        Route::post('/kuisioner/sessionTwoStore', [UserController::class, 'kuisionerSessionTwoStore'])->name('kuisionerSessionTwoStore');
        Route::get('/kuisioner/sessionThree', [UserController::class, 'kuisionersessionThree'])->name('kuisionerSessionThree');
        Route::post('/kuisioner/sessionThreeStore', [UserController::class, 'kuisionerSessionThreeStore'])->name('kuisionerSessionThreeStore');
        Route::get('/kuisioner/sessionFour', [UserController::class, 'kuisionersessionFour'])->name('kuisionerSessionFour');
        Route::post('/kuisioner/sessionFourStore', [UserController::class, 'kuisionerSessionFourStore'])->name('kuisionerSessionFourStore');
    });
    
    Route::middleware(['role:admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboardAdmin');
        Route::get('/kuisioner', [AdminController::class, 'kuisioner'])->name('kuisioner');
        Route::patch('/kuisioner/edit/{id}', [AdminController::class, 'editKuisioner'])->name('kuisionerEdit');
        Route::patch('/kuisionerType/edit/{type}', [AdminController::class, 'editKuisionerType'])->name('kuisionerTypeEdit');
    });
});

require __DIR__.'/auth.php';