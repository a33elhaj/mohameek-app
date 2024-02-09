<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\Customers\CustomersAuthController;
use App\Http\Controllers\Lawyers\LawyerAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('messages', [\App\Http\Controllers\ChatController::class, 'message']);
Route::middleware('auth:sanctum')->post('chatroom', [ChatRoomController::class, 'chatMessage']);

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user'])->name('user');

Route::middleware([
    // 'auth:api',
    'auth:sanctum',
])
    ->name('users.')
    ->namespace("\App\Http\Controllers")
    ->group(function () {
        Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');

        Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'show'])
            ->name('show')
            ->whereNumber('user');

        Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('store');

        Route::patch('/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');

        Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
    });

Route::post('/customers/register', [CustomersAuthController::class, 'register'])->name('customers.register');
Route::post('/customers/login', [CustomersAuthController::class, 'login'])->name('customers.login');
Route::middleware('auth:sanctum')->post('/customers/logout', [CustomersAuthController::class, 'logout'])->name('customers.logout');
Route::middleware('auth:sanctum')->get('/customers/customer', [CustomersAuthController::class, 'customer'])->name('customers.customer');
Route::middleware([
    'auth:sanctum',
])
    ->name('customers.')
    ->namespace("\App\Http\Controllers")
    ->group(function () {
        Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');

        Route::get('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'show'])
            ->name('show')
            ->whereNumber('customer');

        Route::post('/customers', [\App\Http\Controllers\CustomerController::class, 'store'])->name('store');

        Route::patch('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('update');

        Route::delete('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('destroy');
    });

Route::post('/lawyers/register', [LawyerAuthController::class, 'register'])->name('lawyers.register');
Route::post('/lawyers/login', [LawyerAuthController::class, 'login'])->name('lawyers.login');
Route::middleware('auth:sanctum')->post('/lawyers/logout', [LawyerAuthController::class, 'logout'])->name('lawyers.logout');
Route::middleware('auth:sanctum')->get('/lawyers/lawyer', [LawyerAuthController::class, 'lawyer'])->name('lawyers.lawyer');
Route::middleware([
    //    'auth:api',
])
    ->name('lawyers.')
    ->namespace("\App\Http\Controllers")
    ->group(function () {
        Route::get('/lawyers', [\App\Http\Controllers\LawyerController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');

        Route::get('/lawyers/{lawyer}', [\App\Http\Controllers\LawyerController::class, 'show'])
            ->name('show')
            ->whereNumber('lawyer');

        Route::post('/lawyers', [\App\Http\Controllers\LawyerController::class, 'store'])->name('store');

        Route::patch('/lawyers/{lawyer}', [\App\Http\Controllers\LawyerController::class, 'update'])->name('update');

        Route::delete('/lawyers/{lawyer}', [\App\Http\Controllers\LawyerController::class, 'destroy'])->name('destroy');

        Route::get('/{major}/lawyers', [\App\Http\Controllers\LawyerController::class, 'getLawyersByMajor'])
            ->name('getLawyersByMajor')
            ->whereNumber('major');
    });


Route::middleware([
    //    'auth:api',
])
    ->name('provinces.')
    ->namespace("\App\Http\Controllers")
    ->group(function () {
        Route::get('/provinces', [\App\Http\Controllers\ProvinceController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');

        Route::get('/provinces/{province}', [\App\Http\Controllers\ProvinceController::class, 'show'])
            ->name('show')
            ->whereNumber('province');

        Route::post('/provinces', [\App\Http\Controllers\ProvinceController::class, 'store'])->name('store');

        Route::patch('/provinces/{province}', [\App\Http\Controllers\ProvinceController::class, 'update'])->name('update');

        Route::delete('/provinces/{province}', [\App\Http\Controllers\ProvinceController::class, 'destroy'])->name('destroy');

        Route::get('/{provinc}/cities', [\App\Http\Controllers\ProvinceController::class, 'cities'])
            ->name('cities')
            ->whereNumber('province');
    });

Route::middleware([
    //    'auth:api',
])
    ->name('cities.')
    ->namespace("\App\Http\Controllers")
    ->group(function () {
        Route::get('/cities', [\App\Http\Controllers\CityController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');

        Route::get('/cities/{city}', [\App\Http\Controllers\CityController::class, 'show'])
            ->name('show')
            ->whereNumber('city');

        Route::post('/cities', [\App\Http\Controllers\CityController::class, 'store'])->name('store');

        Route::patch('/cities/{city}', [\App\Http\Controllers\CityController::class, 'update'])->name('update');

        Route::delete('/cities/{city}', [\App\Http\Controllers\CityController::class, 'destroy'])->name('destroy');
    });

Route::middleware([
    //    'auth:api',
])
    ->name('majors.')
    ->namespace("\App\Http\Controllers")
    ->group(function () {
        Route::get('/majors', [\App\Http\Controllers\MajorController::class, 'index'])
            ->name('index')
            ->withoutMiddleware('auth');

        Route::get('/majors/{major}', [\App\Http\Controllers\MajorController::class, 'show'])
            ->name('show')
            ->whereNumber('major');

        Route::post('/majors', [\App\Http\Controllers\MajorController::class, 'store'])->name('store');

        Route::patch('/majors/{major}', [\App\Http\Controllers\MajorController::class, 'update'])->name('update');

        Route::delete('/majors/{major}', [\App\Http\Controllers\MajorController::class, 'destroy'])->name('destroy');
    });
