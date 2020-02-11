    <div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-4">
                <h2>{{ $options['title'] }}</h2>
            </div>
            <div class="col-sm-8">
                @if($options['endpoint'])
                    <a href="{{ route(sprintf("admin.%s.index", $options['endpoint'])) }}" class="btn btn-warning"><i class="fas fa-sync"></i> <span>Recaregar</span></a>
                    <a href="{{ route(sprintf("admin.%s.create", $options['endpoint'])) }}" class="btn btn-success"><i class="fas fa-plus"></i> <span>Adicionar</span></a>
                @endif
            </div>
        </div>
    </div>
    @include('vendor.table.filter', $options)
    <table class="table table-sm table-hover">
        @if($headers)
            <thead>
            @foreach($headers as $header)
                @if($header['hidden_list'])
                    <th scope="col" >
                        @if($header['sorter'])
                            <a href="{{ set_header_order($params,$options,$header) }}">{{ __($header['label']) }}
                                @if(strtoupper($params['order']) == "DESC")
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                @else
                                    <i class="fas fa-sort-amount-down-alt"></i>
                                @endif
                            </a>
                        @else
                            {{ __($header['label']) }}
                        @endif
                    </th>
                @endif
            @endforeach
            </thead>
        @endif
        @if($rows)
            <tbody>
            @foreach($rows as $row)
                <tr>
                    @foreach($headers as $key => $header)
                        @if($header['hidden_list'])
                            <td   @if($header['width']) style="width: {{$header['width']}}" @endif>
                                @if($header['format'] == 'cover')
                                    <img src="{{ $row[$header['key']] }}" alt="{{$header['key']}}">
                                @elseif($header['format'] == 'actions')
                                    @include('vendor.table.actions',$row[$header['key']])
                                @elseif($header['format'] == 'html')
                                    {!! $row[$header['key']] !!}
                                @else
                                    @if(is_array($row[$header['key']]))
                                        @dd($row[$header['key']])
                                    @else
                                        {{ $row[$header['key']] }}
                                    @endif
                                @endif
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        @endif
        @if($data)
            <tfoot>
            <tr class="text-center">
                <td colspan="{{ count($headers) }}">{!! $data->appends($params)->render() !!}</td>
            </tr>
            </tfoot>
        @endif
    </table>
</div>
