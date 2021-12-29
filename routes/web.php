<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;



Route::get('mail', [MailController::class, 'mailView'])->name('mailView');
Route::post('send-mail', [MailController::class, 'mailSend'])->name('mailSend');

Route::get('search', 'AutoCompleteController@index');
Route::get('autocomplete', 'AutoCompleteController@search');

Route::get('/', function () {
    return view('mailView');
});

?>