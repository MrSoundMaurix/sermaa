
@extends('layouts.applte')
@section('contenido')
<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  

    <div class="content-wrapper">
                <!--Content Header (Page header)-->
               
                @include('layouts.messages')
               
				<div class="content">
					<div class="modal-body">
				    	<div class="card card-info card-outline">
                            <div class="card-header">    
                            <div class="row" style="text-align: center;">
                               		
                                        <h3 class="card-title">HISTORIAL DE PAGOS DE MATRÍCULA</h3>
										
								
                               </div>   
                            </div>
                            <div class="card-body ">
                                <div class="row">  
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">	
                                        <span class="" style="text-align: rigth;">
                                        @include('cliente-mercado/search')                                                                                 
                                        </span>	
                                    </div> 
                                
                                </div> 
  
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8; color:#fff">
                                        <tr role="row">
                                          {{--   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Nro</th>--}}
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >Fecha y hora de registro</th> 
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >Nro de Puesto</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending"  >Responsable de la Matrícula</th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >Tipo de Matrícula</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >Costo</th>
                                  <!--         <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 88px;">Opciones</th> -->
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($matriculaMercado))
                                            @foreach ($matriculaMercado as $t)
                                            <tr role="row" class="odd">
                                                {{--  <td class="sorting_1">{{$uc->id}}</td>  --}}
                                                <td class="sorting_1">{{$t->fecha_matricula}}</td>
                                                
                                              {{--  <?php $id_user_puesto = DB::table('puestos_mercado')->where('id',$t->id_puestos_mercado)->get(); ?>--}}
                                                <td class="sorting_1">{{$t->puestos->nro_puesto}}</td>
                                               
                                                
                                                    <td class="sorting_1">{{$t->responsableMatricula->nombres." ". $t->responsableMatricula->apellidos}}</td>
                                                   
                                                   
                                                                                   
                                             
                                              <!--  <td class="sorting_1">{{$t->id_puestos_mercado}}</td>
                                                -->
                                               <td class="sorting_1">{{$t->tipo_matricula}}</td>
                                               <td class="sorting_1"> $ {{$t->costo_matricula}}</td>
                                              
                                              
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                            </table>
                                            </div>
    
                                </div>
                                <div class="row">
                                {{ $matriculaMercado->appends(['searchT' => $searchT])->links() }} 

                                    
                                </div>    
                            </div>
                        </div>
                    </div> 
				</div>	
			</div>
        </div>	

              
@endsection

@push('scripts')

<script type="text/javascript">
function handleSelect(elm){
    window.location = elm.value+"";
}
</script>
<!--EDITAR Y ELIMINAR TIPO PAGO MERCADO------->
    <script type="text/javascript">
        //EDITAR
        $('#editMatriculaMercadoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var fecha_matricula = button.data('fecha_matricula')
            var costo_matricula = button.data('costo_matricula')
            var id_users = button.data('id_users')
            var responsable_matricula = button.data('responsable_matricula')

            var modal = $(this)
            modal.find(".modal-body #id").val(id);
            modal.find('.modal-body #fecha_matricula').val(fecha_matricula);
            modal.find(".modal-body #costo_matricula").val(costo_matricula);
            modal.find(".modal-body #id_users").val(id_users);
            modal.find(".modal-body #responsable_matricula").val(responsable_matricula);
        });
    </script>
    <script>
        $("#submitMe").click(function() {
            $.ajax({
               type: 'POST',
               url: "/pdfmatriculasMercado",
               method: "GET",
               data: $('#myform').serialize(),
               success: function(data) {
                  console.log(data);
                  $('#dateSelected').text(data);
               }
            });
            return false;
         })
     </script>
    
@endpush