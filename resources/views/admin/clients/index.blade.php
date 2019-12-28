@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li>{{ __('Clientes') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            @can('admin.clients.create')
                <a href="{{ route('admin.clients.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Cadastrar Cliente') }}</a>
            @endcan
        </div>
    </div>
@endsection
@section('content')

    @if($rows->count())
        <div class="accordion" id="accordionExample">
            <div class="row">
                @foreach($rows as $row)
                    <div class="card m-2">
                        <div class="card-header">{{ $row->name }}</div>
                        <div class="card-body">
                            <p class="card-text">
                            <hr>
                            {{ $row->description }}</p>
                            @can('admin.clients.edit')
                                <a class="btn btn-primary btn-rounded" href="{{ route('admin.clients.edit',$row->id) }}">{{ __('Editar Cliente') }}</a>
                            @endcan
                            @can('admin.clients.show')
                                <a class="btn btn-primary btn-rounded" href="{{ route('admin.clients.show',$row->id) }}">{{ __('Excluir Cliente') }}</a>
                            @endcan
                            <a class="btn btn-outline-{{ check_status($row->status) }} btn-rounded">{{ check_status_text($row->status) }}</a>
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
                       'url' =>route('admin.clients.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
