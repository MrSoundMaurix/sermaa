{!! Form::open(array('url'=>'/usuarios','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="form-group">
    <div class="input-group">
        <span class="input-group-text" style="background: transparent; border: none;">
            <i   class="fa fa-search"></i>
        </span>
        <input type="text" name="searchUser" id="search" class="form-control"  value="{{ isset($query) ? $query: old('searchUser') }}" placeholder="Búsqueda por todas las columnas."
            style="-moz-border-radius: 4px;-webkit-border-radius: 4px;border-radius: 4px;" />
    </div>
</div>
{{Form::close()}}