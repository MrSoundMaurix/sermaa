<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="modal fade" id="pdfMatriculaMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Distribucion PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ public_path('css/pdfPlantillaSermaa.css') }}">
</div>
</head>
<body>
    <header>
    <div class="row">
           <div class="col-md-12" style="text-align: center;"><strong><p style="font-size: 1em"> PLANTA DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</p></strong></div>

        </div>  
    </header>
    <br>
    <div class="col-md-12" style="text-align: center;"><strong><p style="font-size: 0.8em"> REPORTE DE DISTRIBUCIONES DE TRANSPORTE DE LA PLANTA </p></strong></div>
    <br>
    <table class="table table-bordered table-sm">
      
        <tbody>
         
            <tr>
            
                <td><strong>NRO.</strong></td> 
                <td><strong>CODIGO</strong></td>
                <td><strong>USUARIO</strong></td>
                <td><strong>CEDULA</strong></td>
               <!--  <td><strong>NRO. FACTURA</strong></td> -->
                <td><strong>RESPONSABLE</strong></td>
                <td><strong>DESTINATARIO</strong></td>
                <td><strong>CANTÓN DESTINO</strong></td>
                <td><strong>COSTO TRANSPORTE</strong></td>
                
                
            </tr>
            
            <?php $h=0;
                if (count($distribucionesPdf) <= 37) {
                    $ff = count($distribucionesPdf);
                } else {
                    $detalles_aux = array_slice($distribucionesPdf, 0, 37);
                    $ff = count($detalles_aux);
                }
            ?> 
            
               
                @for ($i = 0; $i < $ff; $i++)
                <tr role="row" id="fila" class="odd">
                    <td class="sorting_1">{{ $i+1 }}</td>
                   {{--<td class="sorting_1" >{{ $distribucionesPdf[$i]->fecha_ingreso }}</td>--}}
                    @foreach ($users as $user)
                        @if($distribucionesPdf[$i]->ingresos->id_users==$user->id){
                            <td class="sorting_1">{{ $user->codigo}}</td>
                        <td class="sorting_1">{{ $user->nombres.'  '.$user->apellidos }}</td>
                        <td class="sorting_1">{{ $user->cedula}}</td>
                        }
                        @endif
                    @endforeach
                    @foreach ($users as $user)
                        @if($distribucionesPdf[$i]->id_responsable_distribucion==$user->id){       
                        <td class="sorting_1">{{ $user->nombres.'  '.$user->apellidos }}</td>
                        }
                        @endif
                    @endforeach
                    <td class="sorting_1">{{ $distribucionesPdf[$i]->nombre_destinatario}}</td>
                    <td class="sorting_1">{{ $distribucionesPdf[$i]->destino_canton}}</td>
                    <td class="sorting_1">$ {{ $distribucionesPdf[$i]->costo_transporte}}</td>   
                </tr>
                <?php $h++;?>
                @if($h==count($distribucionesPdf))
                <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                @endif
            @endfor
    
        </tbody>
      
    </table>
    @if($h==count($distribucionesPdf))
                    <br/>
                    <br/>
                        <div class="row" style="text-align: center;">
                        <p> _________________________ </p>
                        
                        </div>
                        <div class="row" style="text-align: center; font-size: 0.8em;">
                        <p>{{$usuario->nombres.' '.$usuario->apellidos.'  CI: '.$usuario->cedula}}</p>
                        </div>
                        <div class="row" style="text-align: center; font-size: 0.8em;">
                            <p style="font-size: 0.8em;">Responsable del área</p>  
                        </div>                         
    @endif 
    
 <?php 
        if (count($distribucionesPdf) > 37) {
            if (count($distribucionesPdf) % 37 == 0) {
                $pagina = count($distribucionesPdf) / 37;
            } else {
                $pagina = floor(count($distribucionesPdf) / 37) + 1;
            }
            $rowspan = 1;
        }
    ?>
    
    @if (isset($pagina))
        @for ($j = 1; $j < $pagina; $j++)
            <div class="page-break">
                <header>
                    <p style="font-size: 80%;">
                        @php
                            $detalles_aux = array_slice($distribucionesPdf, ($rowspan * 37), 37);
                        @endphp
                        <br/>
                        <br/>
                    {{--    <strong>PLANTA DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</strong></p> --}}
                </header>
                <table class="table table-bordered table-sm">
                    <tbody>
                
                            <tr>
                         {{--   <td rowspan="{{ count($detalles_aux) + 1 }}" class="text-center align-middle"></td> --}}
                            <td><strong>Nro</strong></td>
                            <td><strong>FECHA-MATRÍCULA</strong></td>
                                <td><strong>MULTA</strong></td>
                                <td><strong>COSTO MATRÍCULA</strong></td>
                                <td><strong>RESPONSABLE MATRÍCULA</strong></td>
                                <td><strong>USUARIO</strong></td>
                             <td><strong>TIPO MATRÍCULA</strong></td>
                            </tr>
                        @for ($k = ($rowspan * 37); $k < (count($detalles_aux) + ($rowspan * 37)); $k++)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $distribucionesPdf[$k]->fecha_matricula }}</td>
                                @if($distribucionesPdf[$k]->multa==1){
                                <td>{{ 'Si' }}</td>
                                }
                                @endif
                                @if($distribucionesPdf[$k]->multa==0){
                                    <td>{{ 'No' }}</td>
                                }
                                @endif
                                
                                <td>{{ $distribucionesPdf[$k]->costo_matricula }}</td>
                                @foreach ($users as $user)
                                    @if($distribucionesPdf[$k]->id_users==$user->id){
                             <td>{{ $user->nombres.'  '.$user->apellidos }}</td>
                                     }
                                    @endif
                                    @if($distribucionesPdf[$k]->responsable_matricula==$user->id){
                             <td>{{ $user->nombres.'  '.$user->apellidos }}</td>
                                    }@endif
                                @endforeach
                                @if($distribucionesPdf[$k]->multa==1){
                                    <td>{{ 'Extraordinaria' }}</td>
                                }
                                @endif
                                @if($distribucionesPdf[$k]->multa==0){
                                    <td>{{ 'Ordinaria' }}</td>
                                }
                                @endif
                            </tr>
                            @if($h==count($distribucionesPdf))
                            <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                            @endif
                            @if (count($distribucionesPdf) == $k)
                                @break
                            @endif
                            
                        @endfor 
                    </tbody>
                </table>
                @if($h==count($distribucionesPdf))
                    <br/>
                    <br/>
                        <div class="row" style="text-align: center;">
                        <p> _________________________ </p>
                        
                        </div>
                        <div class="row" style="text-align: center; font-size: 0.8em;">
                        <p>{{$usuario->nombres.' '.$usuario->apellidos.'  CI: '.$usuario->cedula}}</p>
                        </div>
                        <div class="row" style="text-align: center; font-size: 0.8em;">
                            <p style="font-size: 0.8em;">Responsable del área</p>  
                        </div>                         
                @endif 
               
            </div>
            <?php 
                $rowspan++;
                
            ?>
          
        @endfor
      
           
    
    @endif
  
</body>
</html>