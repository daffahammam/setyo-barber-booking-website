<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CapsterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\GalleryController;


Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('home');

route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','userAkses:customer'])->group(function () {
    Route::get('/home-user', [HomeController::class, 'home'])->name('home-user');
    Route::get('/bookings/show', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/add', [BookingController::class, 'add'])->name('bookings.add');
    Route::post('/bookings/storeUser', [BookingController::class, 'storeUser'])->name('bookings.storeUser');

});

Route::middleware(['auth','userAkses:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/bookings/index', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::get('/bookings/{id}/chat', [BookingController::class, 'chat'])->name('bookings.chat');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
        
    // Route::get('/products.show', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/galleries/index', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('/galleries/store', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('/galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('/galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    Route::get('/capsters/index', [CapsterController::class, 'index'])->name('capsters.index');
    Route::get('/capsters/create', [CapsterController::class, 'create'])->name('capsters.create');
    Route::post('/capsters/store', [CapsterController::class, 'store'])->name('capsters.store');
    Route::get('/capsters/{capster}/edit', [CapsterController::class, 'edit'])->name('capsters.edit');
    Route::put('/capsters/{capster}', [CapsterController::class, 'update'])->name('capsters.update');
    Route::delete('/capsters/{capster}', [CapsterController::class, 'destroy'])->name('capsters.destroy');

    Route::get('/price_lists/index', [PriceListController::class, 'index'])->name('price_lists.index');
    Route::get('/price_lists/create', [PriceListController::class, 'create'])->name('price_lists.create');
    Route::post('/price_lists/store', [PriceListController::class, 'store'])->name('price_lists.store');
    Route::get('/price_lists/{id}/edit', [PriceListController::class, 'edit'])->name('price_lists.edit');
    Route::put('/price_lists/{priceList}', [PriceListController::class, 'update'])->name('price_lists.update');
    Route::delete('/price_lists/{priceList}', [PriceListController::class, 'destroy'])->name('price_lists.destroy');

    Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/user/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch('/users/{user}/toggle-role', [UserController::class, 'toggleRole'])->name('users.toggleRole');

});


require __DIR__.'/auth.php';
