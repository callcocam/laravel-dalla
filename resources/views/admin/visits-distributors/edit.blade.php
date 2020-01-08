@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.visits-distributors.index') }}">{{ __('Visitas') }}</a></li>
            <li>{{ $rows->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-md-12">
             {!! form($form) !!}
            {{--<div class="col-md-9 col-sm-9 offset-md-3"  style="position: relative">
                <btn-fixed-component>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Salvar Dados') }} </button>
                </btn-fixed-component>
            </div>--}}
        </div>
    </div>

@endsection


