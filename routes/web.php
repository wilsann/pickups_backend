<?php

use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Chart;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect()->route('dashboard');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('trash', TrashController::class);

        Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'changeStatus'])
            ->name('transactions.changeStatus');
        Route::resource('transactions', TransactionController::class);
        Route::get('/print-date', [TransactionController::class, 'print'])->name('print-date');
        Route::get('/print-detail', [TransactionController::class, 'print_detail'])->name('print-detail');
        Route::get('/charts', [ChartController::class, 'index'])->name('charts');
        Route::get('/transaction', function() {
            return view('transactions.transaction');
        });
    });
Route::get('/home', function () {
    return view('home');
});

//Midtrans related
Route::get('midtrans/success', [MidtransController::class,'success']);
Route::get('midtrans/unfinished', [MidtransController::class,'unfinished']);
Route::get('midtrans/error', [MidtransController::class,'error']);