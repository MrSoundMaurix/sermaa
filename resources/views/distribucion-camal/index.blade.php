
@extends('layouts.applte') 
@section('contenido')

@include('distribucion-camal/modal_distribucion')
    <div class="content-wrapper">
            @include('layouts.messages')
           
            <div class="content">
                <div class="modal-body">
                    <div class="card card-info card-outline">
                    <div class="card">
                        <div class="card-header">  
                            <div class="row">	
                                    <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                                        <span class="input-group-prepend">	
                                            
                                        </span> 
                                    </div>	
                                    <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                        <span class="" style="text-align: center;">
                                                <h3 class="card-title" >DISTRIBUCIÓN</h3>
                                        </span>		
                                    </div>
                                </div>   
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 md:w-1/3 px-3">
                                  
                                </div>
                                
                                <div class="col-sm-6 " style="text-align:right">
                              {{--   @include('camal/faenador-camal/search')    --}}       
                                </div>
                            </div>    
                               
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8" >
                                                <tr role="row">
                                                     <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Código usuario</th> 
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 100px;">Fecha y Hora</th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Nombres y Apellidos</th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 209px;">Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             {{--   {{ dd($ingresoscamal)}} --}}
                                                @if(isset($ingresoscamal))
                                                    @foreach ($ingresoscamal as $ic)
                                                    <tr role="row" class="odd">    
                                                    <td class="sorting_1">{{$ic->codigo}}</td>
                                                    
                                                    <td class="sorting_1">{{$ic->fecha_ingreso}}</td>
                                                    <td class="sorting_1">{{$ic->nombres}} {{$ic->apellidos}}</td>
                                                        <td> 
                                                           
                                                            <a href="{{ route('distribucion-camal.show', $ic->id )}}"  class="btn btn-success btn-rounded waves-effect" title="Añadir Nueva Distribución">
                                                              <span class="fa fa-plus-square"></span>  Distribuir
                                                          </a> 
                                                        
                                                          {{--   <a href="" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" 
                                                            id="boton" data-backdrop="static" data-keyboard="false"
                                                            data-id="{{$ic->id}}"data-toggle="modal" data-target="#verDistribuidosModal"  >
                                                            <i class="far fa-eye"  aria-hidden="true"></i>  Distribuciones</a>
                                                        </a>  --}}
                                                        </td>
                                                    </tr>
                                                
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        </div>     
                            </div>
                           
                            <div class="row">                             
                                 {{ $ingresoscamal->render() }}
    
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
<script >

</script>
@endpush

            
@push('scripts')
<script>


  /* $(document).ready(function(){ */
    $('#verDistribuidosModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    /* function obtenerListaDistribuciones() {
        
        */
        var id = button.data('id') 
       /*  var faculty_id = $('#provincia').val(); */
        console.log(id);
        if ($.trim(id) != '') {

          console.log(id);
            $.get("/distribucion-camal/distribucion", {id: id}, function (lista) {

                 var old = $('#valor').data('old') != '' ? $('#valor').data('old') : '';

                    $('#tabla').empty();
                    $('#tabla').append("<option  value=''>Seleccione</option>");  
               
                // console.log(lista);
                $.each(lista, function (index, value) {
                   console.log("value : "+value);
                   value=value.split("_");
                   $('#tabla').append("<option id='valor' value='"+value[3] +"'>"+value[0]+"  |  "+value[1]+"  |  "+value[2]+"</option>");
                  
                   }) 
                
            }); 
        }
    });


</script>
  @endpush
               