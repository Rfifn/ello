<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ShowController;
use App\Models\Cart;
use App\Models\Detail;
use Filament\Forms\Form;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/rent', [RentController::class, 'index'])->name('rent');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    Route::get('/product', [ProductController::class, 'getProduct'])->name('product');
    Route::get('/dashboard', [HomeController::class, 'getProductHome'])->name('dashboard');

    // Route::get('/form/{id}', [FormController::class, 'index'])->name('form');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
    // Show the form to create a new rental
    Route::get('/rentals/create', [FormController::class, 'create'])->name('rentals.create');

    
    // Display list of rentals
    Route::get('/rentals', [FormController::class, 'index'])->name('rentals.index');


    // Display a specific rental
    Route::get('/rentals/{rental}', [FormController::class, 'show'])->name('rentals.show');

    // Show the form to edit a rental
    // Route::get('/rentals/{rental}/edit', [FormController::class, 'edit'])->name('rentals.edit');

    // Update a specific rental
    Route::put('/rentals/{rental}', [FormController::class, 'update'])->name('rentals.update');

    // Delete a rental
    Route::delete('/rentals/{rental}', [FormController::class, 'destroy'])->name('rentals.destroy');
    // Store a new rental
    Route::post('/rentals', [FormController::class, 'store'])->name('rentals.store');
    Route::get('/show', [ShowController::class, 'show'])->name('show');
    Route::get('/rentals', [ShowController::class, 'show'])->name('show');
    Route::delete('/rentals/{rental}', [ShowController::class, 'destroy'])->name('rentals.destroy');
    Route::get('/detail/{product}', [DetailController::class, 'getDetail'])->name('detail');
    // Route::get('/product', [DetailController::class, 'getDetail'])->name('product');
    Route::post('/rentals/{id}/cancel', [ShowController::class, 'cancel'])->name('rentals.cancel');
});



require __DIR__ . '/auth.php';
