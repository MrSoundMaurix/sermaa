
@extends('layouts.applte') 
@section('contenido')

    <div class="content-wrapper">
            @include('layouts.messages')
            <div class="content">
                <div class="modal-body">
                <div class="card card-info card-outline" >
                    <div class="card">
                        <div class="card-header">  
                            <div class="row">	
                                <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                                    <span class="input-group-prepend">	
                                    </span> 
                                </div>	
                                <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                    <span class="" style="text-align: center;">
                                        <h3 class="card-title" >REGISTRO DE ANIMALES</h3>
                                    </span>		
                                </div>
                            </div>    
                        </div>
                        <div class="card-body">
                            <!-- <div class="row">
                                <div class="col-sm-7 " style="text-align:right">
                                @include('camal/faenador-camal/search')             
                                </div>
                            </div>  -->
                         
                         
                               
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8" >
                                                <tr role="row">
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Id. Ingreso</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Cod. usuario</th> 
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha Ingreso</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha Faenamiento</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Nombres y Apellidos</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >T. de animales</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($ingresoscamal))
                                                    @foreach ($ingresoscamal as $ic)
                                                    <tr role="row" class="odd"> 
                                                    <td class="sorting_1">{{$ic->id}}</td>    
                                                    <td class="sorting_1">{{$ic->users->codigo}}</td>    
                                                    <td class="sorting_1">{{$ic->fecha_ingreso}}</td>
                                                    <td class="sorting_1">{{$ic->fecha_faenamiento}}</td>
                                                    <td class="sorting_1">{{$ic->users->nombres}} {{$ic->users->apellidos}}</td>
                                                    <td class="sorting_1">
                                                            <?php $a= explode("_",$ic->t_animal);
                                                            if($a[0]!=0){?>
                                                                 <span class="pull-right badge bg-yellow" >Bovino  =  <?php echo $a[0]; ?></span>
                                                            <?php } //style="font-size:15px"
                                                            if($a[1]!=0){?>
                                                                <span class="pull-right badge bg-pink" > Porcino = <?php echo $a[1]; ?></span>
                                                           <?php }?>
                                                            </td>
                                                    <!--        -->
                                                  <!--   <td class="sorting_1"> {{$ic->id}}   </td>  -->  
                                                        <td> 
                                                             <a href="animal-camal/show?id={{$ic->id}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false">
                                                             <img  src="{{asset('assets/svg/vaca-sagrada.svg')}}" Style="width:30px;" >  Ver animales
                                                            </a>      
                                                        
                                                        </td>
                                                    </tr>
                                                
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        </div>     
                            </div>
                            <div class="row">                             
                            {{ $ingresoscamal->appends(['searchT' => $searchT])->links()}}
    
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