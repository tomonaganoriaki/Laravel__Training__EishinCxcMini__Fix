<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\OwnersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AccountController;
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

// Route::get('/', function () {
//     return view('admin.welcome');
// });

Route::resource('owners', OwnersController::class)
    ->middleware('auth:admin')->except(['show']);

Route::prefix('expired-owners')->middleware('auth:admin')->group(function () {
    Route::get('index', [OwnersController::class, 'expiredOwnerIndex'])->name('expired-owners.index');
    Route::post('destroy/{owner}', [OwnersController::class, 'expiredOwnerDestroy'])->name('expired-owners.destroy');
});


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard');



Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::get('/items', [OwnersController::class, 'lists'])->name('items.lists');
Route::get('/items/{id}', [OwnersController::class, 'show'])->name('items.show');
//
Route::put('/update/{id}', [OwnersController::class, 'update2'])->name('update2');
Route::delete('/delete/{id}', [OwnersController::class, 'productDelete'])->name('product.delete');
//
Route::get('/industry/create', [AdminController::class, 'industryCreate'])->name('industry.create');
Route::get('/industry', [AdminController::class, 'industryIndex'])->name('industry.index');
Route::post('/industry/make', [AdminController::class, 'industryMake'])->name('industry.make');
Route::get('/industry/edit/{id}', [AdminController::class, 'industryEdit'])->name('industry.edit');
Route::put('/industry/update/{id}', [AdminController::class, 'industryUpdate'])->name('industry.update');
Route::delete('/industry/delete/{id}', [AdminController::class, 'industryDelete'])->name('industry.delete');
//
Route::get('/feature/create', [AdminController::class, 'featureCreate'])->name('feature.create');
Route::get('/feature', [AdminController::class, 'featureIndex'])->name('feature.index');
Route::post('/feature/make', [AdminController::class, 'featureMake'])->name('feature.make');
Route::get('/feature/edit/{id}', [AdminController::class, 'featureEdit'])->name('feature.edit');
Route::put('/feature/update/{id}', [AdminController::class, 'featureUpdate'])->name('feature.update');
Route::delete('/category/delete/{id}', [AdminController::class, 'featureDelete'])->name('feature.delete');


//　複数アカウント
Route::get('/owners/account/index', [AccountController::class, 'index'])->name('owners.account.index');
Route::get('/owners/account/create', [AccountController::class, 'create'])->name('owners.account.create');
Route::get('/owners/account/edit/{id}', [AccountController::class, 'edit'])->name('owners.account.edit');
Route::post('/owners/account/store', [AccountController::class, 'store'])->name('owners.account.store');
Route::post('/owners/account/update/{id}', [AccountController::class, 'update'])->name('owners.account.update');
Route::delete('/owners/account/delete/{id}', [AccountController::class, 'destroy'])->name('owners.account.destroy');
