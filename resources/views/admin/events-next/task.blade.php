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
    <div class="row mb-5">
        <div class="col-md-12">
            {!! form($form) !!}
        </div>
    </div>
@endsection

@include("admin.includes.alert")

@push("scripts")
    <script>
        $(function () {
            $('form').change(function () {

                window.axios.post($('form').attr('action'), $('form').serialize()).then(respone=>{
                    console.log(respone)
                })
            })
        })
    </script>
@endpush
