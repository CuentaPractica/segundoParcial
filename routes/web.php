<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Detalle_pedidoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\Detalle_ventaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\Detalle_reservaController;
use App\Http\Controllers\ReporteController;
use App\Models\Persona;
use App\Models\User;

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

Route::get('/datos', function () {
    $personal= new Persona();
    $personal->nombre= 'Luisa';
    $personal->apellidos= 'Mamani Gutierrez';
    $personal->CI= '8945632';
    $personal->telefono= '74532185';
    $personal->direccion= 'Ayacucjo';
    $personal->tipo= 'A';
    $personal->save();

    $user=new User();
    $user->email='luisa@gmail.com';
    $user->password=bcrypt('12345');
    $user->idPersona=$personal->id;
    $user->save();
});
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout',[LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function(){

Route::middleware(['administrador'])->group(function(){
Route::group(['prefix'=>'categoria'],function(){
    Route::get('/', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/', [CategoriaController::class, 'store'] )->name('categoria.store');
    Route::get('/edit/{id}', [CategoriaController::class, 'edit'] )->name('categoria.edit');
    Route::put('/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::get('/{id}',[CategoriaController::class, 'destroy'])->name('categoria.destroy');
});
Route::group(['prefix'=>'marca'],function(){
    Route::get('/', [MarcaController::class, 'index'])->name('marca.index');
    Route::get('/create', [MarcaController::class, 'create'])->name('marca.create');
    Route::post('/', [MarcaController::class, 'store'] )->name('marca.store');
    Route::get('/edit/{id}', [MarcaController::class, 'edit'] )->name('marca.edit');
    Route::put('/{id}', [MarcaController::class, 'update'])->name('marca.update');
    Route::get('/{id}',[MarcaController::class, 'destroy'])->name('marca.destroy');
});
Route::group(['prefix'=>'pago'],function(){
    Route::get('/', [PagoController::class, 'index'])->name('pago.index');
    Route::get('/create', [PagoController::class, 'create'])->name('pago.create');
    Route::post('/', [PagoController::class, 'store'] )->name('pago.store');
    Route::get('/edit/{id}', [PagoController::class, 'edit'] )->name('pago.edit');
    Route::put('/{id}', [PagoController::class, 'update'])->name('pago.update');
    Route::get('/{id}',[PagoController::class, 'destroy'])->name('pago.destroy');
});
Route::group(['prefix'=>'descuento'],function(){
    Route::get('/', [DescuentoController::class, 'index'])->name('descuento.index');
    Route::get('/create', [DescuentoController::class, 'create'])->name('descuento.create');
    Route::post('/', [DescuentoController::class, 'store'] )->name('descuento.store');
    Route::get('/edit/{id}', [DescuentoController::class, 'edit'] )->name('descuento.edit');
    Route::put('/{id}', [DescuentoController::class, 'update'])->name('descuento.update');
    Route::get('/{id}',[DescuentoController::class, 'destroy'])->name('descuento.destroy');
});
Route::group(['prefix'=>'personal'],function(){
    Route::get('/', [PersonalController::class, 'index'])->name('personal.index');
    Route::get('/create', [PersonalController::class, 'create'])->name('personal.create');
    Route::post('/', [PersonalController::class, 'store'] )->name('personal.store');
    Route::get('/edit/{id}', [PersonalController::class, 'edit'] )->name('personal.edit');
    Route::put('/{id}', [PersonalController::class, 'update'])->name('personal.update');
    Route::get('/{id}',[PersonalController::class, 'destroy'])->name('personal.destroy');
});
Route::group(['prefix'=>'repuesto'],function(){
    Route::get('/', [RepuestoController::class, 'index'])->name('repuesto.index');
    Route::get('/create', [RepuestoController::class, 'create'])->name('repuesto.create');
    Route::post('/', [RepuestoController::class, 'store'] )->name('repuesto.store');
    Route::get('/edit/{id}', [RepuestoController::class, 'edit'] )->name('repuesto.edit');
    Route::put('/{id}', [RepuestoController::class, 'update'])->name('repuesto.update');
    Route::get('/{id}',[RepuestoController::class, 'destroy'])->name('repuesto.destroy');
});
Route::group(['prefix'=>'proveedor'],function(){
    Route::get('/', [ProveedorController::class, 'index'])->name('proveedor.index');
    Route::get('/buscar',[ProveedorController::class, 'buscar'])->name('proveedor.buscar'); 
    Route::get('/create', [ProveedorController::class, 'create'])->name('proveedor.create');
    Route::post('/', [ProveedorController::class, 'store'] )->name('proveedor.store');
    Route::get('/edit/{id}', [ProveedorController::class, 'edit'] )->name('proveedor.edit');
    Route::put('/{id}', [ProveedorController::class, 'update'])->name('proveedor.update');
    Route::get('/{id}',[ProveedorController::class, 'destroy'])->name('proveedor.destroy');
});
Route::group(['prefix'=>'pedido'],function(){
    Route::get('/', [PedidoController::class, 'index'])->name('pedido.index');  
    Route::get('/create/{id}', [PedidoController::class, 'create'])->name('pedido.create');
    Route::post('/', [PedidoController::class, 'store'] )->name('pedido.store');
    Route::get('/edit/{id}', [PedidoController::class, 'edit'] )->name('pedido.edit');
    Route::put('/{id}', [PedidoController::class, 'update'])->name('pedido.update');
    Route::get('/{id}',[PedidoController::class, 'destroy'])->name('pedido.destroy');   
});
Route::group(['prefix'=>'detalle_pedido'],function(){
    Route::get('/', [Detalle_pedidoController::class, 'index'])->name('detalle_pedido.index'); 
    Route::get('/create/{id}', [Detalle_pedidoController::class, 'create'])->name('detalle_pedido.create');
    Route::post('/{id}', [Detalle_pedidoController::class, 'store'] )->name('detalle_pedido.store');
    Route::get('/edit/{id}', [Detalle_pedidoController::class, 'edit'] )->name('detalle_pedido.edit');
    Route::put('/{id}', [Detalle_pedidoController::class, 'update'])->name('detalle_pedido.update');
    Route::get('/{id}/{pedido_id}',[Detalle_pedidoController::class, 'destroy'])->name('detalle_pedido.destroy');   
});

Route::group(['prefix'=>'reporte'],function(){
    Route::get('/productos', [ReporteController::class, 'productos'])->name('reporte.productos');
    Route::get('/ventasActuales', [ReporteController::class, 'ventasActuales'])->name('reporte.ventasActuales'); 
    Route::get('/ventasG', [ReporteController::class, 'ventasG'])->name('reporte.ventasG'); 
});
});

Route::get('repuesto/', [RepuestoController::class, 'index'])->name('repuesto.index');

Route::group(['prefix'=>'cliente'],function(){
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/buscar',[ClienteController::class, 'buscar'])->name('cliente.buscar');  
    Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/', [ClienteController::class, 'store'] )->name('cliente.store');
    Route::get('/edit/{id}', [ClienteController::class, 'edit'] )->name('cliente.edit');
    Route::put('/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::get('/{id}',[ClienteController::class, 'destroy'])->name('cliente.destroy');   
});
Route::group(['prefix'=>'venta'],function(){
    Route::get('/', [VentaController::class, 'index'])->name('venta.index');
    Route::get('/buscar',[VentaController::class, 'buscar'])->name('venta.buscar');  
    Route::get('/create/{id}', [VentaController::class, 'create'])->name('venta.create');
    Route::post('/', [VentaController::class, 'store'] )->name('venta.store');
    Route::get('/edit/{id}', [VentaController::class, 'edit'] )->name('venta.edit');
    Route::put('/{id}', [VentaController::class, 'update'])->name('venta.update');
    Route::get('/{id}',[VentaController::class, 'destroy'])->name('venta.destroy');   
});
Route::group(['prefix'=>'detalle_venta'],function(){
    Route::get('/', [Detalle_ventaController::class, 'index'])->name('detalle_venta.index');
    Route::get('/buscar',[Detalle_ventaController::class, 'buscar'])->name('detalle_venta.buscar');  
    Route::get('/create/{id}', [Detalle_ventaController::class, 'create'])->name('detalle_venta.create');
    Route::get('/venderReserva/{id}', [Detalle_ventaController::class, 'venderReserva'])->name('detalle_venta.venderReserva');
    Route::post('/{id}', [Detalle_ventaController::class, 'store'] )->name('detalle_venta.store');
    Route::get('/edit/{id}', [Detalle_ventaController::class, 'edit'] )->name('detalle_venta.edit');
    Route::put('/{id}', [Detalle_ventaController::class, 'update'])->name('detalle_venta.update');
    Route::get('/{id}/{venta_id}',[Detalle_ventaController::class, 'destroy'])->name('detalle_venta.destroy');   
});
Route::group(['prefix'=>'reserva'],function(){
    Route::get('/', [ReservaController::class, 'index'])->name('reserva.index');
    Route::get('/buscar',[ReservaController::class, 'buscar'])->name('reserva.buscar');  
    Route::get('/create/{id}', [ReservaController::class, 'create'])->name('reserva.create');
    Route::post('/', [ReservaController::class, 'store'] )->name('reserva.store');
    Route::get('/edit/{id}', [ReservaController::class, 'edit'] )->name('reserva.edit');
    Route::put('/{id}', [ReservaController::class, 'update'])->name('reserva.update');
    Route::get('/{id}',[ReservaController::class, 'destroy'])->name('reserva.destroy');   
});
Route::group(['prefix'=>'detalle_reserva'],function(){
    Route::get('/', [Detalle_reservaController::class, 'index'])->name('detalle_reserva.index');
    Route::get('/buscar',[Detalle_reservaController::class, 'buscar'])->name('detalle_reserva.buscar');  
    Route::get('/create/{id}', [Detalle_reservaController::class, 'create'])->name('detalle_reserva.create');
    Route::post('/{id}', [Detalle_reservaController::class, 'store'] )->name('detalle_reserva.store');
    Route::get('/edit/{id}', [Detalle_reservaController::class, 'edit'] )->name('detalle_reserva.edit');
    Route::put('/{id}', [Detalle_reservaController::class, 'update'])->name('detalle_reserva.update');
    Route::get('/{id}/{reserva_id}',[Detalle_reservaController::class, 'destroy'])->name('detalle_reserva.destroy');   
});


});



