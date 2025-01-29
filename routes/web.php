<?php

use App\Http\Controllers\RedirectController as ControllersRedirectController;
use App\Http\Controllers\URLResource;
use App\Models\URL;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/short-url', URLResource::class);
Route::resource('/{short_url}', ControllersRedirectController::class);
// Route::get('/{short_url}', function($short_url){
    // $url = URL::where('short_url',$short_url)->first();

    // return redirect($url->long_url);
// });
