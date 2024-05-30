<?php

use App\Http\Controllers\ContactController;
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

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('pages.dashboard', [
                'title' => 'CMS Portfolio Dashboard',
            ]);
        })->name('dashboard');

        Route::resource('/contacts', ContactController::class);
    });
});

require __DIR__.'/auth.php';
