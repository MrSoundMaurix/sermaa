{!! Form::open(array('url'=>'/puestos-mercado','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
    <label >
        <i class="fa fa-search"></i>
    </label>
    <label>
        <div class="form-group">
            <!-- <input type="text" name="searchT" id="search" class="form-control"  value="{{ isset($query) ? $query: old('searchT') }}" placeholder="Buscar ..." /> -->
        </div>
    </label>
{{Form::close()}}