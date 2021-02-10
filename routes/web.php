<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PagosPuestosMercadoController;
use App\Http\Controllers\PuestosMercadoController;
use App\Http\Controllers\SectorMercadoController;
use App\Http\Controllers\TipoPagoMercadoController;
use App\Http\Controllers\MatriculasMercadoController;
use App\Http\Controllers\UbicacionController;
use App\Models\SectorMercado;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioCamalController;
use App\Http\Controllers\ClienteCamalController;
use App\Http\Controllers\IngresoCamalController;
use App\Http\Controllers\MaestroDetalleIngresoController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalPorcinoController;
use App\Http\Controllers\CostoFeanamientoController;
use App\Http\Controllers\DistribucionController;
use App\Http\Controllers\AdministradorUsuarioCamalController;
use App\Http\Controllers\AjaxDistribucionController;
use App\Http\Controllers\AntemortenController;
use App\Http\Controllers\ClienteCamalHistorialIngresoController;
use App\Http\Controllers\GerenteCamalController;
use App\Http\Controllers\IngresoAnimalesExcelController;
use App\Http\Controllers\PfdIngresoCamalController;
use App\Http\Controllers\VideoVigilanciaCamalController;
use App\Http\Controllers\SupervisarPuestosMercadoController;
use App\Http\Controllers\CostoCamalController;
use App\Http\Controllers\MatriculaCamalController;
use App\Http\Controllers\FechaController;
use App\Http\Controllers\GerenteMercadoController;
use App\Http\Controllers\SupervisorIngresoCamalController;
use App\Http\Controllers\SupervisorDistribucionCamalController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PerfilCamalController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ClienteMercadoController;
use App\Http\Controllers\ComandosController;
use App\Http\Controllers\PersonalMercadoController;
use App\Http\Controllers\EmpleadosMercadoController;
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

use App\Http\Controllers\UsuarioMercadoController;
use App\Http\Controllers\PuestoMercadoController;
use App\Http\Controllers\UsuarioRolController;
use App\Models\Antemorten;
use App\Models\CostoFaenamiento;
use App\Models\MatriculasMercado;
use App\Models\PuestosMercado;
use App\Models\TipoPagoMercado;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cacheconfig', [ComandosController::class, 'cacheconfig']);
Route::get('migrate', [ComandosController::class, 'migrate']); 
Route::get('seed', [ComandosController::class, 'seed']); 
Route::get('migratefresh', [ComandosController::class, 'migratefresh'])->name('migratefresh');


/* Route::get('partesPorPieza/{id}', [AjaxDistribucionController::class, 'partesPorPieza']);
Route::get('partes/{id}', [AjaxDistribucionController::class, 'partes']); */
Route::get('partesIngresada/{id}', [AjaxDistribucionController::class, 'partesIngresada']);
//ajax
Route::get('/distribucion-camal/partes/{id}', [DistribucionController::class, 'partes2'])->name('/distribucion-camal/partes');
Route::get('/distribucion-camal/partesPorPieza/{id}', [DistribucionController::class, 'partesIngresada'])->name('/distribucion-camal/partesPorPieza');

/* Route::get('/partes', [DistribucionController::class, 'partes2'])->name('/distribucion-camal/partes'); */

Route::get('/distribucion-camal/distribucion', [DistribucionController::class, 'distribucion'])->name('/distribucion-camal/distribucion');
Route::get('/distribuciones-camal/showCabeceraDetalle/{id}', [DistribucionController::class, 'showCabeceraDetalle'])->name('distribucion-camal/showCabeceraDetalle');
Route::get('/distribucion-camal/pdfdistribucion/{id}', [DistribucionController::class, 'showPdf'])->name('distribucion-camal/pdfdistribucion');
Route::get('/distribucion-camal/actualizarPeso', [DistribucionController::class, 'actualizarPeso'])->name('/distribucion-camal/actualizarPeso');
Route::get('/distribucion-camal/actualizarPesoIngresada', [DistribucionController::class, 'actualizarPesoIngresada'])->name('/distribucion-camal/actualizarPesoIngresada');




Route::middleware(['auth:sanctum', 'verified'])->group(function () {





    Route::group(['middleware' => ['checkTeam:supervisor_mercado']], function () {
        Route::post('crear-usuarios-mercado', [UsuarioMercadoController::class, 'crearUsuarios'])->name('crear-usuarios-mercado');
        Route::resource('usuarios-mercado', UsuarioMercadoController::class);
        Route::resource('empleados-mercado', EmpleadosMercadoController::class);
        Route::resource('puestos-mercado', PuestoMercadoController::class)->names('puestos-mercado');
        Route::resource('sector-mercado', SectorMercadoController::class)->names('sector-mercado');
        Route::get('pagos-puesto-mercado/create2', [PagosPuestosMercadoController::class, 'create2']);
        Route::get('pagos-puesto-mercado/store2', [PagosPuestosMercadoController::class, 'store2']);
        Route::resource('tipo-pago-mercado', TipoPagoMercadoController::class)->names('tipo-pago-mercado');
        
       
        Route::resource('/supervisar-puestos-mercado', SupervisarPuestosMercadoController::class);
        Route::resource('matriculas-mercado', MatriculasMercadoController::class)->names('matriculas-mercado');
        //Route::get('matriculas-mercado/index',[MatriculasMercadoController::class, 'index']);
        Route::get('matriculas-mercado/create', [MatriculasMercadoController::class, 'create']);
        Route::post('matriculas-mercado-store', [MatriculasMercadoController::class, 'store']);
       /*  Route::get('pagos-puesto-mercado/create', [PagosPuestosMercadoController::class, 'createWithParams'])->name('create-pago-puesto-mercado');
        Route::post('pagos-puesto-mercado/store', [PagosPuestosMercadoController::class, 'store'])->name('store-pago-puesto-mercado'); */
        Route::post('matriculas-mercado/pdfmatriculasMercado', [MatriculasMercadoController::class, 'show']);
        Route::get('supervisormercado-fecha/index2', [FechaController::class, 'index2'])->name('supervisormercado-fecha');
        // Route::post('supervisormercado-fecha/store2', [FechaController::class, 'store2'])->name('supervisormercado-fecha');
        Route::post('supervisormercado-fecha/store2', [FechaController::class, 'store2'])->name('supervisormercado-fecha2');
    });
    Route::group(['middleware' => ['checkTeam:operario_mercado']], function () {
        Route::resource('pagos-puesto-mercado', PagosPuestosMercadoController::class)->names('pagos-puesto-mercado');
        Route::get('pagos-puesto-mercado/create', [PagosPuestosMercadoController::class, 'createWithParams'])->name('create-pago-puesto-mercado');
        Route::post('pagos-puesto-mercado/store', [PagosPuestosMercadoController::class, 'store'])->name('store-pago-puesto-mercado');
        Route::post('pagos-puesto-mercado/pdfpagosPuestoMercado', [PagosPuestosMercadoController::class, 'show']);

    });  

    Route::group(['middleware' => ['checkTeam:usuario-mercado']], function () {
        Route::resource('/cliente-mercado', ClienteMercadoController::class);
        Route::get('/cliente-matricula', [ClienteMercadoController::class,'show'])->name('cliente-matricula'); 
        Route::get('/cliente-mercado-pagos', [ClienteMercadoController::class,'pagos'])->name('cliente-mercado-pagos');
    
    });
   

    Route::group(['middleware' => ['checkTeam:supervisor_camal']], function () {
        Route::resource('costo-faenamiento', CostoFeanamientoController::class)->names('costo-faenamiento');
        Route::resource('costo-camal', CostoCamalController::class)->names('costo-camal');
        Route::resource('matricula-camal', MatriculaCamalController::class)->names('matricula-camal');
        Route::post('matricula-camal/pdfmatriculascamal', [MatriculaCamalController::class, 'show']);
        Route::resource('supervisorcamal-ingresos-camal', SupervisorIngresoCamalController::class)->names('supervisorcamal-ingresos-camal');
        Route::post('supervisorcamal-ingresos-camal/pdfingresoscamal', [SupervisorIngresoCamalController::class, 'show']);
        Route::resource('supervisorcamal-fecha', FechaController::class)->names('supervisorcamal-fecha');
        Route::resource('supervisorcamal-distribucion', SupervisorDistribucionCamalController::class)->names('supervisorcamal-distribucion');
        Route::post('supervisorcamal-distribucion/pdfdistribucionescamal', [SupervisorDistribucionCamalController::class, 'show']);
        Route::resource('usuarios', UserController::class);
        Route::resource('usuarios-camal', UsuarioCamalController::class);
    });

    Route::group(['middleware' => ['checkTeam:administrador_camal']], function () {
        Route::resource('/UsuarioCamal', UsuarioCamalController::class); //admin
        Route::resource('maestro-detalleIngreso', MaestroDetalleIngresoController::class); //admin
        Route::resource('pdf-ingreso', PfdIngresoCamalController::class)->names('pdf-ingreso');
        Route::post('IngresoCamal/testingpdf/{id}', [\App\Http\Controllers\IngresoCamalController::class, 'testingpdfupload']);

        Route::resource('/IngresoCamal', IngresoCamalController::class);
        Route::resource('/administrador-camal', AdministradorUsuarioCamalController::class);
    });


    Route::group(['middleware' => ['checkTeam:operario_camal']], function () {
        Route::get('/ubicacion/canton', [UbicacionController::class, 'cantones'])->name('/ubicacion/canton');
        Route::get('/ubicacion/parroquias', [UbicacionController::class, 'parroquias'])->name('/ubicacion/parroquias');
        Route::get('/ubicacion', [UbicacionController::class, 'index'])->name('ubicacion');
        Route::resource('/animal-camal', AnimalController::class);
        Route::resource('/animal-camal-porcino', AnimalPorcinoController::class);


        Route::get('testingpdf', [\App\Http\Controllers\UserController::class, 'testingpdf']);
        Route::post('testingpdf', [\App\Http\Controllers\UserController::class, 'testingpdfupload']);
        Route::get('/distribuciones-camal', [DistribucionController::class, 'index_distribuciones']);
        Route::resource('distribucion-camal', DistribucionController::class)->names('distribucion-camal');
        Route::get('/ulltimo_animal_sin_peso', [AnimalController::class, 'ulltimo_animal_sin_peso'])->name('/ulltimo_animal_sin_peso'); //faenador JSON usa operario
    });


    Route::group(['middleware' => ['checkTeam:cliente_camal']], function () {
        Route::resource('/cliente-camal', ClienteCamalController::class);

        Route::get('/piezas_distribucion', [ClienteCamalController::class, 'piezas_distribucion'])->name('/piezas_distribucion');
        Route::get('/cliente-historial-entrega-camal', [ClienteCamalController::class, 'historial_entrega'])->name('/cliente-historial-entrega-camal');

        Route::get('historial_entrega_detalles', [ClienteCamalController::class, 'historial_entrega_detalles'])->name('/historial_entrega_detalles'); //cliente
        Route::resource('/cliente-historial-ingreso', ClienteCamalHistorialIngresoController::class); //cliente

    });

    Route::group(['middleware' => ['checkTeam:veterinario']], function () {
        //E X C E L --------------------------------------------------------------------------------------
        Route::post('/excel-condiciones-transporte-mes', [IngresoAnimalesExcelController::class, 'mes_ingreso'])->name('excel-condiciones-transporte-mes');
        Route::get('excel-condiciones-transporte-reporte/{fecha}', [\App\Http\Controllers\IngresoAnimalesExcelController::class, 'condicionesTransporteExcel'])->name('excel-condiciones-transporte-reporte');
        Route::get('excel-recepcion-animal', [IngresoAnimalesExcelController::class, 'index_recepcion_animal'])->name('excel-recepcion-animal');
        Route::post('/excel-recepcion-animal-mes', [IngresoAnimalesExcelController::class, 'mes_recepcion_animal'])->name('excel-recepcion-animal-mes');
        Route::post('/excel-recepcion-animal-dia', [IngresoAnimalesExcelController::class, 'dia_recepcion_animal'])->name('excel-recepcion-animal-dia');
        Route::get('excel-recepcion-animal-reporte/{fecha}', [\App\Http\Controllers\IngresoAnimalesExcelController::class, 'recepcionAnimalExcel'])->name('excel-recepcion-animal-reporte');
        Route::resource('excel-condiciones-transporte', IngresoAnimalesExcelController::class)->names('excel-condiciones-transporte');
        //  PDF
        Route::get('/excel-condiciones-transporte-mes/pdfMensual/{fecha}', [IngresoAnimalesExcelController::class, 'showCondicionesTransportePdf'])->name('excel-condiciones-transporte-mes/pdfMensual');
        Route::get('/excel-recepcion-animal-dia/pdfMensualRecepcionAnimal/{fecha}', [IngresoAnimalesExcelController::class, 'showRecepcionAnimalesPdf'])->name('excel-recepcion-animal-dia/pdfMensualRecepcionAnimal');

        //  C A M A L -- V E T E R I N A R I O-------------------------------------------------------------------
        Route::get('antemortenExcel/{fecha}', [\App\Http\Controllers\AntemortenController::class, 'antemortenExcel'])->name('antemorten');
        Route::post('antemorten/store', [AntemortenController::class, 'store2'])->name('antemorten.store2');
        Route::resource('antemorten', AntemortenController::class);
    });

    Route::group(['middleware' => ['checkTeam:gerente']], function () {
        Route::resource('/gerente-camal', GerenteCamalController::class);
        Route::get('/mes-ingreso', [GerenteCamalController::class, 'mes_ingreso'])->name('gerente-camal.mes_ingreso'); //gerente
        Route::get('/dia-ingreso', [GerenteCamalController::class, 'dia_ingreso'])->name('dia-ingreso.dia_ingreso'); //gerente
        Route::get('/detallesCondicion', [GerenteCamalController::class, 'detallesCondicion'])->name('/detallesCondicion'); //gerente
        Route::get('/gerente-camal/detallesDistribucion/{id_ingreso}', [GerenteCamalController::class, 'detallesDistribucion'])->name('/gerente-camal/detallesDistribucion'); //gerente
        Route::resource('/video-vigilancia', VideoVigilanciaCamalController::class); //gerente
        Route::get('/gerentecosto-camal', [GerenteCamalController::class, 'costo_camal'])->name('/gerentecosto-camal'); //gerente
        //M E R C A D O

        Route::get('/gerente-mercado/calculos', [GerenteMercadoController::class, 'calculos'])->name('gerente-mercado/calculos');
        //Route::post('/calcularMes', [GerenteMercadoController::class, 'calcularMes'])->name('gerente-mercado.calcularMes'); //gerente
        Route::get('/calcularMes', [GerenteMercadoController::class, 'calcularMes'])->name('gerente-mercado.calcularMes'); //gerente
        Route::get('/calcularDia', [GerenteMercadoController::class, 'calcularDia'])->name('gerente-mercado.calcularDia'); //gerente
        Route::get('/calcularAnio', [GerenteMercadoController::class, 'calcularAnio'])->name('gerente-mercado.calcularAnio'); //gerente
        Route::resource('gerente-mercado', GerenteMercadoController::class);
    });

    Route::group(['middleware' => ['checkTeam:superadmin']], function () {
        Route::resource('/superadmin-personal', PersonalController::class);
        Route::get('/activar-usuarios/{id}', [PersonalController::class, 'activar_usuarios'])->name('/activar-usuarios'); //superadministrador    
        Route::get('/usuarios-rol/showMercado/{id}', [UsuarioRolController::class, 'showMercado'])->name('/usuarios-rol/showMercado');
        Route::resource('usuarios-rol', UsuarioRolController::class); //superadministrador
        Route::get('/activar-usuarios-mercado/{id}', [PersonalMercadoController::class, 'activar_usuarios_mercado'])->name('/activar-usuarios-mercado'); //superadministrador 
        Route::resource('/superadmin-personal-mercado', PersonalMercadoController::class);
    });

    Route::get('/piezas', [AnimalController::class, 'piezas'])->name('/piezas'); //JSON usa faenador y cliente
    Route::get('/piezas_a', [AnimalController::class, 'piezas_a'])->name('/piezas_a'); // JSON Cliente y gerente
    Route::get('/detalles', [MaestroDetalleIngresoController::class, 'detalles'])->name('/detalles'); //JSON usa admin y gerente tambien supervisor
    Route::get('/piezas_pesos', [ClienteCamalController::class, 'piezas_pesos'])->name('/piezas_pesos'); //JSON usa clientes y gerente
    Route::get('/piezas_pesos_HistotialEntrega_detalle', [ClienteCamalController::class, 'piezas_pesos_HistotialEntrega_detalle'])->name('/piezas_pesos_HistotialEntrega_detalle'); //gerente y cliente JSON
    Route::get('IngresoCamal/pdfdownload/{id}', [\App\Http\Controllers\IngresoCamalController::class, 'pdfdownload']); //admin y gerente
    Route::get('/roles', [PersonalController::class, 'roles'])->name('/roles');

    Route::get('/cambiar-rol/{id_user}/{id_team}', [PerfilCamalController::class, 'cambiar_rol'])->name('/cambiar-rol');
    Route::resource('/profile', PerfilCamalController::class)->names('/profile');

    //--------------------------------------------  TESTING------------------------------------------------------
    Route::get('testingexcel', [\App\Http\Controllers\UserController::class, 'testingxlsx']);
    /*     Route::get('testingpdf', [\App\Http\Controllers\UserController::class, 'testingpdf']);
    Route::post('testingpdf', [\App\Http\Controllers\UserController::class, 'testingpdfupload']); */
    Route::get('pdfdownload/{id}', [\App\Http\Controllers\UserController::class, 'pdfdownload']);


    Route::get('/dashboard', function () {
        if (Auth::user()->current_team_id == 2) { //2=> (rol)gerente
            return redirect('/gerente-camal');
        } elseif (Auth::user()->current_team_id == 3) { //3=> (rol)supervisor_camal
            return redirect('/usuarios-camal');
        } else if (Auth::user()->current_team_id == 4) { //4=> (rol)operario_camal
            return redirect('/animal-camal');
        } else if (Auth::user()->current_team_id == 5) { //5=> (rol)administrador_camal
            return redirect('/administrador-camal');
        } else if (Auth::user()->current_team_id == 9) { //9=> (rol)veterinario
            return redirect('/antemorten');
        } else if (Auth::user()->current_team_id == 8) { //8=> (rol)cliente_camal
            return redirect('/cliente-camal');
        } else if (Auth::user()->current_team_id == 1) { //1=> (rol)superadmin-personal
            return redirect('/superadmin-personal'); 
        }else if (Auth::user()->current_team_id == 10) { //10=> (rol)usuario-mercado
            return redirect('/cliente-mercado');  // operario_camal
        }else if (Auth::user()->current_team_id == 7) { //4=> (rol)operario_mercado
            return redirect('/pagos-puesto-mercado');  // 
        }
        else if (Auth::user()->current_team_id == 6) { //4=> (rol)supervisor_mercado
            return redirect('/usuarios-mercado');  // 
        }
        return view('dashboardlte');
    })->name('dashboardlte');
});
