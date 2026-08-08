<?php

use App\Http\Controllers\Api\about\AboutController;
use App\Http\Controllers\Api\contacts\ContactController;
use App\Http\Controllers\Api\FooterController;
use App\Http\Controllers\Api\home\RecentProjectsController;
use App\Http\Controllers\Api\home\SkillController;
use App\Http\Controllers\Api\projects\AllProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home/recent-projects', [RecentProjectsController::class, 'index'])->name('home.recent-projects');
Route::get('/home/skills', [SkillController::class, 'index'])->name('home.skills');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [AllProjectController::class, 'index'])->name('projects');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/footer', [FooterController::class, 'index'])->name('footer');