@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('admin.permissions.index') }}">{{ __('Permissões') }}</a></li>
            <li>{{ $rows->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-md-12">
           {!! form($form) !!}
        </div>
    </div>
@endsection


