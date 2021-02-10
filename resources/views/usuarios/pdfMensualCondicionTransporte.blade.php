<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Distribucion PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ public_path('css/estilos-pdf-veterinario.css') }}">
</head>
<body>
    <header >
        <div class="row">
           {{--  <div class="col-md-2" >  <img width="110" src="assets/img/sermaa.png" alt=""></div> --}}
           <div class="col-md-8" style="margin-left: 155px;"><strong><p style="font-size: 1em"> PLANTA DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</p></strong></div>

        </div>
    </header>
    <div class="col-md-8" style="margin-left: 175px;"><strong><p style="font-size: 0.8em"> REGISTRO DE  LAS CONDICIONES DE INGRESO DE LOS ANIMALES </p></strong></div>
    <table class="table table-bordered table-sm">
        <tbody>
            
            <tr>
                <td rowspan="2" style="width: 10px" colspan="1"><strong>FECHA:</strong>  </td>
                <td rowspan="2"style="width: 10px" colspan="1"><strong>HORA:</strong>  </td>
                
                <td colspan="3"  class="text-center align-middle"><strong>MEDIO DE MOVILIZACIÓN</strong></td>
                <td colspan="2" style="width: 4%" class="text-center align-middle"><strong>ANIMAL TRANSPORTADO</strong></td>
                <td rowspan="2" style="width: 7px" class="text-center align-middle"><strong>CANTIDAD</strong></td>
                <td  rowspan="2" style="width: 100" class="text-center align-middle"><strong>CONDICIONES TRANSPORTE</strong></td>
                <td rowspan="2" style="width: 80px" class="text-center align-middle"><strong>OBSERVACIONES</strong></td>
            </tr>       
            <tr>
                <td colspan="1" style="width: 40px"><strong>Camión / Placa:</strong> </td>
                <td colspan="1" style="width: 40px"><strong>Camioneta / Placa:</strong> </td>
                <td colspan="1" style="width: 10px"><strong>A pie:</strong> </td>
                <td colspan="1" style="width: 10px"><strong>BOVINOS:</strong> </td>
                <td style="width: 10px"><strong>PORCINOS</strong> </td>
                {{-- <td style="width:1%"><strong>ACERRIN PISO</strong> </td>
                <td><strong>ANIMAL PARADO COMODO</strong> </td>
                <td><strong>MEZCLADOS</strong> </td>
                <td><strong>AMARRADOS</strong> </td>
                <td><strong>SIN AMARRAR</strong> </td> --}}
            </tr>
           
            @if (isset($condiciones_ingreso))
                         
                    
                        @foreach ($condiciones_ingreso as $con)
                        <tr role="row" id="fila" class="odd">
                            <td class="sorting_1">{{ Carbon\Carbon::parse($con['fecha'])->format('d/m/y') }}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                            @if($con['medio_movilizacion'] == "Camión") {
                            <td class="sorting_1">{{$con['placa_transporte']}}</td>
                            <td class="sorting_1">-</td>
                            <td class="sorting_1">-</td>
                            @endif
                            @if($con['medio_movilizacion'] == "Camioneta") {
                                <td class="sorting_1">-</td>
                                <td class="sorting_1">{{$con['placa_transporte']}}</td>
                                <td class="sorting_1">-</td>
                            @endif
                            @if($con['medio_movilizacion'] == "A pie") {
                                <td class="sorting_1">-</td>
                                <td class="sorting_1">-</td>
                                <td class="sorting_1">X</td>
                            @endif
                            @if($con['medio_movilizacion'] == "") {
                                <td class="sorting_1">-</td>
                                <td class="sorting_1">-</td>
                                <td class="sorting_1">-</td>
                            @endif
                            <td class="sorting_1">{{$con['bobino']}}</td>
                            <td class="sorting_1">{{$con['porcino']}}</td>
                            <td class="sorting_1">{{$con['total']}}</td>
                            <?php
                            /*  $valor = explode(",", $con['condiciones_transporte']);   
                           for ($i = 0; $i < count($valor); $i++) {
                                if ($valor[$i] == "ACERRIN PISO") {
                                ?>  
                                <td class="sorting_1">X</td>
                                  <td class="sorting_1"></td>
                                <td class="sorting_1"></td>
                                <td class="sorting_1"></td>
                                <td class="sorting_1"></td> 
 */
                               /*  <?php */
                              /*   }
                                if ($valor[$i] == "ANIMAL PARADO COMODO") { */
                              /*   ?>    
                                    <td class="sorting_1"></td> 
                                    <td class="sorting_1">X</td>
                                     <td class="sorting_1"></td>
                                    <td class="sorting_1"></td>
                                    <td class="sorting_1"></td>  
                                <?php     */
                              /*   }
                                if ($valor[$i] == "MEZCADOS") { */
                           /*  ?>
                              <td class="sorting_1"></td>
                             <td class="sorting_1"></td>  
                             <td class="sorting_1">X</td>
                              <td class="sorting_1"></td>
                             <td class="sorting_1"></td> } */
                           /*  <?php
                                 
                                }
                                if ($valor[$i] == "AMARRADOS") { */
                                 /*   ?>
                                    <td class="sorting_1"></td>
                                    <td class="sorting_1"></td>
                                    <td class="sorting_1"></td>  
                                    <td class="sorting_1">X</td>
                                     <td class="sorting_1"></td>  
                                    <?php
                                    */
                              /*   }
                                if ($valor[$i] == "SIN AMARRAR") {
                                ?> */
                              /*     <td class="sorting_1"></td>
                                <td class="sorting_1"></td>
                                <td class="sorting_1"></td>
                                <td class="sorting_1"></td>  
                                <td class="sorting_1">X</td>    
                             <?php       
                                }
                               */
                          /*   } ?> --}}
 */
?>

                           <td class="sorting_1">{{$con['condiciones_transporte']}}</td>            
                            <td class="sorting_1">{{$con['observaciones']}}</td>          
                        </tr> 
                        @endforeach 
                        @endif

        </tbody>
           
</body>
</html>