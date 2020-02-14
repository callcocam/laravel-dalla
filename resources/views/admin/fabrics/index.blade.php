@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.fabrics.index', request()->all()) }}">{{ __('Painel') }}</a></li>
            <li>{{ __('Estoque Tecido') }}</li>
        </ul>
    </div>
@endsection
@section('content')

    @if($rows)
        {!! $rows !!}
    @else
        <div class="row">
            <div class="col-12">
                @include("admin.includes.empty", [
                       'url' =>route('admin.fabrics.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
