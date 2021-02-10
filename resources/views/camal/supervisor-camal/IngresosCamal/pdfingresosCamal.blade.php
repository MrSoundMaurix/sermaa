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
    <div class="col-md-12" style="text-align: center;"><strong><p style="font-size: 0.8em"> REPORTE DE REGISTRO DE INGRESOS DE LA PLANTA </p></strong></div>
    <br>
    <table class="table table-bordered table-sm">
      
        <tbody>
         
            <tr>
            
                <td><strong>NRO.</strong></td>
                <td><strong>CODIGO</strong></td>
               
                <td><strong>NOMBRES Y APELLIDOS</strong></td>
                <td><strong>CEDULA</strong></td>
                <td><strong>NRO. FACTURA</strong></td>
                <td><strong>T. DE ANIMALES</strong></td>
                <td><strong>MATRICULA</strong></td>
                <td><strong>Total </strong></td>
                
                
            </tr>
            
            <?php $h=0;
                if (count($ingresosPdf) <= 37) {
                    $ff = count($ingresosPdf);
                } else {
                    $detalles_aux = array_slice($ingresosPdf, 0, 37);
                    $ff = count($detalles_aux);
                }
            ?> 
            
               
                @for ($i = 0; $i < $ff; $i++)
                <tr role="row" id="fila" class="odd">
                    <td class="sorting_1">{{ $i+1 }}</td>
                   {{--<td class="sorting_1" >{{ $ingresosPdf[$i]->fecha_ingreso }}</td>--}}
                    @foreach ($users as $user)
                    @if($ingresosPdf[$i]->id_users==$user->id){
                        <td class="sorting_1">{{ $user->codigo}}</td>
                    <td class="sorting_1">{{ $user->nombres.'  '.$user->apellidos }}</td>
                    <td class="sorting_1">{{ $user->cedula}}</td>
                    }
                    @endif
                    @endforeach
                    <td class="sorting_1">{{ $ingresosPdf[$i]->numero_factura}}</td>
                    <td class="sorting_1">
                        <?php $a= explode("_",$ingresosPdf[$i]->t_animal);
                            $s=$a[0]+ $a[1];
                            echo $s;?>
                        </td>
                    <td class="sorting_1" >
                        <?php $a= explode("_",$ingresosPdf[$i]->matricula);
                         if($a[0]=="SI"){?>
                           <?php echo "X"; ?>
                            <?php }else{ echo "-";}?>        
                    </td> 
                    <td class="sorting_1">$ {{ $ingresosPdf[$i]->costo_total }}</td>   
                </tr>
                <?php $h++;?>
                @if($h==count($ingresosPdf))
                <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                @endif
                @if (count($ingresosPdf) == $k)
                                @break
                            @endif
            @endfor 
        </tbody>   
    </table>
    @if($h==count($ingresosPdf))
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
        if (count($ingresosPdf) > 37) {
            if (count($ingresosPdf) % 37 == 0) {
                $pagina = count($ingresosPdf) / 37;
            } else {
                $pagina = floor(count($ingresosPdf) / 37) + 1;
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
                            $detalles_aux = array_slice($ingresosPdf, ($rowspan * 37), 37);
                        @endphp
                        <br/>
                        <br/>
                    {{--    <strong>PLANTA DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</strong></p> --}}
                </header>
                <table class="table table-bordered table-sm">
      
        <tbody>
         
            <tr>
            
                <td><strong>NRO.</strong></td>
                <td><strong>CODIGO</strong></td>
               
                <td><strong>NOMBRES Y APELLIDOS</strong></td>
                <td><strong>CEDULA</strong></td>
                <td><strong>NRO. FACTURA</strong></td>
                <td><strong>T. DE ANIMALES</strong></td>
                <td><strong>MATRICULA</strong></td>
                <td><strong>Total </strong></td>
                
                
            </tr>
            
            <?php 
                if (count($ingresosPdf) <= 37) {
                    $ff = count($ingresosPdf);
                } else {
                    $detalles_aux = array_slice($ingresosPdf, 0, 37);
                    $ff = count($detalles_aux);
                }
            ?> 
            
               
                @for ($i = 0; $i < $ff; $i++)
                <tr role="row" id="fila" class="odd">
                    <td class="sorting_1">{{ $i+1 }}</td>
                   {{--<td class="sorting_1" >{{ $ingresosPdf[$i]->fecha_ingreso }}</td>--}}
                    @foreach ($users as $user)
                    @if($ingresosPdf[$i]->id_users==$user->id){
                        <td class="sorting_1">{{ $user->codigo}}</td>
                    <td class="sorting_1">{{ $user->nombres.'  '.$user->apellidos }}</td>
                    <td class="sorting_1">{{ $user->cedula}}</td>
                    }
                    @endif
                    @endforeach
                    <td class="sorting_1">{{ $ingresosPdf[$i]->numero_factura}}</td>
                    <td class="sorting_1">
                        <?php $a= explode("_",$ingresosPdf[$i]->t_animal);
                            $s=$a[0]+ $a[1];
                            echo $s;?>
                        </td>
                    <td class="sorting_1" >
                        <?php $a= explode("_",$ingresosPdf[$i]->matricula);
                         if($a[0]=="SI"){?>
                           <?php echo "X"; ?>
                            <?php }else{ echo "-";}?>        
                    </td> 
                    <td class="sorting_1">$ {{ $ingresosPdf[$i]->costo_total }}</td>   
                </tr>
                </tr><?php $h++; ?>
                            @if($h==count($ingresosPdf))
                            <tr><td>Total</td> <td></td><td></td><td></td><td></td><td></td><td>  $ {{$totalRecaudado}}</td></tr>
                            @endif
            @endfor
        
        </tbody>
      
    </table>
    @if($h==count($ingresosPdf))
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