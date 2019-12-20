@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('admin.posts.index') }}">{{ __('Post') }}</a></li>
            <li>{{ $rows->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card user-profile o-hidden mb-4">
        <div class="header-cover m-3" style="background-image: url({{ asset($rows->cover) }});background-size: contain;background-position: top;"></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::open(['route'=>['admin.posts.store'],"method"=>"post"]) }}
                    @csrf
                    {{ Form::hidden('id', $rows->id) }}
                    {{ Form::hidden('slug', $rows->slug) }}
                    <div class="form-group row">
                        {{ Form::bsText('name', old('name',$rows->name), "Name") }}
                    </div>
                    <div class="form-group row">
                        {{ Form::bsAvatar('avatar', $user->avatar,'Select Cover') }}
                    </div>
                    <div class="form-group row">
                        {{ Form::bsCategory(old('category',$rows->category()),"Select Category") }}
                    </div>
                    <div class="form-group row">
                        {{ Form::bsVideo(old('video',$rows->video()),"Select Video") }}
                    </div>
                    <div class="form-group row">
                        {{Form::bsRadio('status', [
                             'published'=>'Published',
                             'draft'=>'Draft',
                        ], old('status',$rows->status))}}
                    </div>
                    <hr>
                    <div class="form-group row">
                        {{ Form::bsTextArea('description', old('description',$rows->description),'Description') }}
                    </div>
                    <div class="form-group row">
                        {{ Form::bsTag('tags', old('tag', $rows->tagged),'Tags') }}
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 offset-md-3">

                            {{ Form::submit(__('Edit Post'), [
                                'class'=>'btn btn-success btn-block'
                            ]) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'} );
    </script>
@endpush
