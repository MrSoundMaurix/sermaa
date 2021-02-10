{!! Form::open(array('url'=>'/sector-mercado','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
    <label >
       <i   class="fa fa-search"></i>
    </label>
        <label>
            <div class="form-group">
                <input type="text" name="searchT" id="search" class="form-control"  value="" placeholder="Search.. " />
            </div>
        </label>


{{Form::close()}}