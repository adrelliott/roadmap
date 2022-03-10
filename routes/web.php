<?php

use App\Http\Livewire\App\Dashboard;
use App\Http\Livewire\App\RoadmapShow;
use App\Http\Livewire\App\StepShow;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->prefix('app/')
    ->name('app.')
    ->group( function() {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/roadmaps/{roadmap}', RoadmapShow::class)->name('roadmap');
        Route::get('/steps/{step}', StepShow::class)->name('step');
        // Route::get('/roadmaps/{roadmap}', RoadmapController::class)->name('roadmaps');
    });
    

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
