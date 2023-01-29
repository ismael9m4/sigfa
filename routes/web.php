<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LeakageController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\DetectionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::get('/users',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users/create', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update/', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
*/
Route::resource('users',UserController::class);

Route::group(['middleware'=>'admin',['namespace'=>'Admin']],function(){
    Route::resource('devices',DeviceController::class);
    Route::resource('sensors',SensorController::class);
    Route::resource('readings',ReadingController::class);
    Route::resource('panels',PanelController::class);
    Route::resource('leakages',LeakageController::class);
    Route::resource('detections',DetectionController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('pipelines',PipelineController::class);
    Route::get('/reporte/pdf', [App\Http\Controllers\HomeController::class, 'generarPdf'])->name('reporte.pdf');
});

Route::resource('readings',ReadingController::class);
Route::resource('leakages',LeakageController::class);
Route::resource('detections',DetectionController::class);
Route::resource('pipelines',PipelineController::class);
Route::resource('incidents',IncidentController::class);
Route::resource('levels',LevelController::class);
Route::get('/incidents/create', [App\Http\Controllers\IncidentController::class, 'create'])->name('incidents.create');
Route::post('/incidents/create', [App\Http\Controllers\IncidentController::class, 'store'])->name('incidents.store');
Route::get('/levels/create', [App\Http\Controllers\LevelController::class, 'create'])->name('levels.create');
Route::post('/levels/create', [App\Http\Controllers\LevelController::class, 'store'])->name('levels.store');

Route::get('/prediccion',[App\Http\Controllers\PanelController::class, 'prediccion'])->name('panels.prediccion');
Route::get('/redimiento',[App\Http\Controllers\PanelController::class, 'rendimiento'])->name('panels.rendimiento');
Route::get('/notificaciones',[App\Http\Controllers\PanelController::class, 'notificaciones'])->name('panels.notificaciones');
Route::get('/shownotificaciones/{id}',[App\Http\Controllers\PanelController::class, 'shownotificaciones'])->name('panels.shownotificaciones');
Route::resource('funcion','PanelController');
Route::get('markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
