
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
                                <div class= "col-sm-5">
                                </div>
                                <div class="col-sm-4"> 
                                    <h3 class="card-title" style="text-align: center;">CÁMARA DE VIDEO VIGILANCIA CAMAL</h3> 
                                 </div>  
                            </div>  
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-1" >
                                        <a  class="btn btn-block" target="_blank" Style="display:none;" href="http://96.66.143.131:9000/" >
                                        <i class="fa fa-video text-white  btn-lg"  aria-hidden="true"></i>     Cámara Ingreso Bovino</a><br>
                                </div>

                                <div class="col-sm-5" >
                                  <div class="row">
                                      <h3 class="card-title" style="text-align: center;">UBICACIÓN DE CÁMARAS</h3> 
                                  </div><br><br><br>
                                  <div class="row">  
                                      <img src="{{asset('assets/img/ubicacion_camaras.png')}}" style="border: 3px solid; width:100%; " >
                                     
                                    <!--   <img src="{{url('/assets/img/ubicacion_camaras.png')}}" style="border: 3px solid; width:100%; " >
                                      
                                      <img src="{{URL::asset('/assets/img/ubicacion_camaras.png')}}" style="border: 3px solid; width:100%;" /> -->
                                     {{--  <img  src="public_path('assets/img/fondo.jpg')" style="border: 3px solid; width:100%;"/> --}}
                                      
                                  </div> 
                                  </br>
                                </div>
                                <div class="col-sm-1" >
                                </div>
                                <div class="col-sm-4" >
                                    <a style="height:52px" class="btn-block button1 " target="_blank" href="http://96.66.143.131:9000/" >
                                   
                                    <i class="fa fa-video btn-lg " style="color: #4CAF50; "  aria-hidden="true"> 1 </i>&nbsp;&nbsp;&nbsp;<img src="assets/svg/camara-de-seguridad.svg" style="width:30px; display:none;" >Cámara Ingreso de Bovino</a><br>
                                    
                                    <a  class="btn-block button2 " target="_blank" href="http://96.66.143.131:9000/">
                                    <i class="fa fa-video btn-lg" style="color: #008CBA"  aria-hidden="true"> 2</i>    Cámara Ingreso de Porcino</a><br>    
                                    
                                    <a  class="btn-block button3 " target="_blank" href="http://96.66.143.131:9000/">
                                    <i class="fa fa-video btn-lg" style="color: #dc3545" aria-hidden="true"> 3</i>    Cámara Entrada de Emergencia</a><br>
                                
                                    <a  class="btn-block button4 " target="_blank" href="http://96.66.143.131:9000/">
                                    <i class="fa fa-video btn-lg"  style="color: #e83e8c"  aria-hidden="true"> 4</i>    Cámara Sala faenamiento de Bovino</a><br>
                                    
                                    <a  class="btn-block button5 " target="_blank" href="http://96.66.143.131:9000/">
                                    <i class="fa fa-video btn-lg" style="color: #ffc107" aria-hidden="true"> 5</i>    Cámara Sala faenamiento de Porcino</a><br>
                                   
                                    <a  class="btn-block button6 " target="_blank" href="http://96.66.143.131:9000/">
                                    <i class="fa fa-video btn-lg" style="color:  #20c997" aria-hidden="true"> 6</i>    Cámara Entrada de Vehículo</a><br>    
                                    <a  class="btn-block button7 " target="_blank" href="http://96.66.143.131:9000/">
                                    <i class="fa fa-video btn-lg" style="color:  #17a2b8" aria-hidden="true"> 7</i>    Cámara sala de Pesos</a><br>
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
<script type="text/javascript" >
 
</script>

<style>
.a {
 /*background-color: #4CAF50; Green*/
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 3px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
.i:hover{
  background-color: red;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 3px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 3px solid #dc3545;
}

.button3:hover {
  background-color: #dc3545;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 3px solid #e83e8c;
}

.button4:hover {background-color: #e83e8c;
  color: white;}

.button5 {
  background-color: white;
  color: black;
  border: 3px solid #ffc107;
}

.button5:hover {
  background-color: #ffc107;
  color: white;
}
.button6 {
  background-color: white;
  color: black;
  border: 3px solid #20c997;
}

.button6:hover {
  background-color: #20c997;
  color: white;
}
.button7 {
  background-color: white;
  color: black;
  border: 3px solid #17a2b8;
}

.button7:hover {
  background-color: #17a2b8;
  color: white;
}
</style>

@endpush