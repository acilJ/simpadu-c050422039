<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function (){
    return view('pages.auth.auth-login',['type_menu'=>'']);
});

Route::get('register', function (){
    return view('pages.auth.auth-register',['type_menu'=>'auth']);
})->name('register');

Route::get('forgot-password', function (){
    return view('pages.auth.auth-forgot-password',['type_menu'=>'']);
})->name('forgot-password');

Route::middleware(['auth'])->group(function (){
    Route::get('home', function (){
        return view('pages.app.dashboard-simpadu',['type_menu'=>'']);
    })->name('home');

    Route::resource('user', UserController::class);

    Route::post('logout', function (){
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('reset-password', function (){
        return view('pages.auth.auth-reset-password',['type_menu'=>'']);
    })->name('reset-password');
});
