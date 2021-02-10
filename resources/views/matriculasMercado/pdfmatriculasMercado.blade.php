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
           <div class="col-md-12" style="text-align: center;">
                <strong><p style="font-size: 1em"> MERCADO DE ANTONIO ANTE SERMAA-EP</p></strong>
           </div>
        </div>  
    </header>
    <br>
    <div class="col-md-12" style="text-align: center;" >
        <strong><p style="font-size: 0.8em"> REPORTE DE REGISTROS DE MATRICULA DEL MERCADO </p></strong>
    </div>
    <br>
    <table class="table table-bordered table-sm">
        <tbody>
         
            <tr>
             {{--   <td rowspan="<?php if(count($matriculasPdf) > 17 ) { echo 18; } else { echo count($matriculasPdf) + 1; } ?>" class="text-center align-middle"></td> --}}
                <td><strong>Nro</strong></td>
                <td><strong>FECHA-MATRÍCULA</strong></td>
                <td><strong>NRO PUESTO</strong></td> 
                <td><strong>RESPONSABLE MATRÍCULA</strong></td>
                <td><strong>USUARIO</strong></td>   
                <td><strong>TIPO MATRÍCULA</strong></td>
                <td><strong>COSTO MATRÍCULA</strong></td>
            </tr>
            
            <?php 
            $h=0;
                if (count($matriculasPdf) <= 37) {
                    $ff = count($matriculasPdf);
                } else {
                    $detalles_aux = array_slice($matriculasPdf, 0, 37);
                    $ff = count($detalles_aux);
                }
            ?> 
            @for ($i = 0; $i < $ff; $i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $matriculasPdf[$i]->fecha_matricula }}</td>
                    <?php $id_user_puesto = DB::table('puestos_mercado')->where('id',$matriculasPdf[$i]->id_puestos_mercado)->get(); ?>
                    <td class="sorting_1">{{$id_user_puesto[0]->nro_puesto}}</td>
                    
                    @foreach ($users as $user)
                        @if($matriculasPdf[$i]->responsable_matricula==$user->id){
                        <td>{{ $user->nombres.'  '.$user->apellidos }}</td>
                        }@endif
                        @if($id_user_puesto[0]->id_users==$user->id){
                        <td>{{ $user->nombres.'  '.$user->apellidos }}</td>
                        }
                        @endif
                    @endforeach
                    <td class="sorting_1">{{$matriculasPdf[$i]->tipo_matricula}}</td>
                    <td>{{ $matriculasPdf[$i]->costo_matricula }}</td>   
                </tr>
                <?php $h++;?>
                @if($h==count($matriculasPdf))
                <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                @endif       
            @endfor
        </tbody>
    </table>
            @if($h==count($matriculasPdf))
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
        if (count($matriculasPdf) > 37) {
            if (count($matriculasPdf) % 37 == 0) {
                $pagina = count($matriculasPdf) / 37;
            } else {
                $pagina = floor(count($matriculasPdf) / 37) + 1;
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
                            $detalles_aux = array_slice($matriculasPdf, ($rowspan * 37), 37);
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
                                <td>{{ $matriculasPdf[$k]->fecha_matricula }}</td>
                                @if($matriculasPdf[$k]->multa==1){
                                <td>{{ 'Si' }}</td>
                                }
                                @endif
                                @if($matriculasPdf[$k]->multa==0){
                                    <td>{{ 'No' }}</td>
                                }
                                @endif
                                
                                <td>{{ $matriculasPdf[$k]->costo_matricula }}</td>
                                @foreach ($users as $user)
                                    @if($matriculasPdf[$k]->id_users==$user->id){
                             <td>{{ $user->nombres.'  '.$user->apellidos }}</td>
                                     }
                                    @endif
                                    @if($matriculasPdf[$k]->responsable_matricula==$user->id){
                             <td>{{ $user->nombres.'  '.$user->apellidos }}</td>
                                    }@endif
                                @endforeach
                                @if($matriculasPdf[$k]->multa==1){
                                    <td>{{ 'Extraordinaria' }}</td>
                                }
                                @endif
                                @if($matriculasPdf[$k]->multa==0){
                                    <td>{{ 'Ordinaria' }}</td>
                                }
                                @endif
                            </tr>
                            </tr><?php $h++; ?>
                            @if($h==count($pagosPuestoMercado1))
                            <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                            @endif
                            @if (count($matriculasPdf) == $k)
                                @break
                            @endif
                            
                        @endfor 
                    </tbody>
                </table>
                @if($h==count($matriculasPdf))
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