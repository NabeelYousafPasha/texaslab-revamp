<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\{
    AppointmentController,
    IcdCodeController,
    PanelController,
    TestController,
    UserController,
    LocationController,
    PatientController,
    PatientInsuranceController,
};
use App\Http\Middleware\{
    Authenticate,
};
use Illuminate\Http\Request;

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
 * Auth & Admin routes
 *
 * Route Prefix: /admin
 * Route Name: admin.
 */
Route::group([
    'middleware' => [Authenticate::class,],
    'prefix' => '/admin/',
    'as' => 'admin.',
], function () {

    /**
     *
     * Route Prefix: /admin/users
     * Route Name: admin.users.
     */
    Route::resource('/users', UserController::class);

    /**
     *
     * Route Prefix: /admin/users
     * Route Name: admin.users.
     */
    Route::resource('/icd-codes', IcdCodeController::class);

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
    Route::resource('/panels', PanelController::class);

    /**
     *
     * Route Prefix: /admin/patients
     * Route Name: admin.patients.
     */
    Route::resource('/patients', PatientController::class);

    /**
     *
     * Route Prefix: /admin/patient/insurances
     * Route Name: admin.patient.insurances.
     */
    Route::resource('/patients/{patient}/insurances', PatientInsuranceController::class, [
        'names' => 'patient.insurances',
    ]);

    /**
     *
     * Route Prefix: /admin/appointments
     * Route Name: admin.appointments.
     */
    Route::group([
        'prefix' => 'appointments',
        'as' => 'appointments.',
    ], function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::get('/create/{step?}', [AppointmentController::class, 'create'])->name('create');
        Route::post('/{step?}', [AppointmentController::class, 'store'])->name('store');
    });


    /***********
     * ZOHAIB Routes
     **********/
    /**
     *
     * Route Prefix: /admin/panels
     * Route Name: admin.panels.
     */
    Route::resource('/locations', LocationController::class);

    Route::view('/admin', 'home');
    Route::get('/admin/patient-appointments', [DataController::class, 'patientAppointment'])->name('patientAppointment');
    Route::view('/', 'index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/menu/create', [MenuItemController::class, 'create'])->name('menu.create');
    Route::get('/patient-appointments', [DataController::class, 'patientAppointment'])->name('patientAppointment');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::post('/menu', [MenuItemController::class, 'store'])->name('menu.store');
    Route::get('/create-permission', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/store-permission', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/menu/create', [MenuItemController::class, 'create'])->name('menu.create');


    // for ajax, it is better to rely on api/v1 routes
    Route::get('/ajax/patient-appointments', [DataController::class, 'patientAppointmentData'])->name('patientAppointmentData');
});
