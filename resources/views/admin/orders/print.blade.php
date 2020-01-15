@extends('layouts.print')
@section('content')
    <div id="print-area">
        <div class="row">
            <div class="col-md-6">
                <h4 class="font-weight-bold">Informações do pedido</h4>
                <p>#{{ $rows->number }}</p>
            </div>
            <div class="col-md-6 text-sm-right">
                <p><strong>Situação: </strong>{{ check_status_text($rows->status,['not-accepted'=>'Não aceito','open'=>'Aberto','transit'=>'Em transito','completed'=>'Completo']) }}</p>
                <p><strong>Data da entrega: </strong>{{ date_carbom_format($rows->delivery_date)->format('d/m/Y') }}</p>
            </div>
        </div>
        <div class="mt-3 mb-4 border-top"></div>
        <div class="row mb-5">
            <div class="col-md-12 mb-3 mb-sm-0">
                <h5 class="font-weight-bold">Infromações do cliente</h5>
                <p>{{ $rows->client->name }}</p><span style="white-space: pre-line">
                            {{ $rows->client->address }}
                        </span>
            </div>
            <div class="col-md-12 text-sm-right">
                <p>Observações</p><span style="white-space: pre-line">
                                                    {!! $rows->description !!}
                                                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover mb-4">
                    <thead>
                    <tr>
                        <th scope="col" width="10">#</th>
                        <th scope="col">{{ __('Nome Do Produto') }}</th>
                        <th scope="col" width="10">{{ __('Quantidade') }}</th>
                        <th scope="col" width="15">{{ __('Valor Unit.') }}</th>
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

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="invoice-summary">
                    <p>{{ __('Sub Total') }}:</p> <span>{{ form_read($rows->price) }}</span>
                    @if($rows->discount)
                        <p>{{ __('Desconto') }}:</p><span>{{ form_read($rows->discount) }}</span>
                    @endif
                    <h5>{{ __('Valor Total') }}:</h5><span>{{ form_read($rows->total) }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection