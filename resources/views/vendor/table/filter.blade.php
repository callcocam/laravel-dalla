<form class="table-filter">
    <div class="row">
        <div class="col-sm-3">
            <input type="hidden" name="start" id="start">
            <input type="hidden" name="end" id="end">
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
                    <span>registros de ( {{ $params['total'] }} )</span>
                </div>
            @endif
        </div>
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            <div class="filter-group">
                <input type="text" name="search" value="{{ $params['search'] }}" class="form-control">
            </div>
            <div class="filter-group">
                @if($showStatus)
                    <select name="status" class="form-control">
                        @foreach($showStatus as $key=> $value)
                            <option @if($params['status'] == $key) selected @endif
                            value="{{ $key }}"> {{ $value }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <div class="filter-group">

                <div class="input-group">
                    <input type="text" id="demo" value="" class="form-control" readonly aria-describedby="demo">
                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i> </span></div>
                </div>
            </div>
            <span class="filter-icon"><i class="fa fa-filter"></i></span>
        </div>
    </div>
</form>
@push("scripts")

    <script>
        $(function() {
            $('#demo').daterangepicker({
                "showWeekNumbers": true,
                locale: { cancelLabel: 'Limpar',applyLabel: 'Aplicar',customRangeLabel: 'Personalizado' },
                ranges: {
                    'Hoje': [moment(), moment()],
                    'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Últimos 7 dias': [moment().subtract(6, 'days'), moment()],
                    'Últimos 30 dias': [moment().subtract(29, 'days'), moment()],
                    'Este mês': [moment().startOf('month'), moment().endOf('month')],
                    'Mês passado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                "startDate": "{{ date_carbom_format($params['start'])->format('d/m/Y') }}",
                "endDate": "{{ date_carbom_format($params['end'])->format('d/m/Y') }}",
                "opens": "left"
            }, function(start, end, label) {
                $("#start").val(start.format('YYYY-MM-DD'))
                $("#end").val(end.format('YYYY-MM-DD'))
             }).on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $("#start").val('')
                $("#end").val('')
            });
        });
    </script>
@endpush