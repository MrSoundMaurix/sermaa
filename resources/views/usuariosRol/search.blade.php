{!! Form::open(array('url'=>'/usuarios','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
    <label >
        <i class="fa fa-search"></i>
    </label>
    <label>
        <div class="form-group">
            <input type="text" name="searchUser" id="search" class="form-control"  value="{{ isset($query) ? $query: old('searchUser') }}" placeholder="Buscar ..." />
        </div>
    </label>
{{Form::close()}}