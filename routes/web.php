<?php

use App\Http\Controllers\Auth\Github\Callback;
use App\Http\Controllers\Auth\Github\Login;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Transactions\BankTransactionController;
use App\Http\Controllers\Transactions\CardTransactionController;
use App\Http\Controllers\Transactions\CashTransactionController;
use App\Http\Controllers\Transactions\TransactionFormController;
use App\Http\Controllers\Transactions\TransactionListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(null, 301)->route('view.transaction.list');
});

Route::get('login', LoginController::class)->name('login');
Route::post('logout', LogoutController::class)->name('logout');
Route::get('login/github', Login::class)->name('login.github');
Route::get('login/github/callback', Callback::class)->name('callback.github');

Route::group(['middleware' => 'auth', 'prefix' => 'transaction'], function () {
    Route::post('/bank', BankTransactionController::class)->name('create.bank.transaction');
    Route::post('/card', CardTransactionController::class)->name('create.card.transaction');
    Route::post('/cash', CashTransactionController::class)->name('create.cash.transaction');

    Route::get('/', TransactionFormController::class)->name('view.transaction.forms');
    Route::get('/list', TransactionListController::class)->name('view.transaction.list');
});


