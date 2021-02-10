
@extends('layouts.applte') 
@section('contenido')
@include('gerente/gerente-camal/detallesIngresoModal')
@include('gerente/gerente-camal/condicionesIngresoModal')
<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <div class="content-wrapper">
  
            @include('layouts.messages')
            <div class="content">
                <div class="modal-body">
                    <div class="card card-info card-outline" >
                        <div class="card">
                            <div class="card-header">  
                                <div class="row">
                                    <div class= "col-sm-3">
                                    </div>
                                    <div class="col-sm-7"> 
                                   
                                        <h3 class="card-title" style="text-align: center;">REPORTE DIARIO, MENSUAL Y ANUAL DEL CENTRO DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</h3> 
                                    </div>  
                                </div>  
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 md:w-1/3 px-3">
                                        {!!Form::open(array('url'=>'dia-ingreso','method'=>'GET','autocomplete'=>'off'))!!} 
                                        {{Form::token()}}
                                        @csrf
                                        <div class="card border-primary rounded-0">
                                            <fieldset class="form-group">
                                                <div class="row">
                                                <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">           
                                                    <label>Filtrar por día:</label>
                                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                        <input style="background: transparent;" type="text" class="form-control datetimepicker-input"  value="{{$fecha_dia}}"  name="fecha_ingreso" id="fecha_ingreso"data-target="#timepicker" required readonly/>
                                                        <input type="hidden" id="comprobador1" name="comprobador1" value="comprobador1"/>
                                                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text"></i> <i class="fas fa-calendar-day text-info"></i></div>
                                                        </div>
                                                        </div> 
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                <label>Mostrar</label> 
                                                    <span class="input-group-prepend">
                                                    </span>
                                                    <button class="btn btn-info" type="submit">Mostrar</button>
                                                {{-- <a href="{{route('antemorten.create')}}" type="button" class="btn btn-success" >Consultar</a> --}}
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>   
                                        {{Form::Close()}}  
                                         
                                    </div>
                                    <div class="col-sm-4 md:w-1/3 px-3">
                                        {!!Form::open(array('url'=>'mes-ingreso','method'=>'GET','autocomplete'=>'off'))!!} 
                                        <div class="card border-primary rounded-0">
                                            <fieldset class="form-group">
                                                <div class="row">
                                                <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">           
                                                    <label>Filtar por mes:</label>
                                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                        <input style="background: transparent;" type="text" class="form-control datetimepicker-input" value="{{$fecha_mes}}" name="fecha_mes_ingreso" id="fecha_mes_ingreso"data-target="#timepicker2" required readonly/>
                                                        <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fas fa-calendar-week text-info"></i></div>
                                                        </div>
                                                        </div> 
                                                </div>
                                                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                                    <label>Mostrar</label>
                                                    <span class="input-group-prepend">
                                                    </span>
                                                    <button class="btn btn-info" type="submit">Mostrar</button>
                                                {{-- <a href="{{route('antemorten.create')}}" type="button" class="btn btn-success" >Consultar</a> --}}
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>   
                                    {{Form::Close()}} 
                                   
                                    </div>
                                    <div class="col-sm-4 md:w-1/3 px-3">
                                        {!!Form::open(array('url'=>'gerente-camal/create','method'=>'GET','autocomplete'=>'off'))!!} 
                                            <div class="card border-primary rounded-0">
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">           
                                                            <label>Filtrar por año:</label>
                                                                <div class="input-group date" id="timepicker3" data-target-input="nearest">
                                                                <input style="background: transparent;" type="text" class="form-control datetimepicker-input" value="{{$fecha_año}}" name="fecha_año_ingreso" id="fecha_año_ingreso"data-target="#timepicker3" required readonly/>
                                                                    <div class="input-group-append" data-target="#timepicker3" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fas fa-calendar-alt text-info"></i>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                        </div>
                                                        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                                            <label>Mostrar</label>
                                                            <span class="input-group-prepend">
                                                            </span>
                                                            <button class="btn btn-info" type="submit">Mostrar</button>
                                                        {{-- <a href="{{route('antemorten.create')}}" type="button" class="btn btn-success" >Consultar</a> --}}
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>    
                                        {{Form::Close()}} 
                                    <!--  </br></br>  -->
                                        <!-- <div clas="row justify-content-center" >
                                        <a href="{{url('/gerentecosto-camal')}}" type="button" class="btn btn-info" >Costos</a> 
                                            
                                            </div> 
                                        </div> -->
                                    </div>
                                </div>    
                                <div class="row"> 
                                    <div class="col-sm-4 md:w-1/4 px-4" >
                                        <div class="table-responsive">
                                            <h4>Animales</h4>
                                            <table class="table table-striped table-bordered table-condensed table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border: #1bb2ca 3px solid;border-radius: 15px; -moz-border-radius: 20px; padding: 2px; border-collapse: separate; border-spacing: 5;">
                                                <thead  >
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Especie</th>
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">T. animales</th> 
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 100px;">$ total</th>
                                                    </tr>
                                                </thead>
                                                @if(isset($tablaresumentotal))
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Bovino</td>   
                                                        <td class="sorting_1">{{$tablaresumentotal[0]}}</td>    
                                                        <td class="sorting_1">$ {{$tablaresumentotal[1]}}</td>
                                                    </tr>
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Porcino</td>   
                                                        <td class="sorting_1">{{$tablaresumentotal[2]}}</td>    
                                                        <td class="sorting_1">$ {{$tablaresumentotal[3]}}</td>
                                                    </tr> 
                                                    <tr> 
                                                        <td class="sorting_1">Total</td>   
                                                        <td class="sorting_1">{{$tablaresumentotal[4]}}</td>    
                                                        <td class="sorting_1">$ {{$tablaresumentotal[5]}}</td>
                                                    </tr> 
                                                @endif   
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </div>  
                                    </div> 
                                    <div class="col-sm-4 md:w-1/4 px-4" >
                                        <div class="table-responsive">
                                            <h4>Matrículas</h4>
                                            <table class="table table-striped table-bordered table-condensed table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border: #1bb2ca 3px solid;border-radius: 15px; -moz-border-radius: 20px; padding: 2px; border-collapse: separate; border-spacing: 5;">
                                                <thead  >
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Matrícula</th>
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;"> N° matrículas</th> 
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 100px;">$ total</th>
                                                    </tr>
                                                </thead>
                                                @if(isset($totalmatriculas))
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Total</td>   
                                                        <td class="sorting_1">{{$totalmatriculas[0]}}</td>    
                                                        <td class="sorting_1">$ {{$totalmatriculas[1]}}</td> 
                                                    </tr>
                                                @endif   
                                                <tbody>

                                                </tbody>

                                            </table>
                                            
                                        <div clas="row" style="text-align:center;" >
                                        </br>
                                        @include('gerente/gerente-camal/search')
                                        </div>  
                                        </div>  
                                    </div>  
                                    <div class="col-sm-4 md:w-1/4 px-4" >
                                        <div class="table-responsive">
                                            <h4>Transporte</h4>
                                            <table class="table table-striped table-bordered table-condensed table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border: #1bb2ca 3px solid;border-radius: 15px; -moz-border-radius: 20px; padding: 2px; border-collapse: separate; border-spacing: 5;">
                                                <thead  >
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Transporte</th>
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">N° de distribuciones</th> 
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 100px;">$ total</th>
                                                    </tr>
                                                </thead>
                                                @if(isset($totaltransportes))
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Sin costo</td>   
                                                        <td class="sorting_1"> {{$totaltransportes[0]}}</td>    
                                                        <td class="sorting_1">$ 0</td>
                                                    </tr>
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Con costo</td>   
                                                        <td class="sorting_1">{{$totaltransportes[2]}}</td>    
                                                        <td class="sorting_1">$ {{$totaltransportes[1]}}</td>
                                                    </tr> 
                                                    <tr> 
                                                        <td class="sorting_1">Total</td>   
                                                        <td class="sorting_1">{{$totaltransportes[0]+$totaltransportes[2]}}</td>    
                                                        <td class="sorting_1">$ {{$totaltransportes[1]}}</td>
                                                    </tr> 
                                                @endif   
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </div>  
                                    </div>
                                </div>    
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-condensed table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8">
                                                    <tr role="row">
                                                  
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Id.Ingreso</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Cod. Usuario </th>
                                                        <th style="color:#FFFFFF; "  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha y Hora de registro</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Responsable de registro</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Usuario</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Matrícula</th>
                                                        
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Detalles</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Condiciones</th>   
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Guía</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Pesos</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Distribución</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                    @if(isset($ingresoscamal))
                                                
                                                        @foreach ($ingresoscamal as $ic)
                                                    

                                                        <tr role="row" class="odd">   
                                                        <td class="sorting_1">{{$ic->id}}</td>
                                                            <td class="sorting_1">{{$ic->users->codigo}}</td>
                                                            <td class="sorting_1">{{$ic->fecha_ingreso}}</td>
                                                            <td class="sorting_1">{{$ic->responsable_recepcion_datos}}</td>
                                                            <td class="sorting_1"> {{$ic->users->nombres}} {{$ic->users->apellidos}}   </td>   
                                                            <td class="sorting_1">
                                                            <?php $a= explode("_",$ic->matricula);
                                                            if($a[0]=="SI"){?>
                                                                 <span class="pull-right badge bg-yellow">  <?php echo $a[0]; ?></span>
                                                            <?php }else if($a[0]=="NO"){?>
                                                                <span class="pull-right badge bg-pink">  <?php echo $a[0]; ?></span>
                                                            <?php }?>
                                                            </td>  
                                                        <!--        -->
                                                    <!--   <td class="sorting_1"> {{$ic->id}}   </td>  -->  
                                                            <td> 
                                                            <a href="" class="btn btn-danger waves-effect toastrDefaultSuccess" title="Ver detalles" data-backdrop="static" data-keyboard="false"
                                                                    data-nombres="{{$ic->users->nombres}} {{$ic->users->apellidos}}" data-codigo="{{$ic->users->codigo}}"  data-idd="{{$ic->id}}" data-lugar_procedencia="{{$ic->lugar_procedencia}}" 
                                                                    data-cedula="{{$ic->cedula}}" data-direccion="{{$ic->users->direccion}}" data-telefono="{{$ic->users->telefono}}" data-matricula="{{$a[0]}}" data-valor_matricula="{{$a[1]}}" 
                                                                    data-id_ingreso="{{$ic->id}}" data-fecha_ingreso="{{$ic->fecha_ingreso}}" data-csmi="{{$ic->csmi}}" data-costo_total="{{$ic->costo_total}}" 
                                                                    data-toggle="modal" data-target="#DetallesIngreso" >
                                                                    <i> <img src="{{asset('assets/svg/paper.svg')}}"  Style="width:30px;"> </i>
                                                                </a>  
                                                            </td>
                                                            <td>
                                                                   @if ($ic->validar_transporte==0)
                                                                  @else       
                                                                    
                                                                    <a href="" title="Condiciones del ingreso de animales" class="btn btn-success waves-effect" 
                                                                    data-id_ingresos="{{$ic->id}}" data-fecha_ingreso="{{$ic->fecha_ingreso}}" data-medio_movilizacion="{{$ic->medio_movilizacion}}"
                                                                    data-placa_transporte="{{$ic->placa_transporte}}" data-condicion_transporte="{{$ic->condicion_transporte}}" data-observaciones="{{$ic->observaciones}}"
                                                                    data-fecha_faenamiento="{{$ic->fecha_faenamiento}}"
                                                                    data-toggle="modal" data-target="#condicionesIngreso"   >
                                                                    <img src="{{asset('assets/svg/completed-task.svg')}}" Style="width:30px;">
                                                                   
                                                                       </a> 
                                                                  @endif  
                                                               
                                                            </td>    
                                                            <td> 
                                                            @if ($ic->estado_pdf=="SI")
                                                                <a href="{{url('IngresoCamal/pdfdownload',$ic->id)}}" target="_blank" title="Ver documento guía" 
                                                                class="btn btn-warning waves-effect toastrDefaultSuccess" >
                                                                    <!-- <i class="far fa-file-pdf"></i>  -->
                                                                    <img  src="{{asset('assets/svg/pdf.svg')}}" Style="width:30px">
                                                                    <!-- <i class="far fa-file-alt text-white" ></i>  -->
                                                                </a>     
                                                          @else
                                                                
                                                          @endif
                                                                  
                                                            </td>
                                                            <td>
                                                            @if ($ic->estado==1||$ic->estado==2||$ic->estado==3||$ic->estado==4)
                                                               
                                                                <?php if($fecha_mes!=""){?>
                                                                    <a href="{{url('/gerente-camal/show?id='.$ic->id.'&fecha_mes='.$fecha_mes.'&page='.$page.'')}}" style="text-decoration: none;padding: 10px;font-weight: 600;font-size: 20px; color: #ffffff; background-color: #1883ba; border-radius: 6px;" data-backdrop="static" data-keyboard="false" >
                                                                <?php } elseif($fecha_dia!=""){?>
                                                                    <a href="{{url('/gerente-camal/show?id='.$ic->id.'&fecha_dia='.$fecha_dia.'&page='.$page.'')}}" style="text-decoration: none;padding: 10px;font-weight: 600;font-size: 20px; color: #ffffff; background-color: #1883ba; border-radius: 6px;" data-backdrop="static" data-keyboard="false" >
                                                                <?php }elseif($fecha_año!=""){?>
                                                                    <a href="{{url('gerente-camal/show?id='.$ic->id.'&fecha_año='.$fecha_año.'&page='.$page.'')}}" style="text-decoration: none;padding: 10px;font-weight: 600;font-size: 20px; color: #ffffff; background-color: #1883ba; border-radius: 6px;" data-backdrop="static" data-keyboard="false" >
                                                                <?php }elseif($searchT!=""){?>
                                                                    <a href="{{url('/gerente-camal/show?id='.$ic->id.'&page='.$page.'&searchT='.$searchT.'')}}" style="text-decoration: none;padding: 10px;font-weight: 600;font-size: 20px; color: #ffffff; background-color: #1883ba; border-radius: 6px;" data-backdrop="static" data-keyboard="false" >
                                                                <?php }else{?>
                                                                    <a href="{{url('/gerente-camal/show?id='.$ic->id.'&page='.$page.'')}}" class="btn waves-effect toastrDefaultSuccess" style="text-decoration: none;padding: 7px;font-weight: 500;font-size: 15px; color: #ffffff; background-color: #1883ba; border-radius: 6px;margin-top:0px !important;" data-backdrop="static" data-keyboard="false" >
                                                                <?php }?> 
                                                                <img  src="{{asset('assets/svg/vaca-sagrada.svg')}}" Style="width:30px;"></a>
                                                                @else     
                                                          @endif
                                                            </td>
                                                            <td> 
                                                           
                                                            @if(isset($idCabeceraDistribucion))
                                                
                                                                @foreach ($idCabeceraDistribucion as $icd)  
                                                               
                                                                   @if($icd->id_ingresos== $ic->id)
                                                                    <?php if($fecha_mes!=""){?>
                                                                        <a href="{{url('/gerente-camal/detallesDistribucion/'.$ic->id.'?fecha_mes='.$fecha_mes.'&page='.$page.'')}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false" >
                                                                    <?php } elseif($fecha_dia!=""){?>
                                                                        <a href="{{url('/gerente-camal/detallesDistribucion/'.$ic->id.'?fecha_dia='.$fecha_dia.'&page='.$page.'')}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false" >
                                                                    <?php }elseif($fecha_año!=""){?>
                                                                        <a href="{{url('/gerente-camal/detallesDistribucion/'.$ic->id.'?fecha_año='.$fecha_año.'&page='.$page.'')}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false" >
                                                                    <?php }elseif($searchT!=""){?>
                                                                        <a href="{{url('/gerente-camal/detallesDistribucion/'.$ic->id.'?page='.$page.'&searchT='.$searchT.'')}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false" >
                                                                    <?php }else{?>
                                                                        <a href="{{url('/gerente-camal/detallesDistribucion/'.$ic->id.'?page='.$page.'')}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false" >
                                                                    <?php }?>
                                                                    <img  src="{{asset('assets/svg/camion-de-reparto.svg')}}" Style="width:30px"></a>
                                                                    </a>
                                                                    @break;
                                                                    @endif 
                                                                @endforeach
                                                            @endif

                                                            </td>
                                                        </tr>
                                                    
                                                        @endforeach
                                                    @endif
                                                
                                                </tbody>
                                            </table>
                                            </div>     
                                </div>
                                <div class="row">
                                <?php if($fecha_dia!=""){?>
                                {{ $ingresoscamal->appends(['fecha_ingreso' => $fecha_dia])->links() }}                  
                                <?php } elseif($fecha_mes!=""){?>
                                {{ $ingresoscamal->appends(['fecha_mes_ingreso' => $fecha_mes])->links() }}                  
                                <?php }elseif($fecha_año!=""){?>
                                {{ $ingresoscamal->appends(['fecha_año_ingreso' => $fecha_año])->links() }}                  
                                <?php }elseif($searchT!=""){?> 

                                    {{ $ingresoscamal->appends(['searchT' => $searchT])->links() }} 
                                <?php }else{ ?>
                                {{  $ingresoscamal->links()}}
                                    <?php }?>
        
                                </div>    
                            </div>
                        </div>
                    </div>
                </div> 
            </div>	
        </div>
    </div>	
                      
@endsection
@push('scripts')
<script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
     <!-- Tempusdominus Bootstrap 4 --> 
<script src="{{asset('assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

  <script type="text/javascript">
   
    $(function() {
       
                //Money Euro
            //$('[data-mask]').inputmask()

    })


//Date range picker
$('#reservationdate').datetimepicker({
	format: 'L'
});
  //Timepicker
$('#timepicker').datetimepicker({
                format: 'YYYY-MM-DD',
                ignoreReadonly: true,
    
 })
 $('#timepicker2').datetimepicker({
                format: 'MM-YYYY',
                ignoreReadonly: true,
    
 })
 $('#timepicker3').datetimepicker({
                format: 'YYYY',
                ignoreReadonly: true,
    
 })

$('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'DD-MM-YYYY'
                    }                  
 })

 var myDate  = $("#fecha_ingreso").find("input").val();
   
     console.log(myDate);
    console.log(myDate);
 $(document).ready(function(){
    
  });



  </script>

  @endpush    