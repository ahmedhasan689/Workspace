<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\TainentController;
use App\Http\Controllers\Owner\CalendarController;
use App\Http\Controllers\Owner\SettingsController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Owner\WorkspacesController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\CustomerSettingsController;
use App\Http\Controllers\Customer\CustomerTainentsController;
use App\Http\Controllers\Customer\CustomerWorkspaceController;

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
            'prefix' => '/workspaces',
            'as' => 'workspace.',
        ], function() {
            Route::get('/', [WorkspacesController::class, 'index'])->name('index');
            Route::get('/create', [WorkspacesController::class, 'create'])->name('create');
            Route::post('/', [WorkspacesController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [WorkspacesController::class, 'edit'])->name('edit');
            Route::put('/{id}', [WorkspacesController::class, 'update'])->name('update');
            Route::delete('/{id}', [WorkspacesController::class, 'destroy'])->name('delete');
        });
        // End Workspace Routes

        // Start Calender
        Route::group([
            'prefix' => '/calendar',
            'as' => 'calendar.',
        ], function() {
            Route::get('/', [CalendarController::class, 'index'])->name('index');
        });
        // End Calender

        // Start Setting Routes [Owner]
        Route::group([
            'prefix' => '/settings',
            'as' => 'setting.'
        ], function() {
            Route::get('/', [SettingsController::class, 'index'])->name('index');
            Route::post('/', [SettingsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [SettingsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [SettingsController::class, 'update'])->name('update');
        });
        // End Setting Routes [Owner]

    });

// Customer Routes [ Namespace => app\Http\Controllers\Customer ]
Route::namespace('/Customer')
->prefix('/customer')
->middleware(['auth:web'])
->group(function() {

    // Start Customer Controller [Homepage]
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.home');
    // End Customer Controller [Homepage]

    // Start Customer Workspace
    Route::group([
        'prefix' => 'my-workspaces',
        'as' => 'my-workspaces.',
    ], function() {
        Route::get('/', [CustomerWorkspaceController::class, 'index'])->name('index');
        Route::get('/{id}', [CustomerWorkspaceController::class, 'show'])->name('show');
        Route::post('/getDays', [CustomerWorkspaceController::class, 'getDays'])->name('getDays');

        // Home Page Workspace Show
        Route::get('/specific_workspace/{id}', [CustomerWorkspaceController::class, 'specificWorkspace'])->withoutMiddleware(['auth:web'])->name('specificWorkspace');
    });
    // End Customer Workspace

    // Start Customer Tainents
    Route::group([
        'prefix' => 'my-tainents',
        'as' => 'my-tainents.',
    ], function() {
        Route::get('/', [CustomerTainentsController::class, 'index'])->name('index');
    });
    // End Customer Tainents


    // Start Customer Workspace
    Route::group([
        'prefix' => '/settings',
        'as' => 'customer.setting.',
    ], function() {
        Route::get('/edit', [CustomerSettingsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CustomerSettingsController::class, 'update'])->name('update');
    });
    // End Customer Workspace
});

// Start Tainents Route
Route::group([
    'prefix' => '/tainent',
    'as' => 'tainent.',
], function() {
    Route::get('/', [TainentController::class, 'index'])->name('index');
    Route::get('/create', [TainentController::class, 'create'])->name('create');
    Route::post('/', [TainentController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TainentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TainentController::class, 'update'])->name('update');
    Route::delete('/{id}', [TainentController::class, 'destroy'])->name('delete');
});
// End Tainents Route

// Paypal
Route::get('/payment/{tainent}/create', [PaypalController::class, 'CreatePayment'])->name('CreatePayment');
Route::get('/payment/callback', [PaypalController::class, 'callback'])->name('CallbackPayment');
Route::get('/payment/cancel', [PaypalController::class, 'cancel'])->name('CancelPayment');
