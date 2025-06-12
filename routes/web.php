<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TicketController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\ticketController::class, 'index'])->name('ticketForm');
Route::post('/save-ticket', [\App\Http\Controllers\ticketController::class, 'saveTicket'])->name('save-ticket');




// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.post');

    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [TicketController::class, 'index'])->name('admin.dashboard');

         Route::get('/ticket/view/{type}/{id}', [TicketController::class, 'view'])->name('admin.ticket.view');
        Route::post('/ticket/note/{type}/{id}', [TicketController::class, 'note'])->name('admin.ticket.note');
    });
});