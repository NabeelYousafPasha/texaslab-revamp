<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\{
    Authenticate,
};

/**
 * 
 * Home
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * 
 * Auth
 */
Auth::routes();


/**
 * 
 * Admin routes
 * 
 * Route Prefix: /admin
 * Route Name: admin.
 */
Route::group([
    'middleware' => [Authenticate::class,],
    'prefix' => '/admin/',
    'as' => 'admin.',
], function() {

    /**
     * 
     * Route Prefix: /admin/tests
     * Route Name: admin.tests.
     */
    Route::resource('/tests', TestController::class);

    /**
     * 
     * Route Prefix: /admin/panels
     * Route Name: admin.panels.
     */
    Route::resource('/panels', TestController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/admin/create-permission', [PermissionController::class, 'createPermission'])->name('permissions.create');
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::view('/admin', 'home');
    Route::get('/admin/menu/create', [MenuItemController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuItemController::class, 'store'])->name('menu.store');
    Route::get('/admin/patient-appointments', [DataController::class, 'patientAppointment'])->name('patientAppointment');

    // for ajax, it is better to rely on api/v1 routes
    Route::get('/ajax/patient-appointments', [DataController::class, 'patientAppointmentData'])->name('patientAppointmentData');
});