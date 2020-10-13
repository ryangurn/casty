<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\PodcastController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::group(['middleware' => ['verified', 'auth:sanctum']], function (){
    Route::group(['prefix' => 'podcast'], function() {
        Route::get('/', [PodcastController::class, 'index'])->name('podcast.index');
        Route::get('/create', [PodcastController::class, 'create'])->name('podcast.create');
        Route::get('/{podcast}', [PodcastController::class, 'show'])->name('podcast.show');
        Route::get('/edit/{podcast}', [PodcastController::class, 'edit'])->name('podcast.edit');

        Route::group(['prefix' => '{podcast}/episode'], function () {
            Route::get('/', [EpisodeController::class, 'index'])->name('episode.index');
            Route::get('/create', [EpisodeController::class, 'create'])->name('episode.create');
            Route::get('/{episode}', [EpisodeController::class, 'show'])->name('episode.show');
            Route::get('/edit/{episode}', [EpisodeController::class, 'edit'])->name('episode.edit');
        });

    });
});
