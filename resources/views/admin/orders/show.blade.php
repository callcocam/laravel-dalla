@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.orders.index', request()->query()) }}">{{ __('Ordem De Serviço') }}</a></li>
            <li>{{ __('Visualizar') }} - {{ str_pad($rows->codigo, 5, '0', STR_PAD_LEFT) }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">{{ __('Ordem De Serviço') }} - {{ str_pad($rows->codigo, 5, '0', STR_PAD_LEFT) }}</div>

                    @include('admin.orders.stages.stage')


                </div>
            </div>
        </div>
    </div>
@endsection

