@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('admin.permissions.index') }}">{{ __('Permissions') }}</a></li>
            <li>{{ __('Create') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['route'=>['admin.permissions.store'],"method"=>"post"]) }}
            @csrf
            {{ Form::hidden('slug', null) }}
            {{ Form::hidden('template', true) }}
            <div class="form-group row">
            @if($permissions)
                {{ Form::bsPermission($permissions, old('name'), "Name") }}
            @else
                {{ Form::bsText('name', old('name'), "Name") }}
            @endif
            </div>
            <div class="form-group row">
                {{Form::bsRadio('status', [
                     'published'=>'Published',
                     'draft'=>'Draft',
                ], old('status'))}}
            </div>
            <hr>
            <div class="form-group row">
                {{ Form::bsTextArea('description', old('description'),'Description') }}
            </div>
            <div class="ln_solid"></div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-6 offset-md-3">

                    {{ Form::submit(__('Create Category'), [
                        'class'=>'btn btn-success btn-block'
                    ]) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection


