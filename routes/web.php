<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home', function () {
//     return Inertia::render('Home', [
//         'name' => 'Anton'
//     ]);
// })->middleware(['auth', 'verified'])->name('home');

Route::get('/home', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/home/create', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('create');
Route::post('/store', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::put('/edit/{id}', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete');



Route::get('/contactus', function () {
    return Inertia::render('Contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/aboutus', function () {
    return Inertia::render('AboutUs');
})->middleware(['auth', 'verified'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
