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
            {{-- <div class="col-md-2" > <img style="margin-left: -35px !important"  src="assets/img/partes/encabezado vertical.png" alt=""></div> --}}
            <div class="col-md-8" style="margin-left: 155px;"><strong><p style="font-size: 1em"> PLANTA DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</p></strong></div>
        </div>
       
    </header>


    <div class="row">
        <div class="col-md-8" style="margin-left: 170px;"><strong><p style="font-size: 0.8em">REGISTRO DE RECEPCIÓN DE ANIMALES BOVINOS</p></strong></div>
    </div>
 <table class="table table-bordered table-sm">
        <tbody>
            
            <tr>
                <td   style="width: 10px" colspan="1"><strong>FECHA:</strong>  </td>
                <td  style="width: 10px" colspan="1"><strong>CODIGO:</strong>  </td>
                <td  style="width: 10px" colspan="1"><strong>HORA:</strong>  </td>
                
                <td  style="width: 4%" class="text-center align-middle"><strong>NRO MACHOS</strong></td>
                <td   style="width: 4%" class="text-center align-middle"><strong>NRO HEMBRAS</strong></td>
                <td  style="width: 7px" class="text-center align-middle"><strong>TOTAL</strong></td>
                <td   style="width: 100" class="text-center align-middle"><strong>DIA FAENAMIENTO</strong></td>
                <td  style="width: 80px" class="text-center align-middle"><strong>GUIA MOVILIZACIÓN</strong></td>
                <td   class="text-center align-middle"><strong>RESPONSABLE RECEPCION</strong></td>
            </tr>       
          
            @if (isset($arreglo_bovino))
            @foreach ($arreglo_bovino as $con)
            <tr role="row" id="fila" class="odd">
                <td class="sorting_1">{{ Carbon\Carbon::parse($con['fecha'])->format('d/m/y') }}</td>
                <td class="sorting_1">{{$con['hora']}}</td>
                <td class="sorting_1">{{$con['hora']}}</td>
               
                <td class="sorting_1">{{$con['nro_bovinos_machos']}}</td>
                <td class="sorting_1">{{$con['nro_bovinos_hembras']}}</td>
                <td class="sorting_1">{{$con['total']}}</td>
                <td class="sorting_1">{{$con['fecha_faenamiento']}}</td>
                <td class="sorting_1">{{$con['csmi']}}</td>
                <td class="sorting_1">{{$con['responsable_recepcion']}}</td>
                       
            </tr> 
            @endforeach 
 @endif

</tbody>
</table>

<br>
<div class="row">
    <div class="col-md-8" style="margin-left: 170px;"><strong><p style="font-size: 0.8em">REGISTRO DE RECEPCIÓN DE ANIMALES PORCINOS</p></strong></div>
</div>
    <table class="table table-bordered table-sm">
        <tbody>
            
            <tr>
                <td   style="width: 10px" colspan="1"><strong>FECHA:</strong>  </td>
                <td  style="width: 10px" colspan="1"><strong>CODIGO:</strong>  </td>
                <td  style="width: 10px" colspan="1"><strong>HORA:</strong>  </td>
                
                <td  style="width: 4%" class="text-center align-middle"><strong>NRO MACHOS</strong></td>
                <td   style="width: 4%" class="text-center align-middle"><strong>NRO HEMBRAS</strong></td>
                <td  style="width: 7px" class="text-center align-middle"><strong>TOTAL</strong></td>
                <td   style="width: 100" class="text-center align-middle"><strong>DIA FAENAMIENTO</strong></td>
                <td  style="width: 80px" class="text-center align-middle"><strong>GUIA MOVILIZACIÓN</strong></td>
                <td   class="text-center align-middle"><strong>RESPONSABLE RECEPCION</strong></td>
            </tr>       
            
           
            @if (isset($arreglo_porcino))
                         
                    
                        @foreach ($arreglo_porcino as $con)
                        <tr role="row" id="fila" class="odd">
                            <td class="sorting_1">{{ Carbon\Carbon::parse($con['fecha'])->format('d/m/y') }}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                            <td class="sorting_1">{{$con['nro_porcinos_machos']}}</td>
                            <td class="sorting_1">{{$con['nro_porcinos_hembras']}}</td>
                            <td class="sorting_1">{{$con['total']}}</td>
                            <td class="sorting_1">{{$con['fecha_faenamiento']}}</td>
                            <td class="sorting_1">{{$con['csmi']}}</td>
                            <td class="sorting_1">{{$con['responsable_recepcion']}}</td>
                        </tr> 
                        @endforeach 
             @endif
            {{-- @if (isset($arreglo_bovino))
                        @foreach ($arreglo_bovino as $con)
                        <tr role="row" id="fila" class="odd">
                            <td class="sorting_1">{{ Carbon\Carbon::parse($con['fecha'])->format('d/m/y') }}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                           
                            <td class="sorting_1">{{$con['nro_bovinos_machos']}}</td>
                            <td class="sorting_1">{{$con['nro_bovinos_hembras']}}</td>
                            <td class="sorting_1">{{$con['total']}}</td>
                            <td class="sorting_1">{{$con['fecha_faenamiento']}}</td>
                            <td class="sorting_1">{{$con['csmi']}}</td>
                            <td class="sorting_1">{{$con['responsable_recepcion']}}</td>
                                   
                        </tr> 
                        @endforeach 
             @endif --}}

        </tbody>
    </table>
 
      
    <br>
    <br>
    <br>
    <br>
    <div class="row" style="margin-left: 35%">
       <p> _________________________ </p>
     
    </div>
    <div class="row" style="margin-left: 40%; font-size: 0.8em;">
               <p>Firma del Responsable </p> 
    </div>
 

   
</body>
</html>