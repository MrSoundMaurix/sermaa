{!! Form::open(array('url'=>'/gerente-camal','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
    <label >
       <i   class="fa fa-search"></i>
    </label>
        <label>
            <div class="form-group">
                <input type="text" name="searchT" id="search" class="form-control"  value="{{ isset($searchT) ? $searchT: old('searchT') }}" placeholder="Search.. " />
            </div>
        </label>


{{Form::close()}}