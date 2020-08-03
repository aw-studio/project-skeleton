<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', app()->getLocale());

Route::trans('/', PageController::class . '@home')->name('home');
