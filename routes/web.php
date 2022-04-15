<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileController;
use App\Models\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/books', BookController::class)->middleware(['auth']);

require __DIR__.'/auth.php';

//Route::get('mail', [MailController::class, 'plain_email']);
Route::get('mail_html', [MailController::class, 'html_email'])->name('mail'); 

Route::get('indexList', [BookController::class, 'index'])->middleware(['auth'])->name('indexList');
Route::resource('/books', BookController::class)->middleware(['AdminAccess']);

Route::post('file', [FileController::class, 'store']);
Route::get('file', [FileController::class, 'create'])->middleware(['AdminAccess'])->name('create');
Route::get('list', [FileController::class, 'index'])->name('list');

Route::get('/download/{id}', [FileController::class, 'getFile'])->name('download')->middleware(['auth']);
