<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CotItemsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CondGralController;
use App\Http\Controllers\CotEstadoController;
use App\Http\Controllers\CotExpiraController;
use App\Http\Controllers\CotFPagoController;
use App\Http\Controllers\CotMonedaController;
use App\Http\Controllers\CotPieController;
use App\Http\Controllers\CotTEntregaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PrioridadController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\IgvController;
use App\Http\Controllers\OcclienteController;
use App\Http\Controllers\OpedidoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\EstadoOcpController;
use App\Http\Controllers\OcpItemsController;
use App\Http\Controllers\OcProveedorController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\UnidadMController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\GuiaSaController;
use App\Http\Controllers\FtinController;
use App\Http\Controllers\FtoutController;
use App\Http\Controllers\FichaTecnicaController;

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

/*Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::resource('User-admin', UsuarioController::class);
});*/


Route::group(['middleware' => ['auth']], function(){
	Route::resource('User-admin', UsuarioController::class);
	Route::resource('Almacen', AlmacenController::class);
	Route::resource('Cliente', ClienteController::class);
	Route::resource('Producto', ProductoController::class);
	Route::resource('Proveedor', ProveedorController::class);
	Route::resource('Cotizacion', VentasController::class);
	Route::resource('Area', AreaController::class);
	Route::resource('Cargo', CargosController::class);
	Route::resource('Categorias', CategoriasController::class);
	Route::resource('CondicionGral', CondGralController::class);
	Route::resource('EstadoCot', CotEstadoController::class);
	Route::resource('ExpiraCot', CotExpiraController::class);
	Route::resource('FPagoCot', CotFPagoController::class);
	Route::resource('MonedaCot', CotMonedaController::class);
	Route::resource('PieCot', CotPieController::class);
	Route::resource('TEntregaCot', CotTEntregaController::class);
	Route::resource('Estado', EstadoController::class);
	Route::resource('roles', RolController::class);
	Route::resource('Igv', IgvController::class);
	Route::resource('Opedido', OpedidoController::class);
	Route::resource('Occliente', OcclienteController::class);
	Route::resource('permisos', PermissionController::class);
	Route::resource('Compras', ComprasController::class);
	Route::resource('EstadoOcp', EstadoOcpController::class);
	Route::resource('OcProveedor', OcProveedorController::class);
	Route::resource('Fabricante', FabricanteController::class);
	Route::resource('Modelo', ModeloController::class);
	Route::resource('Lote', LoteController::class);
	Route::resource('Unidad_M', UnidadMController::class);
	Route::resource('Guia_In', GuiaController::class);
	Route::resource('Guia_Sa', GuiaSaController::class);
	Route::resource('Ftin', FtinController::class);
	Route::resource('Ftout', FtoutController::class);

	Route::get('Evaluaciones', [EvaluacionController::class, 'vista']) ->name('Evaluaciones_vista');
	Route::get('Ordenes de trabajo', [EvaluacionController::class, 'vista_eva']) ->name('Evaluaciones_vista_eva');
	Route::get('Evaluaciones_crear/{id_cot}', [EvaluacionController::class, 'crear']) ->name('Evaluaciones_crear');
	Route::post('Evaluaciones_guardar', [EvaluacionController::class, 'guardar']) ->name('Evaluaciones_guardar');
	Route::post('Evaluaciones_guardarop', [EvaluacionController::class, 'guardarop']) ->name('Evaluaciones_guardarop');
	Route::get('Evaluaciones_editar/{id_eval}', [EvaluacionController::class, 'editar']) ->name('Evaluaciones_editar');
	Route::delete('Evaluaciones_eliminar/{id_eval}', [EvaluacionController::class, 'eliminar']) ->name('Evaluaciones_eliminar');
	Route::get('items/{id_cot}', [ItemsController::class, 'registrar']) ->name('registro_item');
	Route::post('guardar/{id_cot}', [ItemsController::class, 'guardar']) ->name('guardar_item');
	Route::delete('eliminar/{id_it}/{id_co}', [ItemsController::class, 'eliminar']) ->name('eliminar_item');
	Route::get('itemsocp/{id_ocp}', [OcpItemsController::class, 'registrarocp']) ->name('registro_item_ocp');
	Route::post('guardarocp/{id_ocp}', [OcpItemsController::class, 'guardarocp']) ->name('guardar_item_ocp');
	Route::delete('eliminarocp/{id_it}/{id_co}', [OcpItemsController::class, 'eliminarocp']) ->name('eliminar_item_ocp');
});

Route::view('/', 'auth.login')->name('login');
Route::view('Register', 'auth.register') ->name('registro');
Route::view('Home', 'home') ->name('home');

Route::get('Ordenes de trabajo/detalles/{id_eval}', [EvaluacionController::class, 'detallesot']) ->name('detallesot');
Route::get('Evaluaciones/detalles/{id_eval}', [EvaluacionController::class, 'detalleseva']) ->name('detalleseva');
Route::get('exportar-pdf/{id_cot}', [GeneralController::class, 'exportarpdf']) ->name('pdf');
Route::get('pdf-ocp/{id_ocp}', [GeneralController::class, 'pdfocp']) ->name('pdf_ocp');
Route::get('detalles/stock', [GeneralController::class, 'stockdetalles']) ->name('stockdetalles');
Route::get('dashboard', [GeneralController::class, 'dashboard']) ->name('dashboard');
Route::get('cotizacion/clientes', [SearchController::class, 'searchclientes'])->name('search_cliente');
Route::get('cotizacion/prod', [SearchController::class, 'searchprod'])->name('cotizacion_prod');
Route::get('num/parte', [SearchController::class, 'numparte'])->name('num_parte');
Route::get('evaluacion/asignado', [SearchController::class, 'searchasig'])->name('evaluacion_asignado');
Route::get('codcot/entrega', [SearchController::class, 'searchcodcot'])->name('codcot_entrega');
Route::get('ruc/proveedor', [SearchController::class, 'searchrucprov'])->name('ruc_proveedor');
Route::get('rucprov/razons', [SearchController::class, 'searchprov'])->name('rucprov_razons');
Route::get('stock/items', [SearchController::class, 'searchitems'])->name('stock_items');
Route::get('stock/items/detalles', [SearchController::class, 'searchitems2'])->name('stock_item_detalles');
Route::get('pro/razons', [SearchController::class, 'searchprazons'])->name('pro_razons');
Route::get('cli/razons', [SearchController::class, 'searchcrazons'])->name('cli_razons');
Route::get('item/compras', [SearchController::class, 'searchprodop'])->name('item_compras');
Route::get('rucc/razons', [SearchController::class, 'searchclienteruc'])->name('ruc_cliente');
Route::get('ocp/items', [SearchController::class, 'searchocpitem'])->name('item_ocp');
Route::get('ocp/rucprov', [SearchController::class, 'searchocp'])->name('cod_ocp');
Route::get('op/opcod', [SearchController::class, 'searchop'])->name('cod_op');
Route::get('occ/codocc', [SearchController::class, 'searchocc'])->name('cod_occliente');
Route::get('guia/entrada', [SearchController::class, 'searchgin'])->name('guia_entrada');
Route::get('guia/salida', [SearchController::class, 'searchgsal'])->name('guia_salida');
Route::get('buscar/ocp', [SearchController::class, 'buscarocp'])->name('buscar_ocp');
Route::get('buscar/numocc', [SearchController::class, 'searchnumocc'])->name('buscar_numocc');
Route::get('buscar/clientes', [SearchController::class, 'buscarcliente'])->name('buscar_cliente');
Route::get('buscar/proveedor', [SearchController::class, 'buscarproveedor'])->name('buscar_proveedor');
Route::post('download/file', [GeneralController::class, 'downloadfile'])->name('download');

Auth::routes();


