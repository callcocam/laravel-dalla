@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li>{{ __('Pedidos') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            @can('admin.orders.create')
                <a href="{{ route('admin.orders.create') }}" class="btn btn-success btn-rounded btn-lg pull-right"><span class="icon i-Add-Cart"></span> {{ __('Cadastrar Pedido') }}</a>
            @endcan
        </div>
    </div>
@endsection
@section('content')

    @if($rows->count())
        <div id="task-manager-list">
            <!--  content area -->
            <div class="content">
                <!--  task manager table -->
                <div class="card" id="card">

                    <div class="card-body" id="card-body">
                        <div class="search ul-task-manager__search-inline">
                            <nav class="navbar">
                                <form class="form-inline">
                                    <input type="hidden" name="model" value="{{ \App\Model\Admin\Client::class }}">
                                    <input type="hidden" name="id" value="client_id">
                                    <label class="col-sm-2 col-form-label mr-2" for="search">Filtro:</label>
                                    <input name="search" class="form-control mr-sm-2" id="search" type="search" placeholder="Termo de busca" aria-label="Search">
                                </form>
                            </nav>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Data Entrega</th>
                                    <th scope="col" colspan="2">#</th>
                                </tr>
                                </thead>
                                <tbody id="names">
                                <!-- --------------------------- tr1 -------------------------------------------->
                                @foreach($rows as $row)
                                    @can('view', $row)
                                    <tr>
                                        <th scope="row">#{{ $row->number }}</th>
                                        <td class="collection-item">
                                            <div class="font-weight-bold"><a href="{{ route('admin.clients.show', $row->client->id) }}">{{ $row->client->name }}</a></div>
                                            <div class="text-muted">{{ $row->client->description }}</div>
                                        </td>
                                        <td class="custom-align">
                                            <span class="badge badge-pill badge-outline-{{ check_status($row->status,['not-accepted'=>'danger','open'=>'primary','transit'=>'warning','completed'=>'success']) }} p-2 m-1">{{ check_status_text($row->status,['not-accepted'=>'Não aceito','open'=>'Aberto','transit'=>'Em transito','completed'=>'Completo']) }}</span>
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar"><i class="i-Calendar-4"></i><span>{{ date_carbom_format($row->delivery_date)->format('d/m/Y') }}</span></div>
                                        </td>
                                        <td class="custom-align">
                                            @can('admin.orders.edit')
                                                <a class="btn btn-primary btn-rounded" href="{{ route('admin.orders.edit',$row->id) }}">{{ __('Editar Pedido') }}</a>
                                            @endcan
                                            @can('admin.orders.show')
                                                <a class="btn btn-warning btn-rounded" href="{{ route('admin.orders.show',$row->id) }}">{{ __('Ver Pedido') }}</a>
                                            @endcan
                                        </td>
                                        <td class="custom-align">
                                             @can('admin.orders.destroy')
                                                <btn-delete-component event="{{ sprintf("form-%s", $row->id) }}">
                                                    <form ref="form" action="{{ route('admin.orders.destroy',$row->id) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>
                                                </btn-delete-component>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endcan
                                @endforeach
                                <!--  end of table row 3 -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row align-items-center">
                            <div class="col">
                                {{ $rows->render() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!--  end of task manager table -->
            </div>
            <!--  end of content area -->
        </div>
    @else
        <div class="row">
            <div class="col-12">
                @include("admin.includes.empty", [
                       'url' =>route('admin.orders.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
