@extends('layouts.admin')

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
        <label for=""><strong>Addon Domains</strong></label>
        <ol>
            @foreach($result as $domain)
                <li><form action="{{ route('admin.email.delete') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $domain->email }}" name="email">
                        <label for="">{{ $domain->email }}</label>
                        <button type="submit" class="btn btn-dark btn-sm">Delete</button>
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
        <form action="{{ route('admin.email.add') }}" method="post">
            @csrf
            <label for="">Username</label>
            <input type="text" name="name" placeholder="adnan" class="form-control" style="border-radius: 0px;"><br>

            <label for="">Domain</label>
            <input type="text" name="domain" placeholder="myphpnotes.tk" class="form-control" style="border-radius: 0px;"><br>

            <label for="">Password</label>
            <input type="password" name="pass" class="form-control" style="border-radius: 0px;"><br>

            <label for="">Quota (MB)</label>
            <input type="text" name="quota" placeholder="0 for unlimited" class="form-control" style="border-radius: 0px;" value="0"><br>

            <button type="submit" class="btn btn-block btn-primary btn-md" style="border-radius: 0px;">Add Email Account</button>
        </form>
    </div>
@endsection
