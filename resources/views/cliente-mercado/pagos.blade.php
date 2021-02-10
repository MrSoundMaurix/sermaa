@extends('layouts.applte')
@section('contenido')
@include('cliente-mercado/edit')
    
    <div class="content-wrapper">
        <div class="content">
            <div class="modal-body">
                <div class="card card-info card-outline">
                    <div class="card">
                        <div class="card-header">
							<div class="row">	
									
												<h3 class="card-title" >HISTORIAL DE PAGOS DEL PUESTO</h3>
							</div>		
						</div>
                        <div class="card-body">

                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">	
                                
                                    <span class="" style="text-align: rigth;">
                                    @include('cliente-mercado/searchPago')                                                                                     
                                    </span>	
                            </div>
                        </div>
						<div class="row">	
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">     
								<div class="table-responsive">
                                
                                
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#17a2b8; color:#fff">
                                        <tr role="row">
                                            
                                            
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"aria-label="Date registered: activate to 
                                                sort column ascending" >Fecha / Hora de registro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Date registered: activate 
                                                to sort column ascending" >Fecha de Pago
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Date registered: activate 
                                                to sort column ascending" >Nro de puesto
                                            </th>
                                           <!--  <th class="sorting">Matrícula</th> -->

                                           <!--  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Date registered: activate
                                                 to sort column ascending"style="width: 150px;">Valor total
                                            </th> -->
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Date registered: activate
                                                 to sort column ascending">Responsable Cobro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Date registered: activate to 
                                            sort column ascending"
                                            >¿Pago Realizado?
                                        </th>
                                          <!--   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"aria-label="Role: activate to sort column
                                                 ascending" >Foto
                                            </th> -->
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Role: activate to sort column
                                                 ascending" > Ver
                                            </th>
                                            {{--   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 88px;">Opciones</th> --}}

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($pagosPuestoMercado))
                                            @foreach ($pagosPuestoMercado as $t)
                                                <tr role="row" class="odd">
                                                    {{--  <td class="sorting_1">{{$uc->id}}</td>  

                                                  {{--  @foreach ($puestosMercado as $p)
                                                    
                                                        @if ($t->id_puestos_mercado==$p->id)
                                                            <td class="sorting_1">{{$p->nro_puesto}}</td>
                                                        @endif

                                                    @endforeach--}}
                                                    
                                                
                                                  
                                                    <!-- <td class="sorting_1">{{$t->user->nombres ." ". $t->user->apellidos}}</td> -->
                                                    <td class="sorting_1">{{$t->fecha}}</td>
                                                    <td class="sorting_1">{{ $t->fecha_pago}}</td>
                                                    <td class="sorting_1">{{$t->puestoMercado->nro_puesto}}</td>
                                                    <!-- <td class="sorting_1">{{$t->matricula}}</td> -->

                                                  <!--   <td class="sorting_1">{{$t->valor_total}}</td> -->
                                                    <td class="sorting_1">{{$t->responsableCobro->nombres." ". $t->responsableCobro->apellidos}}</td>
                                                   @if($t->pago_realizado==1)
                                                    <td class="sorting_1">Si</td>
                                                   
                                                   @endif
                                                   @if($t->pago_realizado==0)
                                                    <td class="sorting_1">No</td>
                                                   
                                                   @endif
                                                    
                                                  <!--   <td class="sorting_1">
                                                        @if ($t->foto)
                                                            <img
                                                                src="{{ 'data:image/' . $t->fototype . ';base64,' . $t->foto }}"
                                                                style="max-width:75px;">
                                                        @endif
                                                    </td> -->
                                                     <td>

                                                        <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                        data-backdrop="static"
                                                           data-keyboard="false"
                                                            data-id="{{$t->id}}" 
                                                            data-pago_realizado="{{$t->pago_realizado}}"
                                                           data-observacion="{{$t->observacion}}"
                                                            data-matricula="{{$t->matricula}}"
                                                            data-foto1="{{ 'data:image/' . $t->fototype . ';base64,' . $t->foto }}"
                                                            data-valor_pago="{{$t->valor_total}}"  data-toggle="modal"
                                                             data-target="#editPagosPuestoMercadoModal"  >
                                                            <i class="fa fa-eye"  aria-hidden="true"></i>
                                                        </a>

                                                   {{--     <a title="Eliminar" data-toggle="modal" data-target="#deletePagosPuestoMercadoModal"
                                                            data-action="{{route('pagos-puesto-mercado.destroy',$t->id)}}"
                                                             data-tipo_pago="{{$t->tipo_pago}}"
                                                            data-valor_pago="{{$t->valor_pago}}" href="#" class="btn btn-danger">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    </br>
                                    <div class="row">
                            {{-- $pagosPuestoMercado->links() --}}   
                            {{ $pagosPuestoMercado->appends(['searchT' => $searchT])->links()}}
                           </div>
                                  </div> 
                                </div>
                                

                            </div> 
                           
                            </div>
                           
                            </fieldset>
                            </div>
                            
                    
                        
                    



               </div>
            </div>
        </div>
    </div>
    


@endsection

@push('scripts')
    <script>
      //EDITAR
      $('#editPagosPuestoMercadoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var valor_pago = button.data('valor_pago')
           // var pago_realizado = button.data('pago_realizado')
            var matricula = button.data('matricula')
            var foto1 = button.data('foto1')
            var observacion = button.data('observacion')
            var modal = $(this)
            modal.find(".modal-body #id").val(id);
            modal.find('.modal-body #valor_pago').val(valor_pago);
            modal.find('.modal-body #observacion').val(observacion);
            modal.find('.modal-body #matricula').val(matricula);
            $('#foto1').attr('src', foto1);
           
        });

        $( document ).ready(function() {

            var select = document.getElementById('pago_realizado');
            select.addEventListener('change',
            function(){
            var selectedOption = this.options[select.selectedIndex];
            console.log(selectedOption.value + ': ' + selectedOption.text);
            if(selectedOption.value=="false"){
                console.log(selectedOption.value);
                $('#foto').attr('required','');  
            }else  if(selectedOption.value=="true"){
                console.log(selectedOption.value);
                $('#foto').removeAttr('required') 
            }
            });
            });

       
        $( document ).ready(function() {

        var select = document.getElementById('pago_realiza');
        select.addEventListener('change',
        function(){
        var selectedOption = this.options[select.selectedIndex];
       // console.log(selectedOption.value + ': ' + selectedOption.text);
        if(selectedOption.text=="No"){
            $('#foto1').attr('required',''); 
        }else  if(selectedOption.text=="Si"){
            $('#foto1').removeAttr('required') 
        }
        });
        });
       

    </script>
@endpush
