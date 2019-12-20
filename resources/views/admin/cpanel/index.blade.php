@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('E-Mails Accounts') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header"><a href="/index.php">Meu cPanel</a></div>

        <div class="card-body">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <label for="">Domains</label>
            <a href="{{ route('cpanel.domain.list') }}" class="btn btn-block btn-success btn-md">List Domains</a>
            <a href="{{ route('cpanel.domain.show') }}" class="btn btn-block btn-success btn-md">Show Domain Data</a>
            <a href="{{ route('cpanel.domain.add') }}" class="btn btn-block btn-success btn-md">Add a sub domain</a>
            <hr>
            <label for="">Emails</label>
            <a href="{{ route('cpanel.email.list') }}" class="btn btn-block btn-primary btn-md">List Email Accounts</a>
            <a href="{{ route('cpanel.email.add') }}" class="btn btn-block btn-primary btn-md">Add an Email Account</a>
            <a href="{{ route('cpanel.email.delete') }}" class="btn btn-block btn-primary btn-md">Delete an Email Account</a>
            <hr>
            <label for="">Database</label>
            <a href="{{ route('cpanel.database.list') }}" class="btn btn-block btn-danger btn-md">List Databases</a>
            <a href="{{ route('cpanel.database.add') }}" class="btn btn-block btn-danger btn-md">Create Database</a>
            <a href="{{ route('cpanel.database.delete') }}" class="btn btn-block btn-danger btn-md">Delete Database</a>
        </div>
    </div>
@endsection

