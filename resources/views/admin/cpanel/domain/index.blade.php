@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('Domains') }}</li>
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
                    <li><form action="{{ route('admin.domain.show') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{$result->main_domain}}" name="domain">
                            <label for="">{{ $result->main_domain }}</label>
                            <button type="submit" class="btn btn-dark btn-sm">Detalhes</button>
                        </form>
                    </li>
                </ol>

                <label for=""><strong>Addon Domains</strong></label>
                <ol>
                    @foreach($result->addon_domains as $domain)
                        <li><form action="{{ route('admin.domain.show') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $domain }}" name="domain">
                                <label for="">{{ $domain }}</label>
                                <button type="submit" class="btn btn-dark btn-sm">Detalhes</button>
                            </form></li>
                    @endforeach
                </ol>

                <label for=""><strong>Parked Domains</strong></label>
                <ol>
                    @foreach($result->parked_domains as $domain)
                        <li><form action="{{ route('admin.domain.show') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $domain }}" name="domain">
                                <label for="">{{ $domain }}</label>
                                <button type="submit" class="btn btn-dark btn-sm">Detalhes</button>
                            </form></li>
                    @endforeach
                </ol>

                <label for=""><strong>Sub Domains</strong></label>
                <ol>
                    @foreach($result->sub_domains as $domain)
                        <li><form action="{{ route('admin.domain.show') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $domain }}" name="domain">
                                <label for="">{{ $domain }}</label>
                                <button type="submit" class="btn btn-dark btn-sm">Detalhes</button>
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
                <form action="{{ route('admin.domain.add') }}" method="post">
                    @csrf
                    <label for="">Sub domain name</label>
                    <input type="text" name="domain" placeholder="mycpanel" class="form-control" style="border-radius: 0px;"><br>

                    <label for="">Root domain</label>
                    <input type="text" name="root" placeholder="myphpnotes.tk" class="form-control" style="border-radius: 0px;"><br>

                    <label for="">Directory</label>
                    <input type="text" name="dir" placeholder="/public_html/" class="form-control" style="border-radius: 0px;"><br>

                    <button type="submit" class="btn btn-md btn-primary btn-block" style="border-radius: 0px;">Adicionar Sub dominio</button>
                </form>
            </div>
@endsection
