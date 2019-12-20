@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('Profile') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card user-profile o-hidden mb-4">
        <div class="header-cover" style="background-image: url({{ asset('_dist/admin/images/photo-wide-4.jpg') }})"></div>
        <div class="user-info"><img class="profile-picture avatar-lg mb-2" src="{{ url($rows->avatar) }}" alt="" id="image_tag"/>
            <p class="m-0 text-24">{{ $rows->name }}</p>
            <p class="text-muted m-0">{{ $rows->email }}</p>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>
@endsection


