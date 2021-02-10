@extends('layouts.applte')
    @section('contenido')
                    <!--Content Header (Page header)-->
               
    @include('layouts.messages')
    
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blank Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pruebas</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
      
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Provincias</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              
              </div>
            </div>
            <div class="card-body">
              <div class="col-sm-6 md:w-1/3 px-3 ">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Provincia
                  </label>
                  <div class="relative">
                  <select id="provincia" name="provincia" class="block appearance-none w-full bg-gray-200 border border-gray-200 
                  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white
                    focus:border-gray-500" >
                      @foreach ($provincias as $c)
                      <option value="{{$c}}" {{old('provincia')==$c ? 'selected' : ''}}>{{$c}}</option>
                      @endforeach
                  </select>
                  
                  </div>
              </div>
              <div class="col-sm-6 md:w-1/3 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Cantón
                  </label>
                  <div class="relative">
                  <select id="canton" data-old="{{ old('canton') }}" name="canton"  class="block appearance-none w-full bg-gray-200 border
                    border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500" >
                      
                  </select>
                  
                  </div>
              </div>
  
              <div class="col-sm-6 md:w-1/3 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Parroquia
                  </label>
                  <div class="relative">
                    <select id="parroquia" data-old="{{ old('parroquia') }}" name="parroquia"  class="block appearance-none w-full bg-gray-200 border
                    border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                      focus:outline-none focus:bg-white focus:border-gray-500" >
                    </select>
                  </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->                
        <!-- /.card -->
      </section>
  @endsection            
    
              
  @push('scripts')
  <script>
  
    $(document).ready(function(){
      function loadCareer() {
          var faculty_id = $('#provincia').val();
          if ($.trim(faculty_id) != '') {
  
            console.log(faculty_id);
              $.get("/ubicacion/canton", {faculty_id: faculty_id}, function (careers) {
  
                  var old = $('#canton').data('old') != '' ? $('#canton').data('old') : '';
  
                  $('#canton').empty();
                  $('#canton').append("<option value=''>Seleccione el cantón</option>");
                  console.log(careers);
                  $.each(careers, function (index, value) {
                      $('#canton').append("<option value='" + value + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              }); 
          }
      }
      loadCareer();
      $('#provincia').on('change', loadCareer);
      
  });
    $(document).ready(function(){
      function loadCanton() {
          var canton = $('#canton').val();
          if ($.trim(canton) != '') {
  
            console.log(canton);
              $.get("/ubicacion/parroquias", {faculty_id: canton}, function (careers) {
                  var old = $('#parroquia').data('old') != '' ? $('#parroquia').data('old') : '';
                  $('#parroquia').empty();
                  $('#parroquia').append("<option value=''>Selecciona la parroquia</option>");
                  console.log(careers);
                  $.each(careers, function (index, value) {
                      $('#parroquia').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              }); 
          }
      }
      loadCanton();
      $('#canton').on('change', loadCanton);
  });
  </script>
  @endpush
                         