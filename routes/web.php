<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Admin\TimeSlotController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Client\AuthorController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\TicketController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/authors', [AuthorController::class, 'index'])->name('author');

Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.list');

Route::get('/tickets-vertical', [TicketController::class, 'index2'])->name('ticket.list.vertical');

Route::get('/confirm', [CheckoutController::class, 'index'])->name('checkout');

Route::post('/confirm', [CheckoutController::class, 'store'])->name('checkout.process');

Route::get('/confirm-success/{code}', [CheckoutController::class, 'confirmSuccess'])->name('checkout.success');

Route::get('/t/{slug}-{id}', [TicketController::class, 'show'])->name('ticket.show')->where([
    'slug' => '.*',
    'id' => '\d'
]);

Route::get('/p/{slug}-{id}', [ClientPostController::class, 'show'])->name('post.show')->where([
    'slug' => '.*',
    'id' => '\d'
]);

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'processLogin'])->name('processLogin');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('category', CategoryController::class);

        Route::resource('author', AdminAuthorController::class);

        Route::resource('type', TypeController::class);

        Route::resource('time-slot', TimeSlotController::class);

        Route::resource('ticket', AdminTicketController::class);

        Route::resource('slide', SlideController::class);

        Route::resource('post', PostController::class);

        Route::get('/order', [OrderController::class, 'index'])->name('order.index');

        Route::get('/contact', [AdminContactController::class, 'index'])->name('contact.index');

        Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');

        Route::put('/setting', [SettingController::class, 'update'])->name('setting.update');
    });
});
