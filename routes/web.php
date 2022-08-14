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


use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResettingPasswordController;
use App\Http\Controllers\VerifyPaymentController;
use App\Http\Controllers\ReportMonthlyPayController;
use App\Http\Controllers\SearchController;
use Illuminate\Auth\Notifications\ResetPassword;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/comics/{name}', [HomeController::class, 'singleManga']);
Route::get('/comics/{slugs}/{chapter}', [HomeController::class, 'readManga']);


Route::middleware(['admin'])->group(function () {
    Route::get('/systemPanel', [ManageController::class, 'index']);
    Route::get('/systemPanel/manga/add', [ManageController::class, 'add']);
    Route::any('/systemPanel/manga/{id}/editManga', [ManageController::class, 'edit']);
    Route::post('/systemPanel/manga/store', [ManageController::class, 'store']);
    Route::post('/systemPanel/manga/{id}/update', [ManageController::class, 'update']);
    Route::get('/systemPanel/manga/{id}/view', [ManageController::class, 'singleManga']);
    Route::get('/systemPanel/manga/{id}/chapter/add', [ManageController::class, 'addChapter']);
    Route::get('/systemPanel/manga/{id}/edit', [ManageController::class, 'editChapter']);
    Route::post('/systemPanel/manga/{id}/chapter/store', [ManageController::class, 'storeChapter']);
    Route::post('/systemPanel/chapter/{id}/update', [ManageController::class, 'updateChapter']);
    Route::get('/systemPanel/manga/{id}/isFree', [ManageController::class, 'isFree']);
    Route::get('/systemPanel/manga/{id}/isSell', [ManageController::class, 'isSell']);
    Route::get('/systemPanel/manga/{manga}/{id}/delete', [ManageController::class, 'isDelete']);

    Route::post('/api/{id}/{slug}/image', [ImageController::class, 'add']);

    Route::get('/systemPanel/verifyPayment', [VerifyPaymentController::class, 'index']);
    Route::get('/systemPanel/reportMonthlyPay', [ReportMonthlyPayController::class, 'index']);
    Route::get('/systemPanel/reportBuy', [ReportMonthlyPayController::class, 'buy']);

    Route::post('/systemPanel/reportMonthlyPay', [ReportMonthlyPayController::class, 'store']);
    Route::post('/systemPanel/reportBuySum', [ReportMonthlyPayController::class, 'buyStore']);

    Route::get('/systemPanel/verifyPayment/{id}/{stat}', [VerifyPaymentController::class, 'store']);
});

Route::get('/member/logout', [LoginController::class, 'destroy'])->middleware(['auth']);


Route::middleware(['guest'])->group(function () {
    Route::get('/member/register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('/member/register/store', [RegisterController::class, 'store'])->middleware('guest');
    Route::get('/member/login', [LoginController::class, 'login'])->middleware('guest');
    Route::post('/member/login/createSession', [AuthLoginController::class, 'login']);
    Route::get('/member/reset', [ResetPasswordController::class, 'showResetForm']);
    Route::get('/member/forgot', [ResettingPasswordController::class, 'createForgot']);

    Route::get('/reset-password/{token}', [ResettingPasswordController::class, 'createEmail'])->name('password.reset');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/member/buychapter/{chap_id}', [BuyController::class, 'buy']);
    Route::get('/member/reset-password', [ResettingPasswordController::class, 'create']);
    Route::post('/member/reset-password', [ResettingPasswordController::class, 'store']);
    Route::get('/member/history-buy', [BuyController::class, 'historyBuy']);
    Route::get('/member/history-payment', [PaymentController::class, 'historypay']);

    Route::get('/member/payment', [PaymentController::class, 'create']);

    Route::post('/member/pay', [PaymentController::class, 'pay']);
});

Route::any('/search', [SearchController::class, 'search']);
require __DIR__ . '/auth.php';
