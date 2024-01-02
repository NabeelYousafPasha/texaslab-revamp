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
    PanelController,
    TestController,
    UserController,
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


    /***********
     * ZOHAIB Routes
     **********/
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
    Route::get('/admin/menu/create', [MenuItemController::class, 'create'])->name('menu.create');

    // for ajax, it is better to rely on api/v1 routes
    Route::get('/ajax/patient-appointments', [DataController::class, 'patientAppointmentData'])->name('patientAppointmentData');
});

/**
 *
 * Auth Routes
 *
 * Route Prefix: ''
 * Route Name: ''
 */
Route::group([
    'middleware' => [Authenticate::class],
], function() {
    
    Route::post('/uploads', function(Request $request) {
        try {
            if ($request->file('image')) {

                if (is_array($request->image)) {
                    $path = collect($request->image)->map->store('tmp-editor-uploads');
                } else {
                    $path = $request->image->store('tmp-editor-uploads');                
                }
    
                return response()->json([
                    'url' => $path
                ], 200);
            }
    
            return;
        } catch (\Throwable $th) {
            dd($th);
        }
    })->name('upload');
});
