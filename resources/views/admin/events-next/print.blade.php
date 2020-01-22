
<div id="print-area">
    <h1 style="width: 100%; text-align: center">{{ $rows->name }}</h1>
    @if($rows->client)
        <h3 style="width: 100%; text-align: center">{{ $rows->client->name }}, {{ $rows->client->document }},
            {{ $rows->client->phone }}</h3>
        <div  style="width: 100%; text-align: left">Contato:{{ $rows->contractor }}</div>
        <div  style="width: 100%; text-align: left">Local:{{ $rows->local }}</div>
    @endif
    <p style="width: 100%; text-align: left">
        @if($rows->description)
            {!! $rows->description !!}
        @endif
        @if($rows->observations)
            {!! $rows->observations !!}
        @endif
    </p>
    CHECKLIST
    <hr>
    @if($rows->task->count())
        @foreach($rows->task as $row)
            <div class="item">
                <div class="border pt-3 pr-3 pl-3 pb-1">
                    <div class="row">
                        <div class="col-md-12">
                            {{ $row->task->name }}: <b>{{ $row->name }}</b><br/>
                            Descrição: <b>{{ $row->description }}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <label class="form-group">
                                {{ $row->observations }}
                            </label>

                        </div>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    @endif
</div>