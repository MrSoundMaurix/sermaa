{!! Form::open(array('url'=>'/cliente-mercado/show','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
    <div class="input-group">
        <span class="input-group-text" style="background: transparent; border: none;">
            <i   class="fa fa-search"></i>
        </span>
        <input type="text" name="searchT" id="search" class="form-control"  value="{{ isset($searchT) ? $searchT: old('searchT') }}" placeholder="Búsqueda por nro de puesto.. "
            style="-moz-border-radius: 4px;-webkit-border-radius: 4px;border-radius: 4px;" />
    </div>
</div>
{{Form::close()}} 
