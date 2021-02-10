{!! Form::open(['url' => 'matriculas-mercado/create', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search']) !!}
<div class="row">
    <div class="col-sm-7"> 
        <label> Nombre de usuario del mercado  </label>
            <select id="id_users" class="form-control select2bs4" name="id_users" >
               @foreach($usuarios_mercado as $p)
                <option value="{{$p->id}}" {{-- $p->id == $filterPuesto ? 'selected' : '' --}}>{{$p->nombres}} {{$p->apellidos}}</option>
                 @endforeach
            </select> 
    </div>
    <div class="col-sm-5">
        <label> Ir </label>
            <div class="form-group">
                <button class="btn btn-info btn-rounded waves-effect" type="submit"><i
                 class="fa fa-plus-square"></i> Realizar matrícula
                </button>
            </div> 
    </div>    
</div>
{!! Form::close() !!}

@push('scripts')
    <script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            //Initialize Select2 Elements
            // $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });

    </script>
@endpush