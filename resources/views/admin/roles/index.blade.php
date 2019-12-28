@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li>{{ __('Roles') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            @can('admin.roles.create')
                <a href="{{ route('admin.roles.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Cadastrar Papel') }}</a>
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
                                            <span><i class="i-Lock-User ul-accordion__font"> </i></span> {{ __("Listar Permissões") }}
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
                                                   @foreach($row->permissions as $permission)
                                                        <tr>
                                                            <td>{{ $permission->name }}</td>
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
                            @can('admin.roles.edit')
                                <a class="btn btn-primary btn-rounded" href="{{ route('admin.roles.edit',$row->id) }}">{{ __('Editar Papél') }}</a>
                            @endcan
                        @can('admin.roles.show')
                                <a class="btn btn-primary btn-rounded" href="{{ route('admin.roles.show',$row->id) }}">{{ __('Excluir Papél') }}</a>
                            @endcan
                            <a class="btn btn-outline-{{ check_status($row->status) }} btn-rounded">{{ $row->status }}</a>
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
                       'url' =>route('admin.roles.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
