<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('user')->name('user.')->group(function () {
    // Logowanie użytkowników
    Route::get('login', [App\Http\Controllers\UserAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\UserAuthController::class, 'login']);

    // Rejestracja użytkowników
    Route::get('register', [App\Http\Controllers\UserAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\UserAuthController::class, 'register']);

    // Wylogowanie użytkowników
    Route::post('logout', [App\Http\Controllers\UserAuthController::class, 'logout'])->name('logout');
});

require_once('admin.php');





require_once('web_page.php');
require_once('web_article.php');
require_once('web_article_category.php');
require_once('web_offer.php');
require_once('web_offer_category.php');
require_once('web_realization.php');
require_once('web_realization_category.php');
use App\Http\Controllers\Admin\UserController;

Route::post('/user/upload-photos', [UserController::class, 'uploadPhotos'])->name('user.uploadPhotos')->middleware('auth');
Route::post('/ckeditor/upload', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.upload');