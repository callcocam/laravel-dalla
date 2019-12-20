@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('Databases') }}</li>
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

        <ol>
            @foreach($result as $domain)
                <li><form action="{{ route('admin.database.delete') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $domain->db }}" name="database">
                        <label for="">{{ $domain->db }} ({{ $domain->sizemeg}} MB) - {{$domain->usercount}} users</label>

                    </form></li>
            @endforeach
        </ol>
        <hr>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form action="{{ route('admin.database.add') }}" method="post">
            @csrf
            <label for="">Database Name (with Prefix)</label>
            <input type="text" class="form-control" name="database_name" placeholder="prefix_database" style="border-radius: 0px;"><br>
            <button type="submit" class="btn btn-primary btn-block btn-md" style="border-radius: 0px;">Add Database</button>
        </form>
    </div>

@endsection
