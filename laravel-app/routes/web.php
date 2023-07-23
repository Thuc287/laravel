<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SellController;

Route::get('/', function () {
     return view('index'); })->name('index');
     //login
Route::get('/Log_in/Staff', [LoginController::class, 'ShowLogin_staff'])->name('ShowLogin.staff');
Route::get('/Log_in/Admin', [LoginController::class, 'ShowLogin_admin'])->name('ShowLogin.admin');
Route::post('/Log_in/Staff', [LoginController::class, 'login_staff'])->name('login.staff');
Route::post('/Log_in/Admin', [LoginController::class, 'login_admin'])->name('login.admin');

     //admin
//result
Route::get('/Result', [ResultController::class, 'index'])->name('result.index');
Route::get('/Result/edit', [ResultController::class, 'edit'])->name('result.edit');
Route::post('/Result/create', [ResultController::class, 'store'])->name('result.store');
Route::post('/Result/update', [ResultController::class, 'update'])->name('result.update');
Route::get('/Result/destroy', [ResultController::class, 'destroy'])->name('result.destroy');
//staff
Route::get('/Staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('/Staff/edit', [StaffController::class, 'edit'])->name('staff.edit');
Route::post('/Staff/create', [StaffController::class, 'store'])->name('staff.store');
Route::post('/Staff/update', [StaffController::class, 'update'])->name('staff.update');
Route::get('/Staff/delete', [StaffController::class, 'destroy'])->name('staff.destroy');
Route::get('/Staff/pay', [StaffController::class, 'pay'])->name('staff.pay');
//ticket
Route::get('/Ticket', [TicketController::class, 'index'])->name('ticket.index');

     //sell
Route::get('/Sell', [SellController::class, 'construct'])->name('sell.construct');
Route::get('/Sell/main', [SellController::class, 'main'])->name('sell.main');
Route::get('/Sell/buy/{game}', [SellController::class, 'create'])->name('sell.buy');
Route::post('/Sell/buy/{game}', [SellController::class, 'store'])->name('sell.store');
Route::get('/Sell/ticket', [SellController::class, 'ticket'])->name('sell.ticket');
Route::get('/Sell/reward', [SellController::class, 'reward'])->name('sell.reward');
Route::post('/Sell/reward', [SellController::class, 'check'])->name('sell.check');
Route::get('/Sell/bill', [SellController::class, 'bill'])->name('sell.bill');
Route::get('/Sell/deleteBill', [SellController::class, 'deleteBill'])->name('sell.deleteBill');
Route::get('/Sell/result/{game}', [SellController::class, 'showResult'])->name('sell.result');
Route::get('/Sell/report', [SellController::class, 'report'])->name('sell.report');
Route::get('/Sell/showLogout', [SellController::class, 'showLogout'])->name('sell.showLogout');
Route::get('/Sell/logout', [SellController::class, 'logout'])->name('sell.logout');
