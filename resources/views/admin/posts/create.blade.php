@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('admin.posts.index') }}">{{ __('Posts') }}</a></li>
            <li>{{ __('Create') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['route'=>['admin.posts.store'],"method"=>"post"]) }}
            @csrf
            {{ Form::hidden('slug', null) }}
            <div class="form-group row">
                {{ Form::bsText('name', old('name'), "Name") }}
            </div>
            <div class="form-group row">
                {{ Form::bsCategory(old('category',null),"Select Category") }}
            </div>
            <div class="form-group row">
                {{ Form::bsVideo(old('video',null),"Select Video") }}
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
            <div class="form-group row">
                {{ Form::bsTag('tags', old('tags',null),'Tags') }}
            </div>
            <div class="ln_solid"></div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-6 offset-md-3">

                    {{ Form::submit(__('Create Post'), [
                        'class'=>'btn btn-success btn-block'
                    ]) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'} );
</script>
@endpush


