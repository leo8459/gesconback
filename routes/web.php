<?php

use App\Http\Controllers\CarteroController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SucursaleController;
use App\Models\SolicitudeController;
use App\Models\Sucursale;
use App\Http\Controllers\UserController;


Route::group(['prefix'=>'api'],function(){
    Route::post('/login', [UserController::class, 'login']); // Login de Usuario
    Route::post('/login2', [SucursaleController::class, 'login']); // Login de Sucursal
    Route::post('/login3', [CarteroController::class, 'login3']); // Login de Sucursal
    // Route::post('/login2','ClienteController@login2');//solo para logear


    Route::get('/dashboard','DashboardController@patito');//solo para logear


    // Route::get('/ver1/{seccionId}', [CasillaController::class, 'obtenercasillas']);

    Route::apiResource('/users','UserController');
    Route::apiResource('/empresas','EmpresaController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/sucursales','SucursaleController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/tarifas','TarifaController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/solicitudes','SolicitudeController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/encargados','EncargadoController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/carteros','CarteroController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/asignar','DetallecarteroController');  //editar agragar eliminar listar apiresource

    Route::put('/solicitudesrecojo/{solicitude}/', 'SolicitudeController@markAsEnCamino');
    Route::put('/solicitudesentrega/{solicitude}/', 'SolicitudeController@markAsEntregado');
    Route::put('/marcarrecogido/{solicitude}/', 'SolicitudeController@marcarRecogido');


  
    




});





Route::group(['prefix'=>'cliente'],function(){
});





Route::group(['prefix'=>'cajero'],function(){
    Route::apiResource('/users','UserController');
    Route::apiResource('/categorias','CategoriaController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/secciones','SeccioneController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/clientes','ClienteController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/casillas','CasillaController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/alquileres','AlquilereController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/precios','PrecioController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/cajeros','CajeroController');  //editar agragar eliminar listar apiresource
    Route::apiResource('/llaves','LlavesController');  //editar agragar eliminar listar apiresource

    Route::post('/login3','CajeroController@login3');//solo para logear
    Route::get('/ver3/{busquedaid}','CasillaController@busquedas');//solo para logear

    Route::get('/ver1/{seccionId}','CasillaController@obtenercasillas');//solo para logear
    Route::get('/ver2/{seccionId}', 'CasillaController@obtenerInformacionAlquileres');
    Route::get('/fecha/{alquilerId}', 'AlquilereController@verificarFechaPorVencer');
    Route::get('/reportes/alquileres/{alquilere}', 'AlquilereController@pdf');


    Route::get('/dashboard','DashboardController@patito');//solo para logear
    
});








Route::get('/', function () {
    return view('welcome');
  
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
