@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.events-next.index') }}">{{ __('Eventos') }}</a></li>
            <li>{{ __('Tarefas') }}</li>
        </ul>
    </div>
@endsection
@section('content')
@if($rows)
    @foreach($rows->task as $row)
        <form action="{{ route("admin.tasks-next.update", $row->event_id) }}" method="post">
            @csrf
            <input type="hidden" value="{{ $row->id }}" name="{{ $row->task->slug }}[id]">
            <input type="hidden" value="{{ $row->name }}" name="{{ $row->task->slug }}[name]">
            <input type="hidden" value="{{ $row->task_id }}" name="{{ $row->task->slug }}[task_id]">
            <input type="hidden" value="{{ $user->id }}" name="{{ $row->task->slug }}[updated_by]">
            <div class="item">
                <div class="border pt-3 pr-3 pl-3 pb-1">
                    <div class="row">
                        <div class="col-md-5">
                            {{ $row->task->name }}: <b>{{ $row->name }}</b><br/>
                            Descrição: <b>{{ $row->description }}</b>

                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="radio radio-outline-danger">
                                    <input @if($row->status == "draft") checked @endif type="radio" value="draft" name="{{ $row->task->slug }}[status]"><span>A FAZER</span><span class="checkmark"></span>
                                </label>
                                <label class="radio radio-outline-success">
                                    <input @if($row->status == "published") checked @endif type="radio" value="published" name="{{ $row->task->slug }}[status]"><span>FEITO</span><span class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <textarea class="form-control" name="{{ $row->task->slug }}[observations]" rows="3" placeholder="Informações adicionais">{{ $row->observations }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endif

@endsection

@include("admin.includes.alert")

@push("scripts")
    <script>
        $(function () {
            $('form').change(function (e) {
                window.axios.post($(this).attr('action'), $(this).serialize()).then(respone=>{
                   // window.location.reload()
                })
            })
        })
    </script>
@endpush
