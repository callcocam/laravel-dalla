@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.events-last.index') }}">{{ __('Eventos') }}</a></li>
            <li>{{ __('Tarefas') }}</li>
        </ul>
    </div>
@endsection
@section('content')

@endsection

@include("admin.includes.alert")
