@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.orders.index') }}">{{ __('Pedidos') }}</a></li>
            <li>{{ __('Visualizar Pedido') }} - {{ $rows->client->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-sm-flex mb-5" data-view="print"><span class="m-auto"></span>
                <a target="_blank" href="{{ route('admin.orders.print', $rows->id) }}" class="btn btn-primary mb-sm-0 mb-3 print-invoice">Imprimir Pedido</a>
            </div>
            <!-- -===== Print Area =======-->
            <div id="print-area">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Informações do pedido</h4>
                        <p>#{{ $rows->number }}</p>
                    </div>
                    <div class="col-md-6 text-sm-right">
                        <p><strong>Situação: </strong>{{ check_status_text($rows->status,['not-accepted'=>'Não aceito','open'=>'Aberto','transit'=>'Em transito','completed'=>'Completo']) }}</p>
                     </div>
                </div>
                <div class="mt-3 mb-4 border-top"></div>
                <div class="row mb-5">
                    <div class="col-md-12 mb-3 mb-sm-0">
                        <h5 class="font-weight-bold">Infromações do cliente</h5>
                        <p>{{ $rows->client->name }}</p><span >
                             @if($rows->client->address)
                                @if($rows->client->address->city)
                                    {{ $rows->client->address->city }},
                                @endif
                                @if($rows->client->address->state)
                                     {{ $rows->client->address->state }},
                                @endif
                                @if($rows->client->address->zip)
                                   {{ $rows->client->address->zip }},
                                @endif
                                @if($rows->client->address->street)
                                    {{ $rows->client->address->street }},
                                @endif
                                @if($rows->client->address->number)
                                    {{ $rows->client->address->number }},
                                @endif
                                @if($rows->client->address->district)
                                    {{ $rows->client->address->district }},
                                @endif
                                @if($rows->client->address->complement)
                                   {{ $rows->client->address->complement }}
                                @endif
                            @endif
                        </span>
                    </div>
                    <div class="col-md-12 text-sm-right">
                        <p>Observações:</p><span style="white-space: pre-line">
                                                    {!! $rows->description !!}
                                                </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover mb-4">
                            <thead class="bg-gray-300">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Nome Do Produto') }}</th>
                                <th scope="col">{{ __('Quantidade') }}</th>
                                <th scope="col">{{ __('Valor Unit.') }}</th>
                                <th scope="col">{{ __('Total') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($rows->items()->get() as $item)
                                <tr>
                                    <th scope="row">{{ str_pad($item->id,5, '0', STR_PAD_LEFT) }}</th>
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ form_read($item->price) }}</td>
                                    <td>{{ form_read($item->total) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="5">Não a items para o pedido corrente</th>
                                </tr>
                            @endforelse


                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="invoice-summary invoice-summary-input float-right">
                            <p>{{ __('Sub Total') }}: <span>{{ form_read($rows->price) }}</span></p>
                            @if($rows->discount)
                                <p class="d-flex align-items-center">{{ __('Desconto') }}:<span>{{ form_read($rows->discount) }}</span></p>
                            @endif
                            <h5 class="font-weight-bold d-flex align-items-center">{{ __('Valor Total') }}:<span>{{ form_read($rows->total) }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

