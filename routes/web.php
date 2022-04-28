<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\WorkspacesController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Owner Routes [ Namespace => app\Http\Controllers\Owner ]
Route::namespace('/Owner')
    ->prefix('/owner')
    ->middleware(['auth:owner'])
    ->group(function() {

        // Start Owner Controller [Homepage]
        Route::get('/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
        // End Owner Controller [Homepage]

        // Start Workspace Routes
        Route::group([
            'prefix' => '/workspace',
            'as' => 'workspace.',
        ], function() {
            Route::get('/', [WorkspacesController::class, 'index'])->name('index');
            Route::get('/create', [WorkspacesController::class, 'create'])->name('create');
            Route::post('/', [WorkspacesController::class, 'store'])->name('store');
        });
        // End Workspace Routes

    });

// Customer Routes [ Namespace => app\Http\Controllers\Customer ]
Route::namespace('/Customer')
->prefix('/customer')
->middleware(['auth:web'])
->group(function() {

    // Start Customer Controller [Homepage]
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.home');
    // End Customer Controller [Homepage]

    Route::group([
        'prefix' => 'customer',
        'as' => 'customer.',
    ], function() {
        // Another Routes
    });

});
