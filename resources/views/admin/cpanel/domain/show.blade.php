@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('admin.domain.list') }}">{{ __('Damains') }}</a></li>
            <li>{{ __('Domain') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="x_title">
        <h2>Plain Page</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @isset($result->type)
            <label for=""><strong>Type</strong></label><br>
            <label for="">{{ $result->type}}</label>
            <hr>
        @endisset
        @isset($result->ip)
            <label for=""><strong>Internet Protocol</strong></label><br>
            <label for="">{{ $result->ip}}</label>
            <hr>
        @endisset
        @isset($result->port)
            <label for=""><strong>Port</strong></label><br>
            <label for="">{{ $result->port}}</label>
            <hr>
        @endisset
        @isset($result->documentroot)
            <label for=""><strong>Document Root</strong></label><br>
            <label for="">{{ $result->documentroot}}</label>
            <hr>
        @endisset
        @isset($result->type)
            <label for=""><strong>Domain</strong></label><br>
            <label for="">{{ $result->domain}}</label>
            <hr>
        @endisset
        @isset($result->user)
            <label for=""><strong>User</strong></label><br>
            <label for="">{{ $result->user}}</label>
            <hr>
        @endisset
        @isset($result->servername)
            <label for=""><strong>Server Name</strong></label><br>
            <label for="">{{ $result->servername}}</label>
            <hr>
        @endisset
        @isset($result->owner)
            <label for=""><strong>Owner</strong></label><br>
            <label for="">{{ $result->owner}}</label>
            <hr>
        @endisset
        @isset($result->homedir)
            <label for=""><strong>Home Directory</strong></label><br>
            <label for="">{{ $result->homedir}}</label>
            <hr>
        @endisset
        @isset($result->phpversion)
            <label for=""><strong>PHP Version</strong></label><br>
            <label for="">{{ $result->phpversion}}</label>
            <hr>
        @endisset
        @isset($result->serveralias)
            <label for=""><strong>Server Alias</strong></label><br>
            <label for="">{{ $result->serveralias}}</label>
            <hr>
        @endisset
        @isset($result->serveradmin)
            <label for=""><strong>Server Administrator</strong></label><br>
            <label for="">{{ $result->serveradmin}}</label>
        @endisset
    </div>
@endsection
