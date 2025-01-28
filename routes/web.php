<?php

use App\Http\Controllers\URLResource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/short-url', URLResource::class);
