@extends('layouts.applte')
    @section('contenido')
                    <!--Content Header (Page header)-->
                    
<div class="content-wrapper">             
    @include('layouts.messages')
  
<style>
.nro_tamanio{
 width:100px;
}
.campos{
  width: 180px;
}
.nro{
  width: 65px;
}
</style>
           
  <!-- Main content -->
  <div class="content">
    <div class="modal-body">
        <div class="card card-info card-outline">
          <div class="card-header">  
            <div class="row">	
                <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                  <span class="input-group-prepend">	
                    
                  </span> 
                </div>	
                <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                  <span class="" style="text-align: center;">
                      <h3 class="card-title" >INGRESO DIARIO</h3>
                  </span>		
                </div>
              </div>   
            </div>
                      @if ((TRUE))
                            <div class="card-body">
                              {!! Form::open(['route' => 'antemorten.store2','method'=>'POST']) !!}
                              {{Form::token()}}
                              @csrf
                              @method('POST')
                             {{--  <fieldset class="form-group">
                              <div class="row">
                                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
                                  <label>Fecha:</label>
                                    <div class="input-group">
                                      <span class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="fa fa-calendar"></i>
                                        </span>
                                      </span>
                                    
                                    <input class="form-control" id="fecha" name="fecha" type="text" value="" readonly required autofocus>
                                  
                                    </div> 												     
                                </div>		
                                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
                                  <label>Hora:</label>
                                    <div class="input-group">
                                      <span class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="fa fa-clock"></i>
                                        </span>
                                      </span>
                                    <input class="form-control" id="hora" name="hora" type="text" value="" readonly required autofocus>
                                    </div> 												     
                                </div>		
                               
                              </fieldset> --}}
                              <input type="hidden" value="{{$fecha_d}}" name="fecha_d"> 
                              
                              <fieldset class="form-group">
                              <div class="">
                                <hr>
                                  <h3>Bovinos</h3>
                                <div class="table-responsive">
                                  <table id="" class="table table-striped table-bordered  table-responsive  table-hover" >
                                    <thead style="background-color:#17a2b8">
                                      
                                      <th style="color:#FFFFFF">Fecha</th>
                                      <th style="color:#FFFFFF">Hora</th>
                                      <th style="color:#FFFFFF">Especie</th>
                                      <th style="color:#FFFFFF">Lugar de procedencia</th>
                                      <th style="color:#FFFFFF">Nro. CSMI</th>
                                      <th style="color:#FFFFFF">Nro. Lotes</th>
                                      <th style="color:#FFFFFF">Estapa productiva</th>
                                    
                                    <th style="color:#FFFFFF">Nro. Machos</th>   
                                      <th style="color:#FFFFFF">Nro. Hembras</th>
                                      <th style="color:#FFFFFF">Total</th>
                                      <th style="color:#FFFFFF">Nro. Animales muertos</th>
                                      <th style="color:#FFFFFF">Causa probable</th>
                                      <th style="color:#FFFFFF">Decomiso</th>
                                      <th style="color:#FFFFFF">Aprovechamiento</th>
                                      <th style="color:#FFFFFF">Nro. síndrome nervioso</th>
                                      <th style="color:#FFFFFF">Nro. síndrome digestivo</th>
                                      <th style="color:#FFFFFF">Nro. síndrome respiratorio</th>
                                      <th style="color:#FFFFFF">Nro. síndrome Vesicular</th>
                                      <th style="color:#FFFFFF">Tipo secreción</th>
                
                                      <th style="color:#FFFFFF">Nro. Animales con cojera</th>
                                      <th style="color:#FFFFFF">Nro. Animales no ambulatorios</th>
                                      <th style="color:#FFFFFF;background-color:#0023eb">Nro. Matanza nomal</th>
                                      <th style="color:#FFFFFF">Nro. Matanza precauciones especiales</th>
                                      <th style="color:#FFFFFF">Nro. Matanza de emergencia</th>
                                      <th style="color:#FFFFFF">Nro. Aplazamiento de matanza</th>
                                      <th style="color:#FFFFFF">Observaciones</th>
                                    </thead>
                                      <tbody>
                                    {{--   {{dd($arreglo_bovino)}}  --}}
                                        @foreach ($arreglo_bovino as $b)
                                        <tr role="row" id="fila" class="odd">
                                          <td class="sorting_1"> <input class="form-control nro_tamanio" id="fecha" name="fecha[]" type="text" value="{{$b["fecha"]}}" readonly required autofocus>
                                            <input class="form-control" id="id_ingresos" name="id_ingresos[]" type="hidden" value="{{$b["id_ingreso"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro_tamanio" id="hora" name="hora[]" type="text" value="{{$b["hora"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro_tamanio" id="especie" name="especie[]" type="text" value="{{$b["especie"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="lugar_procedencia" name="lugar_procedencia[]" type="text" value="{{$b["lugar_procedencia"]}}" readonly autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="csmi" name="csmi[]" type="text" value="{{$b["csmi"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_lotes" name="nro_lotes[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="etapa_productiva" name="etapa_productiva[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_bovinos_machos" name="nro_bovinos_machos[]" type="text" value="{{$b["nro_bovinos_machos"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_bovinos_hembras" name="nro_bovinos_hembras[]" type="text" value="{{$b["nro_bovinos_hembras"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input  class="form-control nro" type="text"  name="total[]"   value="{{$b["total"]}}"    readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_animales_muertos" name="nro_animales_muertos[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="causa_probable" name="causa_probable[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="decomiso" name="decomiso[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="aprovechamiento" name="aprovechamiento[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_nervioso" name="nro_sindrome_nervioso[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_digestivo" name="nro_sindrome_digestivo[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_respiratorio" name="nro_sindrome_respiratorio[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_vesicular" name="nro_sindrome_vesicular[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="tipo_secrecion" name="tipo_secrecion[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_cojera" name="nro_cojera[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_ambulatorios" name="nro_ambulatorios[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_matanza_normal" name="nro_matanza_normal[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_matanza_especial" name="nro_matanza_especial[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_matanza_emergencia" name="nro_matanza_emergencia[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_aplazamiento_matanza" name="nro_aplazamiento_matanza[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="observaciones" name="observaciones[]" type="text" value="" autofocus></td>
                                        </tr> 
                                        @endforeach
                                      </tbody>
                                  </table>
                                </div>
                                <div class="table-responsive">
                                  <hr>
                                  <h3>Porcinos</h3>
                                  <table id="" class="table table-striped table-bordered  table-responsive  table-hover" >
                                    <thead style="background-color:#17a2b8">
                                      
                                      <th style="color:#FFFFFF">Fecha</th>
                                      <th style="color:#FFFFFF">Hora</th>
                                      <th style="color:#FFFFFF">Especie</th>
                                      <th style="color:#FFFFFF">Lugar de procedencia</th>
                                      <th style="color:#FFFFFF">Nro. CSMI</th>
                                      <th style="color:#FFFFFF">Nro. Lotes</th>
                                      <th style="color:#FFFFFF">Estapa productiva</th>
                                    
                                    <th style="color:#FFFFFF">Nro. Machos</th>   
                                      <th style="color:#FFFFFF">Nro. Hembras</th>
                                      <th style="color:#FFFFFF">Total</th>
                                      <th style="color:#FFFFFF">Nro. Animales muertos</th>
                                      <th style="color:#FFFFFF">Causa probable</th>
                                      <th style="color:#FFFFFF">Decomiso</th>
                                      <th style="color:#FFFFFF">Aprovechamiento</th>
                                      <th style="color:#FFFFFF">Nro. síndrome nervioso</th>
                                      <th style="color:#FFFFFF">Nro. síndrome digestivo</th>
                                      <th style="color:#FFFFFF">Nro. síndrome respiratorio</th>
                                      <th style="color:#FFFFFF">Nro. síndrome Vesicular</th>
                                      <th style="color:#FFFFFF">Tipo secreción</th>
                
                                      <th style="color:#FFFFFF">Nro. Animales con cojera</th>
                                      <th style="color:#FFFFFF">Nro. Animales no ambulatorios</th>
                                      <th style="color:#FFFFFF;background-color:#0023eb">Nro. Matanza nomal</th>
                                      <th style="color:#FFFFFF">Nro. Matanza precauciones especiales</th>
                                      <th style="color:#FFFFFF">Nro. Matanza de emergencia</th>
                                      <th style="color:#FFFFFF">Nro. Aplazamiento de matanza</th>
                                      <th style="color:#FFFFFF">Observaciones</th>
                                    </thead>
                                      <tbody>
                                    {{--   {{dd($arreglo_bovino)}}  --}}
                                        @foreach ($arreglo_porcino as $b)
                                        <tr role="row" id="fila" class="odd">
                                          <td class="sorting_1"> <input class="form-control nro_tamanio" id="fechaP" name="fechaP[]" type="text" value="{{$b["fecha"]}}" readonly required autofocus>
                                            <input class="form-control" id="id_ingresosP" name="id_ingresosP[]" type="hidden" value="{{$b["id_ingreso"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro_tamanio" id="horaP" name="horaP[]" type="text" value="{{$b["hora"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro_tamanio" id="especieP" name="especieP[]" type="text" value="{{$b["especie"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="lugar_procedenciaP" name="lugar_procedenciaP[]" type="text" value="{{$b["lugar_procedencia"]}}" readonly autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="csmiP" name="csmiP[]" type="text" value="{{$b["csmi"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_lotesP" name="nro_lotesP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="etapa_productivaP" name="etapa_productivaP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_porcinos_machos" name="nro_porcinos_machos[]" type="text" value="{{$b["nro_porcinos_machos"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_porcinos_hembras" name="nro_porcinos_hembras[]" type="text" value="{{$b["nro_porcinos_hembras"]}}" readonly required autofocus></td>
                                          <td class="sorting_1"> <input  class="form-control nro" type="text"  name="totalP[]"   value="{{$b["total"]}}"    readonly required autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_animales_muertosP" name="nro_animales_muertosP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="causa_probableP" name="causa_probableP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="decomisoP" name="decomisoP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="aprovechamientoP" name="aprovechamientoP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_nerviosoP" name="nro_sindrome_nerviosoP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_digestivoP" name="nro_sindrome_digestivoP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_respiratorioP" name="nro_sindrome_respiratorioP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_sindrome_vesicularP" name="nro_sindrome_vesicularP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="tipo_secrecionP" name="tipo_secrecionP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_cojeraP" name="nro_cojeraP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_ambulatoriosP" name="nro_ambulatoriosP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_matanza_normalP" name="nro_matanza_normalP[]" type="text" value="" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_matanza_especialP" name="nro_matanza_especialP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_matanza_emergenciaP" name="nro_matanza_emergenciaP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control nro" id="nro_aplazamiento_matanzaP" name="nro_aplazamiento_matanzaP[]" type="text" value="0" autofocus></td>
                                          <td class="sorting_1"> <input class="form-control campos" id="observacionesP" name="observacionesP[]" type="text" value="" autofocus></td>
                                        </tr> 
                                        @endforeach
                                      </tbody>
                                  </table>
                                </div>
                              </div>
                              </fieldset>
                
                              <div class="form-group">
                                <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                                <a href="{{url('antemorten')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                                  <span class="fa fa-long-arrow-alt-left"></span> Regresar
                              </a> 
                              
                                <button class="btn btn-primary" type="submit" ><i class="fa fa-save"></i> Guardar</button>
                                
                                {{-- <a href="{{ url('distribucion-camal.store') }}" class="btn btn-primary" title="Guardar">
                                  <span class=""></span> Guardar
                                </a>    --}}
                              
                              </div>
                
                
                
                              {!! Form::close() !!}		
                          </div>

                      @endif
                      
                    
                      
                      
                       
            
        </div>
    </div>
  </div>
</div>
       
  @endsection            
    
              
  @push('scripts')
  <script>

  </script>
   <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
   <script src="{{asset('assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
  <script>
    $(function() {
       //Datemask dd/mm/yyyy
       $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
            $('[data-mask]').inputmask()

    })

  </script>

  @endpush
                         