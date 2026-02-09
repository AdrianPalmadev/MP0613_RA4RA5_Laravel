<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('year')
    ->prefix('filmout')
    ->group(function () {

        Route::get('oldFilms/{year?}', [FilmController::class, 'listOldFilms'])
            ->name('oldFilms');

        Route::get('newFilms/{year?}', [FilmController::class, 'listNewFilms'])
            ->name('newFilms');

        Route::get('films/{year?}/{genre?}', [FilmController::class, 'listFilms'])
            ->name('listFilms');

        Route::get('countFilms', [FilmController::class, 'countFilms'])
            ->name('countFilms');
    });

Route::prefix('filmin')
    ->middleware('validate.url')
    ->group(function () {

        Route::post('film', [FilmController::class, 'createFilm'])
            ->name('film');
    });
