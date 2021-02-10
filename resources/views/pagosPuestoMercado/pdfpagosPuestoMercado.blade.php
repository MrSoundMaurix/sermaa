<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="modal fade" id="pdfPagosPuestoMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

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
           <div class="col-md-12" style="text-align: center;"><strong><p style="font-size: 1em"> MERCADO DE ANTONIO ANTE SERMAA-EP</p></strong></div>
        </div>  
    </header>
    <br>
    <div class="col-md-12">
    <strong><span class="" style="text-align: center;">
    <p style="font-size: 0.8em"> REPORTE DE REGISTROS DE PAGOS DEL MERCADO </p>
										</span></strong></div>
    <br>
    <table class="table table-bordered table-sm">
        <tbody>
         
            <tr>
               <td><strong>Nro</strong></td>
                <td><strong>FECHA PAGO</strong></td>
                <td><strong>RESPONSABLE COBRO</strong></td>
                <td><strong>ENCARGADO PUESTO</strong></td>  
                <td><strong>PUESTO </strong></td>         
                <td><strong>MATRÍCULA</strong></td>
                <td><strong>VALOR TOTAL</strong></td>
            </tr>
            
            <?php  $h=0;
                if (count($pagosPuestoMercado1) <= 37) {
                    $ff = count($pagosPuestoMercado1);
                } else {
                    $detalles_aux = array_slice($pagosPuestoMercado1, 0, 37);
                    $ff = count($detalles_aux);
                }
            ?> 
            @for ($i = 0; $i < $ff; $i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $pagosPuestoMercado1[$i]->fecha_pago }}</td>
                    @foreach ($users as $user)
                        @if ($pagosPuestoMercado1[$i]->id_users==$user->id)
                        <td>{{$user->nombres ." ". $user->apellidos}}</td>
                        @endif
                    @endforeach
                    @foreach ($users as $user)
                        @if ($pagosPuestoMercado1[$i]->responsable_cobro==$user->id)
                        <td>{{$user->nombres ." ". $user->apellidos}}</td>
                        @endif
                    @endforeach    
                 @foreach ($puestosMercado as $p)
                        @if ($pagosPuestoMercado1[$i]->id_puestos_mercado==$p->id)
                        <td>{{$p->nro_puesto}}</td>
                        @endif
                    @endforeach
                    <td>{{ $pagosPuestoMercado1[$i]->matricula  }}</td>
                    <td>{{ $pagosPuestoMercado1[$i]->valor_total  }}</td>
                </tr>
                <?php $h++;?>
                @if($h==count($pagosPuestoMercado1))
                <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                @endif
               
            @endfor  
        </tbody>
    </table>
    @if($h==count($pagosPuestoMercado1))
                    <br/>
                    <br/>

                        <div class="row" style="text-align: center;">
                        <p> _________________________ </p>
                        
                        </div>
                        <div class="row" style="text-align: center; font-size: 0.8em;">
                        <p>{{$usuario->nombres.' '.$usuario->apellidos.'  CI: '.$usuario->cedula}}</p>
                        </div>
                        <div class="row" style="text-align: center;font-size: 0.8em;">
                            <p style="font-size: 0.8em;">Responsable del área</p>  
                        </div>
                           
                @endif 
    
 <?php 
   
        if (count($pagosPuestoMercado1) > 37) {
            if (count($pagosPuestoMercado1) % 37 == 0) {
                $pagina = count($pagosPuestoMercado1) / 37;
            } else {
                $pagina = floor(count($pagosPuestoMercado1) / 37) + 1;
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
                            $detalles_aux = array_slice($pagosPuestoMercado1, ($rowspan * 37), 37);
                        @endphp
                        <br/>
                        <br/>
                </header>
                <table class="table table-bordered table-sm">
                    <tbody>
                            <tr>
                         <td><strong>Nro</strong></td>
                         <td><strong>FECHA DE PAGO</strong></td>
                         <td><strong>RESPONSABLE COBRO</strong></td>
                         <td><strong>ENCARGADO PUESTO</strong></td>
                         <td><strong>PUESTO MERCADO</strong></td>
                         <td><strong>MATRÍCULA</strong></td>
                         <td><strong>VALOR TOTAL</strong></td>
                            </tr>
                        @for ($k = ($rowspan * 37); $k < (count($detalles_aux) + ($rowspan * 37)); $k++)
                            <tr>
                                <td>{{ $k+1 }}</td>
                               
                            <td>{{ $pagosPuestoMercado1[$i]->fecha_pago }}</td>
                            @foreach ($users as $user)
                            @if ($pagosPuestoMercado1[$i]->responsable_cobro==$user->id)
                         <td>{{$user->nombres." ". $user->apellidos}}</td>
                         @endif
                         @endforeach
                            @foreach ($users as $user)
                            @if ($pagosPuestoMercado1[$i]->id_users==$user->id)
                            <td>{{$user->nombres ." ". $user->apellidos}}</td>
                            @endif
                            @endforeach
                            @foreach ($puestosMercado as $p)
                                @if ($pagosPuestoMercado1[$i]->id_puestos_mercado==$p->id)
                                <td>{{$p->nro_puesto}}</td>
                                @endif
                            @endforeach
                            <td>{{ $pagosPuestoMercado1[$i]->matricula  }}</td>
                            <td>{{ $pagosPuestoMercado1[$i]->valor_total  }}</td>
                            
                            </tr><?php $h++; ?>
                            @if($h==count($pagosPuestoMercado1))
                            <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                            @endif
                        
                            @if(count($pagosPuestoMercado1) == $k)
                            
                                @break
                            @endif
                        @endfor 
           
                    </tbody>
                </table>  
                @if($h==count($pagosPuestoMercado1))
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