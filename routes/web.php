<?php

use App\Http\Controllers\PageController;
use Fjord\Support\Facades\Fjord;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

if (Fjord::isAppTranslatable()) {
    Route::trans('/', PageController::class . '@home')->name('home');
} else {
    Route::get('/', PageController::class . '@home')->name('home');
}
