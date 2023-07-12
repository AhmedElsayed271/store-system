<?php

use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Events\pusherTest;
use App\Jobs\AddProductJob;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CategoryCrated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Front\CardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/mab', [MapController::class, 'show']);
Route::get('/test', function () {
    
    event(new pusherTest());
    
    return "Done!";
});

Route::get('/product-details/{product:slug}', [ProductController::class, 'show'])->name('product-details');

Route::resource('/cart', CardController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/notify', function () {

    // $user = Auth::user();
    // $users = User::get();
    // $category = Category::find(1);
    // $category;
    // $user->notify(new CategoryCrated($category));
    // Notification::send($users, new CategoryCrated($category));
    // return $user->notifications()->delete();
    // return $user->unreadNotifications()->update(['read_at' => now()]);
    // dd($user->Notifications[1]->unread());
    // return $user->Notifications[0]->unread();
    // return $user->readNotifications[0]->created_at->diffForHumans();
    // return $user->Notifications;
    // return $user->unreadNotifications;

     return Cart::select('products.price','carts.*')->join('products', 'carts.product_id', 'products.id')->get();

    return "test";

});

require __DIR__ . '/auth.php';
