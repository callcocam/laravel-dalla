<form class="table-filter">
    <div class="row">
        <div class="col-sm-3">
            @if($showItems)
                <div class="show-entries">
                    <span>Mostrar</span>
                    <select name="perPage" class="form-control">
                        @foreach($showItems as $value)
                            <option
                                    @if($params['perPage'] == $value) selected @endif
                                    value="{{ $value }}"> {{ $value }}</option>
                        @endforeach
                    </select>
                    <span>registros ( {{ $params['total'] }} )</span>
                </div>
            @endif
        </div>
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            <div class="filter-group">
                <label>Pesquisa</label>
                <input type="text" name="search" value="{{ $params['search'] }}" class="form-control">
            </div>
            <div class="filter-group">
                <label>Status</label>
                @if($showStatus)
                    <select name="status" class="form-control">
                        @foreach($showStatus as $key=> $value)
                            <option @if($params['status'] == $key) selected @endif
                            value="{{ $key }}"> {{ $value }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <span class="filter-icon"><i class="fa fa-filter"></i></span>
        </div>
    </div>
</form>