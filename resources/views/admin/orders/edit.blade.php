@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.orders.index') }}">{{ __('Pedidos') }}</a></li>
            <li>{{ __('Atualizar') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    @can('update', $rows)
        <div class="row mb-5">
            <div class="col-md-12">
                <!-- ==== Edit Area =====-->

                {!! form_start($form) !!}
                {!! form_row($form->number) !!}
                <div class="d-flex mb-5"><span class="m-auto"></span>
                    <button class="btn btn-success btn-lg"><i class="fa fa-save"></i> {{ __('Atualizar Pedido') }}</button>
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Informações do pedido</h4>
                        <div class="col-sm-4 form-group mb-3 pl-0">
                            <label for="orderNo">Número Do Pedido</label>
                            <span class="form-control">#{{ str_pad($rows->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <label class="d-block text-12 text-muted">{{ __('Situação do pedido') }}</label>
                        <div class="pr-0 mb-4">
                            {!! form_row($form->status) !!}
                        </div>

                    </div>
                </div>
                <div class="mt-3 mb-4 border-top"></div>
                <div class="row mb-5">

                    @if($user->hasAnyRole('cliente'))
                        <div class="col-md-12">
                            <h5 class="font-weight-bold">{{ __("Cliente") }}</h5>
                            {!! form_row($form->client_id) !!}
                            {!! form_row($form->client_name,['value' => $rows->client->name]) !!}
                        </div>
                    @else
                        <div class="col-md-12">
                            <h5 class="font-weight-bold">{{ __("Selecione um cliente") }}</h5>
                            {!! form_row($form->client_id) !!}
                        </div>
                    @endif
                    <div class="col-md-12">
                        {!! form_row($form->description) !!}
                    </div>
                </div>
                {!! form_end($form) !!}
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">

                                @include('admin.orders.items.new')

                                <div class="col-md-12 table-responsive">
                                    <table class="table table-hover mb-3">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('Nome Do Produto') }}</th>
                                            <th scope="col">{{ __('Quantidade') }}</th>
                                            <th scope="col">{{ __('Valor Unit.') }}</th>
                                            <th scope="col">{{ __('Total') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($rows->items()->get() as $item)
                                            @include('admin.orders.items.list', [
                                                'item'=>$item
                                            ])
                                        @empty

                                            <tr>
                                                <th scope="row" colspan="6">Não a items para o pedido corrente</th>
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
            </div>
        </div>

    @endcan
    @cannot('update', $rows)
        @include('admin.includes.not-authorized', [
                       'url' =>route('admin.orders.index')
                   ])
    @endcannot

@endsection

@can('update', $rows)
    @push("styles")
        <link href="{{ asset('/_dist/admin/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/_dist/admin/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    @endpush

    @push("scripts")
        <script src="{{ asset('/_dist/admin/js/select2.min.js') }}"></script>
        <script src="{{ asset('/_dist/admin/js/i18n/pt-BR.js') }}"></script>
        <script>
            $(function() {

                $(".delete-item").click(function (e) {

                    $($(this).data('id')).submit()

                })
                $(".update-item").click(function () {

                    $($(this).data('id')).submit()
                })
                /*$('.products').select2({
                    ajax: {
                        url: "{{ route('admin.products.find') }}",
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                theme: 'bootstrap4',
                language: "pt-BR",
                placeholder: "==Selecione Um produto==",

            });*/


            });
        </script>
    @endpush

@endcan
