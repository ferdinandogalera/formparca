<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;



/*
Route::get('/', function () {
    return view('site.home');
})->name('site.home');

Route::view('form', 'site.home');
*/


Route::get('mail', [MailController::class, 'mailView'])->name('mailView');
Route::post('send-mail', [MailController::class, 'mailSend'])->name('mailSend');

Route::get('search', 'AutoCompleteController@index');
Route::get('autocomplete', 'AutoCompleteController@search');


?>