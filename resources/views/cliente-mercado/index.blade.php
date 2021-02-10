@extends('layouts.applte')
	@section('contenido')
	@include('layouts.messages')
	
		<div class="content-wrapper">
			<div class="content">
				<div class="modal-body ">
				    <div class="card card-info card-outline" >
						<div class="card">
						
							<div class="card-header">
								<div class="row">	
									<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										 
									</div>	
									<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										<span class="" style="text-align: center;">
												<h3 class="card-title" >PUESTOS ASIGNADOS</h3>
										</span>		
									</div>
								</div>
								
							</div>
							<div class="card-body">
                            <?php $a=0;$b=0;
                            if($puestoMercado==null){
                                $contP=0;  
                            }else{
                                $contP=count($puestoMercado);
                            } 
                            $contP=$contP/3; 
                            if($contP>0&&$contP<1){
                                $a=1;
                            }else{
                            $a= ceil($contP); //ceil=> redondea al próximo entero
                            } 
                           $c1=1;
                           $c2=1;
                           ?>
                            @for($i=1; $i<=$a;$i++ ) 
                                <div class="row"> 
                                @for($j=1; $j<=3;$j++ ) 
                               
                                    @if($b<(count($puestoMercado))) 
                                        <div class="col-md-4">
                                            <!-- Widget: user widget style 1 -->
                                                <div class="box box-widget widget-user-2">
                                                    <!-- Add the bg color to the header  amarillo= #ffc107 azul= #00a7d0  rosa=#e83e8c roa=#28a745 --> 
                                                   @if(( $c1 % 3 ) == 0)
                                                        <div class="widget-user-header bg-aqua-active" style="background-color: #e83e8c !important;"> <!---medio--->
                                                     @else 
                                                        @if(( $c2 % 3 ) == 0)
                                                            <div class="widget-user-header bg-yellow" style="background-color: #ffc107 !important;"> <!---ultimo--->
                                                        @else
                                                        <div class="widget-user-header bg-yellow" style="background-color: #00a7d0  !important;"> <!---primero--->
                                                        @endif 
                                                    @endif 
                                                        <div class="widget-user-image"> 
                                                            <img class="img-circle" src="{{asset('assets/img/store2.jpg')}}" alt="User Avatar">
                                                        </div>
                                                        <!-- /.widget-user-image --> 
                                                        <h3 class="widget-user-username text-white">{{$puestoMercado[$b]->sectorMercado->mercado}}</h3>
                                                        <h5 class="widget-user-desc text-white">Nro de puesto: {{$puestoMercado[$b]->nro_puesto}}</h5>
                                                    </div>
                                                    <div class="box-footer no-padding">                                
                                                                <table id="detalles" class="table table-responsive table-bordered table-condensed">
                                                                <tbody >   
                                                                    <tr style="border: hidden" >
                                                                        <td style="border: hidden" >
                                                                        SECTOR: <span class="badge bg-blue"> {{$puestoMercado[$b]->sectorMercado->sector}}</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr  >
                                                                    <td style="border: hidden" > ESTADIA: <span class="pull-right badge bg-pink"> {{$puestoMercado[$b]->sectorMercado->tipo_pago->estadia}}</span>
                                                                        </td>
                                                                    </tr>
                                                                    <td style="border: hidden" > TIPO DE PAGO: <span class="pull-right badge bg-warning text-white"> {{$puestoMercado[$b]->sectorMercado->tipo_pago->descripcion}}
                                                                                        @if($puestoMercado[$b]->sectorMercado->tipo_pago->estadia=="PERMANENTE")
                                                                                           <?php echo " - MENSUAL";?> </span>
                                                                                           @else
                                                                                                @if($puestoMercado[$b]->sectorMercado->tipo_pago->estadia=="EVENTUAL")
                                                                                                <?php echo " - DIARIO";?></span>
                                                                                                @else
                                                                                                    @if($puestoMercado[$b]->sectorMercado->tipo_pago->estadia=="OCASIONAL")
                                                                                                    <?php echo " - DIARIO";?>   </span>                                                                                       
                                                                                                    @endif
                                                                                                @endif
                                                                                        @endif
                                                                        </td>
                                                                    </tr>
                                                                    @if($puestoMercado[$b]->sectorMercado->tipo_pago->estadia=="OCASIONAL")
                                                                        <td style="border: hidden" > COSTO DE DERECHO DE VENTA: <span class="pull-right badge bg-green "> $ {{$puestoMercado[$b]->sectorMercado->tipo_pago->valor_pago}}</span>
                                                                            </td>
                                                                        </tr>                                                                                         
                                                                    @else
                                                                    <td style="border: hidden" > CANON ARRENDAMIENTO: <span class="pull-right badge bg-green"> $ {{$puestoMercado[$b]->sectorMercado->tipo_pago->valor_pago}}</span>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                    @if($puestoMercado[$b]->matriculado=="N"||$puestoMercado[$b]->matriculado==null|| $puestoMercado[$b]->matriculado=="")
                                                                        <td style="border: hidden" >  MATRICULA: <span class="pull-right badge bg-teal"> NO</span>
                                                                            </td>
                                                                        </tr> 
                                                                        <td style="border: hidden" > TIPO DE MATRICULA: <span class="pull-right badge bg-cyan">  -</span>
                                                                            </td>
                                                                        </tr>
                                                                        <td style="border: hidden" >  COSTO DE MATRICULA:  <span class="badge bg-danger">-</span>
                                                                            </td>
                                                                        </tr>
                                                                        @else
                                                                        <td style="border: hidden" >  MATRICULA: <span class="pull-right badge bg-teal"> SI</span>
                                                                            </td>
                                                                        </tr> 
                                                                        <?php $matricula= DB::table("matriculas_mercado")->where('id_puestos_mercado',$puestoMercado[$b]->id)
                                                                        ->whereYear('fecha_matricula', date('Y'))->get();
                                                                        ?>
                                                                        
                                                                       <td style="border: hidden" > TIPO DE MATRICULA: <span class="pull-right badge bg-cyan"> {{$matricula[0]->tipo_matricula}}</span>
                                                                        
                                                                            </td>
                                                                        </tr>
                                                                        <td style="border: hidden" > COSTO DE MATRICULA:<span class="badge bg-danger"> {{$matricula[0]->costo_matricula}}</span>
                                                                            </td>
                                                                        </tr>
                                                                    @endif

                                                                    <?php $c2++;?>
                                                                    <?php $b++;?>
                                                                    <?php if ($c1==1){ $c1=$c1+2;}else {$c1++;} ?>
                                                                    
                                                                    </tbody >
                                                                </table>
                                                           
                                                    </div>
                                                </div>
                                            <!-- /.widget-user -->  
                                        </div>
                                    @else
                                    @break;
                                    @endif  
                                   
                                @endfor        
                                        
                                </div>
                            @endfor    

							</div>		
						</div>
					</div>	
				</div>
			</div>	              	
		</div>							
	@push('scripts')
	<script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
 
    


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
@endsection
