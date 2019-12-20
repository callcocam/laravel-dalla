@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li>{{ __('Dashboard') }}</li>
        </ul>
    </div>
@endsection
@section('content')

@endsection

