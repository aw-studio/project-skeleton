<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::trans('/__(routes.home)', PageController::class . '@home')->name('home');
Route::trans('/__(routes.imprint)', PageController::class . '@imprint')->name('imprint');
Route::trans('/__(routes.datapolicy)', PageController::class . '@datapolicy')->name('datapolicy');
