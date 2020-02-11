@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li>{{ __('Grades') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            @can('admin.grids.create')
                <a href="{{ route('admin.grids.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Cadastrar Grade') }}</a>
            @endcan
        </div>
    </div>
@endsection
@section('content')

    @if($rows)
        {!! $rows !!}
    @else
        <div class="row">
            <div class="col-12">
                @include("admin.includes.empty", [
                       'url' =>route('admin.grids.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
