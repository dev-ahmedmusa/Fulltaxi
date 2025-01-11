<?php



use App\Http\Controllers\Backend\CancelReasonController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DocumentMasterController;
use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ServiceTypeController;
use App\Http\Controllers\Backend\VehicleTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [DashboardController::class, 'index']);
    Route::get('/', function () {
        return view('welcome');
    });
    // Route::get('/', function () {
    //     return view('Dashboard.form-elements');
    // });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


   


    //################################ dashboard admin ########################################
    Route::get('/dashboard/admin', function () {
        return view('Dashboard.Admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard.admin');

    //################################ end dashboard admin #####################################
    Route::middleware(['auth:admin'])->group(function () {
      //################################  service  #####################################
      
      Route::resource('serviceType',ServiceTypeController::class);

     //################################  Passenger  #####################################
     Route::resource('client',ClientController::class);
     //################################  cancelReason  #####################################
     Route::resource('cancelReason',CancelReasonController::class);
     
    //################################  cancelReason  #####################################

     Route::resource('coupon',CouponController::class);

    //################################  ]Documents  #####################################

    Route::resource('document',DocumentMasterController::class);

    //################################ Vehicle Type #######################################

    Route::resource('vehicleType',VehicleTypeController::class);
     

    Route::view('addDriver', 'livewire.register-driver')->name('addDriver');

    Route::resource('drivers',DriverController::class);

    Livewire::setScriptRoute(function ($handle) {
        return Route::get('/public/vendor/livewire/livewire.js', $handle);
    });
    
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/public/vendor/livewire/update', $handle);
    });
    });
    
    require __DIR__.'/auth.php';

    });


 








