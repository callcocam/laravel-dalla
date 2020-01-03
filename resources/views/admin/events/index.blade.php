@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li>{{ __('Events') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            @can('admin.events.create')
                <a href="{{ route('admin.events.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Create Event') }}</a>
            @endcan
        </div>
    </div>
@endsection
@section('content')

    @if($rows->count())
        <div class="accordion" id="accordionExample">
            <div class="row">
                @foreach($rows as $row)

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="card mt-4 mb-4">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6>Data: {{ date_carbom_format($row->start_event)->format('d/m/Y') }}</h6>
                                        <p class="ul-task-manager__paragraph mb-3">{{ $row->name }}</p>
                                         <a href="{{ route('admin.tasks.index',$row->id) }}"><i class="ul-task-manager__fonts i-Add"></i> Adicionar tarefas</a>
                                        <a class="btn btn-icon bg-transparent border-slate-300 text-slate rounded-round border-dashed" href=""><i class="icon-plus2"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                @can('admin.events.edit')
                                    <a class="btn btn-primary btn-rounded" href="{{ route('admin.events.edit',$row->id) }}">{{ __('Editar Evento') }}</a>
                                @endcan
                                    <a class="btn btn-outline-{{ check_status($row->status) }} btn-rounded">{{  check_status_text($row->status) }}</a>
                                @can('admin.events.show')
                                    <a class="btn btn-danger btn-rounded" href="{{ route('admin.events.show',$row->id) }}">{{ __('Excluir Evento') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>

            @endforeach
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $rows->render() }}
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                @include("admin.includes.empty", [
                       'url' =>route('admin.events.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
