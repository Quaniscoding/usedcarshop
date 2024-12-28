<?php

use App\Livewire\Auth\ForgotPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MyordersPage;
use App\Livewire\OrderDetailPage;
use App\Livewire\Partials\Category;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', action: CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);


Route::middleware('guest')->group(function () {
    Route::get('/login', action: LoginPage::class)->name('login');
    Route::get('/register', action: RegisterPage::class);
    Route::get('/forgot', action: ForgotPage::class)->name('password.request');
    Route::get('/reset/{token}', action: ResetPasswordPage::class)->name('password.reset');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
    Route::get('/checkout', action: CheckoutPage::class);
    Route::get('/my-orders', action: MyordersPage::class);
    Route::get('/my-orders/{order_id}', action: OrderDetailPage::class)->name('my-orders.show');
    Route::get('/success', action: SuccessPage::class)->name('success');
    Route::get('/cancel', action: CancelPage::class)->name('cancel');
});