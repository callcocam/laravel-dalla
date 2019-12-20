@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('Posts') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Create Post') }}</a>
        </div>
    </div>
@endsection
@section('content')

    @if($rows->count())

        @foreach($rows as $row)
            <div class="row">
                <div class="card mb-4 col-12">
                    <div class="card-header">{{ $row->name }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $row->status }}</h5>
                        <p class="card-text">{!! $row->description !!}</p>
                        <a class="btn btn-primary btn-rounded" href="{{ route('admin.posts.edit',$row->id) }}">{{ __('Edit Post') }}</a>
                        <a class="btn btn-danger btn-rounded" href="{{ route('admin.posts.show',$row->id) }}">{{ __('Delete Post') }}</a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-12">
                {{ $rows->render() }}
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                @include("admin.includes.empty", [
                       'url' =>route('admin.posts.create')
                   ])
            </div>
        </div>

    @endif

@endsection


