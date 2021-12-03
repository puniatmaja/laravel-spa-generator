<?php

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
Route::get('/dashboard/generator', function () {
    return Inertia::render('Generator');
})->middleware(['auth', 'verified'])->name('generator');
Route::get('/dashboard/component', function () {
    return Inertia::render('Component');
})->middleware(['auth', 'verified'])->name('component');

Route::post('generate', 'GeneratorController@Generate');


// [route]


require __DIR__.'/auth.php';
