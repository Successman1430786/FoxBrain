<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | User Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('admin')
        ->prefix('admin')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | Admin Dashboard
            |--------------------------------------------------------------------------
            */

            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('admin.dashboard');

        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)
        ->except(['show'])
        ->names('admin.users');

        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class)
            ->except(['show'])
            ->names('admin.roles');


        Route::resource('permissions',\App\Http\Controllers\Admin\PermissionController::class)
             ->except(['show'])
             ->names('admin.permissions');


         Route::get('/settings',[\App\Http\Controllers\Admin\SettingController::class, 'index'])
            ->name('admin.settings.index');

        Route::put('/settings',[\App\Http\Controllers\Admin\SettingController::class, 'update'])
            ->name('admin.settings.update');

        Route::get('/activity-logs',[\App\Http\Controllers\Admin\ActivityLogController::class, 'index'])
            ->name('admin.activity-logs.index');

        });


    /*
    |--------------------------------------------------------------------------
    | RBAC Permission Test
    |--------------------------------------------------------------------------
    |
    | Temporary route for testing permission middleware.
    | Remove after RBAC testing is completed.
    |
    */

    Route::get('/test-permission', function () {
        return 'Permission middleware is working!';
    })->middleware('permission:users.view');

});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';