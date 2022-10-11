<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', [\App\Http\Controllers\SendEmailController::class, 'showContactForm']);
Route::post('/contact', [\App\Http\Controllers\SendEmailController::class, 'sendContact']);
Route::get('/send-welcome', [\App\Http\Controllers\SendEmailController::class, 'sendWelcomeEmail']);
Route::get('/send-invitation', [\App\Http\Controllers\SendEmailController::class, 'sendInvitation']);



Route::group(['middleware' => 'auth'] ,function () {
    Route::group(['prefix' => 'mail-variable'], function() {
        Route::get('/', App\Http\Livewire\MailVariable\ListMailVariable::class);
    });

    Route::group(['prefix' => 'mail-template'], function() {
        Route::get('/', App\Http\Livewire\MailTemplate\ListMailTemplate::class);
        Route::get('/create', App\Http\Livewire\MailTemplate\CreateMailTemplate::class);
        Route::get('/edit/{id}', App\Http\Livewire\MailTemplate\EditMailTemplate::class);
        Route::get('/preview/{id}', function ($id) {
            $mailTemplate = \App\Models\MailTemplate::find($id);
            return $mailTemplate->body;
        });
    });
});