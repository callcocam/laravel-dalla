@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li>{{ __('Usuários') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            @can('admin.users.create')
            <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Cadastrar Usuário') }}</a>
            @endcan
        </div>
    </div>
@endsection
@section('content')

    @if($rows->count())
        <div class="accordion" id="accordionExample">
            <div class="row">
                @foreach($rows as $row)
                    <div class="card m-2">
                        <div class="card-header">{{ $row->name }}</div>
                        <div class="card-body">
                            <p class="card-text">
                            <div class="card ul-card__border-radius">
                                <div class="card-header">
                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
                                        <a  class="text-default collapsed" data-toggle="collapse"  href="#accordion-item-{{$row->id}}">
                                            <span><i class="i-Lock-User ul-accordion__font"> </i></span> {{ __("Listar Papéis") }}
                                        </a>
                                    </h6>
                                </div>
                                @if($row->permissions)
                                    <div class="collapse" id="accordion-item-{{$row->id}}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table text-center" id="user_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">{{ __('Nome') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($row->roles as $role)
                                                        <tr>
                                                            <td>{{ $role->name }}</td>
                                                        </tr>
                                                   @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <hr>
                            {{ $row->description }}</p>
                            @can('admin.users.edit')
                                <a class="btn btn-primary btn-rounded" href="{{ route('admin.users.edit',$row->id) }}">{{ __('Editar Usuário') }}</a>
                            @endcan
                            @can('admin.users.show')
                                <a class="btn btn-primary btn-rounded" href="{{ route('admin.users.show',$row->id) }}">{{ __('Excluir Usuário') }}</a>
                            @endcan
                            <a class="btn btn-outline-{{ check_status($row->status) }} btn-rounded">{{  check_status_text($row->status) }}</a>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $rows->render() }}
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                @include("admin.includes.empty", [
                       'url' =>route('admin.users.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
