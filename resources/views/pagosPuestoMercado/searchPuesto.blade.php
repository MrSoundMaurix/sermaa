{{--{!! Form::open(['url' => '/pagos-puesto-mercado', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search']) !!}--}}
<div class="row">
    <div class="col-sm-12">
        
        <label>Seleccione el puesto  </label>
            <select id="id_puestos_mercado" class="form-control select2bs4" name="id_puestos_mercado" >
                @foreach($puestos_us as $p)
                <option value="{{$p['id_puesto']}}" {{-- $p->id == $filterPuesto ? 'selected' : '' --}}>{{$p['nro_puesto']}} - {{$p['nombres']}}</option>
                 @endforeach
            </select>
            
            <noscript><input type="submit" value="Submit"></noscript>
       
    </div>
</div>
{{--{!! Form::close() !!}--}}

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