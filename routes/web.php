<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/main',function(){
    return "hello";
});

use App\Http\Controllers\YourController;

Route::get('/existing-bills', [YourController::class, 'existingBills'])->name('existing-bills');
Route::get('/new-bill', [YourController::class, 'newBill'])->name('new-bill');

use App\Http\Controllers\InvoiceController;

Route::get('/newbills',[InvoiceController::class,'create'])->name('newbill');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoicesstore');

Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
Route::get('/invoices/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/{id}', [InvoiceController::class, 'update'])->name('invoices.update');

