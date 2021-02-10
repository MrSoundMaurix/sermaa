<?php

namespace App\Http\Controllers;

use App\Models\CabeceraDistribucion;
use App\Models\IngresoCamal;
use App\Models\MatriculasMercado;
use App\Models\PagosPuestoMercado;
use App\Models\PuestoMercado;
use App\Models\PuestosMercado;
use App\Models\SectorMercado;
use App\Models\TipoPagoMercado;
use Illuminate\Http\Request;

class GerenteMercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sectorMercado = null;
        try {

            $sector_mercado = SectorMercado::with('puestos')->orderBy('id', 'desc')->paginate(15);

            // dd($sectorMercado);
            $tipos_pago_mercado = TipoPagoMercado::all()->where('categoria', '=', 0);
            $puestos_mercado = PuestosMercado::paginate(15);
            $matriculas_mercado = MatriculasMercado::paginate(20);
            //$no_matriculas_mercado = MatriculasMercado::join();

           // dump($tipos_pago_mercado);
            //dd($matriculas_mercado);
            // return view('sectorMercado.index', ['sectorMercado' => $sectorMercado, 'tipos_pago_mercado' => $tipos_pago_mercado]);
            return view('gerente.gerente-mercado.index', compact('sector_mercado', 'tipos_pago_mercado', 'puestos_mercado', 'matriculas_mercado'));
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
        //return view('gerente.gerente-mercado.index', compact('sector_mercado', 'tipos_pago_mercado'));
    }


    public function calculos(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchT'));
        }
        if ($query != "") {
            $ingresoscamal = IngresoCamal::with('users')
                ->whereHas('users', function ($q) use ($query) {
                    $q->where('nombres', 'like', '%' . $query . '%')
                        ->orwhere('apellidos', 'like', '%' . $query . '%')
                        ->orwhere('codigo', 'like', '%' . $query . '%');
                })->orwhere('ingresos.id', 'like', '%' . $query . '%')
                ->orwhere('ingresos.matricula', 'like', '%' . $query . '%')
                ->paginate(10);
        } else {
            $ingresoscamal = IngresoCamal::with('users')
                ->orderby('ingresos.fecha_ingreso', 'desc')
                ->paginate(10);
        }


        $fecha_mes = "";
        $fecha_anio = "";
        $fecha_dia = "";


        $pagos_puestos_mercado = PagosPuestoMercado::paginate(10);
        $matriculas_mercado = MatriculasMercado::paginate(10);
        $resumen_matriculas = $this->matriculas($matriculas_mercado);
        $resumen_arrendamiento = $this->arrendamientos($pagos_puestos_mercado);

        // dd($idCabeceraDistribucion[0]->id_ingresos);
        if ($request->get('page') == "") {
            $page = "";
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "pagos_puestos_mercado" => $pagos_puestos_mercado, "searchT" => $query,  'fecha_anio' => $fecha_anio, 'fecha_dia' => $fecha_dia, 'fecha_mes' => $fecha_mes, 'page' => $page]);
        } else {
            $page = $request->get('page');
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "pagos_puestos_mercado" => $pagos_puestos_mercado, "searchT" => $query, 'fecha_anio' => $fecha_anio, 'fecha_dia' => $fecha_dia, 'fecha_mes' => $fecha_mes, 'page' => $page]);
        }
    }


    public function calcularMes(Request $request)
    {
        $fecha_mes = $request->get('fecha_mes');
        $fecha_mesA = trim($request->get('fecha_mes_ingreso'));

        if (($fecha_mesA == "")) {
            return redirect('gerente-mercado/calculos');
        }
        if ($fecha_mes != "") {
            $fecha_mesA = $fecha_mes;
            $fecha_mes = $request->get('fecha_mes');
        } else {
            $fecha_mesA = trim($request->get('fecha_mes_ingreso'));
            $fecha_mes = trim($request->get('fecha_mes_ingreso'));
        }

        $fecha_ingresoT = explode('-', $fecha_mesA);

        $mes = $fecha_ingresoT[0];
        $anio = $fecha_ingresoT[1];

        //  dd($fecha_ingresoT);
        if ($request) {
            $query = trim($request->get('searchT'));
        }
        //Consulta sin pagintae

        $pagos_puestos_mercado = PagosPuestoMercado::whereYear('fecha_pago', '=', $anio)
            ->whereMonth('fecha_pago', '=', $mes)
            ->orderby('fecha_pago', 'desc')
            ->get();
        $matriculas_mercado = MatriculasMercado::whereYear('fecha_matricula', '=', $anio)
            ->whereMonth('fecha_matricula', '=', $mes)
            ->orderby('fecha_matricula', 'desc')
            ->get();

        $resumen_matriculas = $this->matriculas($matriculas_mercado);
        $resumen_arrendamiento = $this->arrendamientos($pagos_puestos_mercado);
        //dump($resumen_arrendamiento);

        ///Consulta con paginate
        $pagos_puestos_mercado = PagosPuestoMercado::whereYear('fecha_pago', '=', $anio)
            ->whereMonth('fecha_pago', '=', $mes)
            ->orderby('fecha_pago', 'desc')
            ->paginate(10);

        $matriculas_mercado = MatriculasMercado::whereYear('fecha_matricula', '=', $anio)
            ->whereMonth('fecha_matricula', '=', $mes)
            ->orderby('fecha_matricula', 'desc')
            ->paginate(10);


        $fecha_dia = "";
        $fecha_anio = "";

        if ($request->get('page') == "") {
            $page = "";
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "searchT" => $query,  'fecha_anio' => $fecha_anio, 'fecha_dia' => $fecha_dia, 'fecha_mes' => $fecha_mes, 'page' => $page, 'pagos_puestos_mercado' => $pagos_puestos_mercado]);
        } else {
            $page = $request->get('page');
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "searchT" => $query,  'fecha_anio' => $fecha_anio, 'fecha_dia' => $fecha_dia, 'fecha_mes' => $fecha_mes, 'page' => $page, 'pagos_puestos_mercado' => $pagos_puestos_mercado]);
        }
    }


    public function calcularAnio(Request $request)
    {
        $fecha_anio = $request->get('fecha_anio');
        $fecha_ingresoT = trim($request->get('fecha_anio_ingreso'));
        if (($fecha_ingresoT == "")) {
            return redirect('gerente-mercado/calculos');
        }
        if ($fecha_anio != "") {
            $fecha_ingresoT = $fecha_anio;
        } else {
            $fecha_ingresoT = trim($request->get('fecha_anio_ingreso'));
            $fecha_anio = $fecha_ingresoT;
        }

        //  dd($fecha_ingresoT);
        if ($request) {
            $query = trim($request->get('searchT'));
        }
        //Consulta sin pagintae

        $pagos_puestos_mercado = PagosPuestoMercado::whereYear('fecha_pago', '=', $fecha_anio)
            ->orderby('fecha_pago', 'desc')
            ->get();
        $matriculas_mercado = MatriculasMercado::whereYear('fecha_matricula', '=', $fecha_anio)
            ->orderby('fecha_matricula', 'desc')
            ->get();

        $resumen_matriculas = $this->matriculas($matriculas_mercado);
        $resumen_arrendamiento = $this->arrendamientos($pagos_puestos_mercado);
        //dump($resumen_arrendamiento);

        ///Consulta con paginate
        $pagos_puestos_mercado = PagosPuestoMercado::whereYear('fecha_pago', '=', $fecha_anio)

            ->orderby('fecha_pago', 'desc')
            ->paginate(10);

        $matriculas_mercado = MatriculasMercado::whereYear('fecha_matricula', '=', $fecha_anio)
            ->orderby('fecha_matricula', 'desc')
            ->paginate(10);


        $fecha_dia = "";
        $fecha_mes = "";
        //  $fecha_anio = "";

        if ($request->get('page') == "") {
            $page = "";
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "searchT" => $query,  'fecha_anio' => $fecha_anio, 'fecha_dia' => $fecha_dia, 'fecha_mes' => $fecha_mes, 'page' => $page, 'pagos_puestos_mercado' => $pagos_puestos_mercado]);
        } else {
            $page = $request->get('page');
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "searchT" => $query,  'fecha_anio' => $fecha_anio, 'fecha_dia' => $fecha_dia, 'fecha_mes' => $fecha_mes, 'page' => $page, 'pagos_puestos_mercado' => $pagos_puestos_mercado]);
        }
    }


    public function calcularDia(Request $request)
    {

        $fecha = $request->get('fecha_ingreso');
        $fecha_mesA = trim($request->get('fecha_ingreso'));

        if (($fecha_mesA == "")) {
            return redirect('gerente-mercado/calculos');
        }
        if ($fecha != "") {
            $fecha_mesA = $fecha;
            $fecha_mes = $request->get('fecha_mes');
        } else {
            $fecha_mesA = trim($request->get('fecha_mes_ingreso'));
            $fecha_mes = trim($request->get('fecha_mes_ingreso'));
        }

        $fecha_ingresoT = explode('-', $fecha_mesA);

        /////////////////////pilas con esta linea de codifgo
        $anio = $fecha_ingresoT[0];
        $mes = $fecha_ingresoT[1];
        $dia = $fecha_ingresoT[2];
        //  dd($fecha_ingresoT);
        if ($request) {
            $query = trim($request->get('searchT'));
        }
        //Consulta sin pagintae

        $pagos_puestos_mercado = PagosPuestoMercado::whereYear('fecha_pago', '=', $anio)
            ->whereMonth('fecha_pago', '=', $mes)
            ->whereDay('fecha_pago', '=', $dia)
            ->orderby('fecha_pago', 'desc')
            ->get();
        $matriculas_mercado = MatriculasMercado::whereYear('fecha_matricula', '=', $anio)
            ->whereMonth('fecha_matricula', '=', $mes)
            ->whereDay('fecha_matricula', '=', $dia)
            ->orderby('fecha_matricula', 'desc')
            ->get();

        $resumen_matriculas = $this->matriculas($matriculas_mercado);
        $resumen_arrendamiento = $this->arrendamientos($pagos_puestos_mercado);
        //dump($resumen_arrendamiento);

        ///Consulta con paginate
        $pagos_puestos_mercado = PagosPuestoMercado::whereYear('fecha_pago', '=', $anio)
            ->whereMonth('fecha_pago', '=', $mes)
            ->whereDay('fecha_pago', '=', $dia)
            ->orderby('fecha_pago', 'desc')
            ->paginate(10);

        $matriculas_mercado = MatriculasMercado::whereYear('fecha_matricula', '=', $anio)
            ->whereMonth('fecha_matricula', '=', $mes)
            ->whereDay('fecha_matricula', '=', $dia)
            ->orderby('fecha_matricula', 'desc')
            ->paginate(10);


        $fecha_mes = "";
        $fecha_dia = $request->get('fecha_ingreso');
        $fecha_anio = "";

        if ($request->get('page') == "") {
            $page = "";
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "searchT" => $query,  'fecha_anio' => $fecha_anio, 'fecha_anio' => $fecha_anio, 'fecha_mes' => $fecha_mes, 'fecha_dia' => $fecha_dia, 'page' => $page, 'pagos_puestos_mercado' => $pagos_puestos_mercado]);
        } else {
            $page = $request->get('page');
            return view('gerente.gerente-mercado.calculos', ["resumen_arrendamiento" => $resumen_arrendamiento, "resumen_matriculas" => $resumen_matriculas, "searchT" => $query,  'fecha_anio' => $fecha_anio, 'fecha_anio' => $fecha_anio, 'fecha_mes' => $fecha_mes, 'fecha_dia' => $fecha_dia, 'page' => $page, 'pagos_puestos_mercado' => $pagos_puestos_mercado]);
        }
    }

    public function matriculas($matriculas_mercado)
    {
        $matriculas = [];
        $ordinaria = 0;
        $total = 0;
        $pago_total = 0;
        $pago_ordinaria = 0;
        $pago_extraordinaria = 0;
        $extraordinaria = 0;
        foreach ($matriculas_mercado as $m) {
            if ($m->tipo_matricula == "ORDINARIA") {
                $ordinaria++;
                $pago_ordinaria = $pago_ordinaria + $m->costo_matricula;
            } else if ($m->tipo_matricula == "EXTRAORDINARIA") {
                $extraordinaria++;
                $pago_extraordinaria = $pago_extraordinaria + $m->costo_matricula;
            }
        }
        $total = $ordinaria + $extraordinaria;
        $pago_total = $pago_extraordinaria + $pago_ordinaria;

        $matriculas["ordinaria"] = $ordinaria;
        $matriculas["extraordinaria"] = $extraordinaria;
        $matriculas["total"] = $total;
        $matriculas["pago_ordinaria"] = $pago_ordinaria;
        $matriculas["pago_extraordinaria"] = $pago_extraordinaria;
        $matriculas["pago_total"] = $pago_total;
        return $matriculas;
    }

    public function arrendamientos($pagos_puestos_mercado)
    {
        $arrendamientos = [];
        $permanente = 0;
        $eventual = 0;
        $ocasional = 0;
        $pagos_permanente = 0;
        $pagos_eventual = 0;
        $pagos_ocasional = 0;
        //PERMANENTE , EVENTUAL , OCASIONAL
        $total = 0;
        $pago_total = 0;
        foreach ($pagos_puestos_mercado as $p) {
            $puesto = PuestoMercado::where('id', $p->id_puestos_mercado)->first();

            $sector = SectorMercado::where('id', $puesto->id_sector_mercado)->first();

            $tipo_pago = TipoPagoMercado::where('id', $sector->id_tipo_pago_mercado)->first();

            if ($tipo_pago->estadia == "PERMANENTE") {
                $permanente++;
                $pagos_permanente = $pagos_permanente + $p->valor_total;
            } else if ($tipo_pago->estadia == "EVENTUAL") {
                $eventual++;
                $pagos_eventual = $pagos_eventual + $p->valor_total;
            } else if ($tipo_pago->estadia == "OCASIONAL") {
                $ocasional++;
                $pagos_ocasional = $pagos_ocasional + $p->valor_total;
            }
        }
        $total = $permanente + $ocasional + $eventual;
        $pago_total = $pagos_eventual + $pagos_ocasional + $pagos_permanente;
        $arrendamientos["permanente"] = $permanente;
        $arrendamientos["eventual"] = $eventual;
        $arrendamientos["ocasional"] = $ocasional;
        $arrendamientos["pagos_ocasional"] = $pagos_ocasional;
        $arrendamientos["pagos_eventual"] = $pagos_eventual;
        $arrendamientos["pagos_permanente"] = $pagos_permanente;
        $arrendamientos["total"] = $total;
        $arrendamientos["pago_total"] = $pago_total;

        return $arrendamientos;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
