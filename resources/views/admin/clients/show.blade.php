@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.clients.index') }}">{{ __('Clientes') }}</a></li>
            <li>{{ __('Visualizar Cliente') }} - {{ $rows->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">

       <div class="col-12">
           <div class="card mb-4">
               <div class="card-header">{{ $rows->name }}</div>
               <div class="card-body">
                   @if(!$user->hasAnyRole('cliente'))
                       @if($rows->bonification)
                           <div class="ul-widget__item">
                               <div class="ul-widget__info">
                                   <h3 class="ul-widget1__title">{{ __('Esse cliente tem uma bonificação:') }}</h3>
                                   @foreach($rows->bonification as $bonification)
                                       <span class="ul-widget__desc text-mute">
                               {{ $bonification->bonusId($bonification)->name }},  {{ $bonification->bonusId($bonification)->description }}
                           </span><a href="{{ route('admin.bonificacoes.application', $bonification->id) }}">Aplicar bonificação</a> <br>
                                   @endforeach
                               </div>
                           </div>
                       @endif
                   @endif
                   <div class="ul-widget__item">
                       <div class="ul-widget__info">
                           <h3 class="ul-widget1__title">{{ __('Nome:') }}</h3>
                           <span class="ul-widget__desc text-mute">{{ $rows->name }}</span>
                       </div>
                   </div>
                   @if($rows->fantasy)
                       <div class="ul-widget__item">
                           <div class="ul-widget__info">
                               <h3 class="ul-widget1__title">{{ __('Nome Fantasia:') }}</h3>
                               <span class="ul-widget__desc text-mute">{{ $rows->fantasy }}</span>
                           </div>
                       </div>
                   @endif
                   <div class="ul-widget__item">
                       <div class="ul-widget__info">
                           <h3 class="ul-widget1__title">{{ __('Email:') }}</h3>
                           <span class="ul-widget__desc text-mute">{{  $rows->email }}</span>
                       </div>
                   </div>
                   <div class="ul-widget__item">
                       <div class="ul-widget__info">
                           <h3 class="ul-widget1__title">{{ __('Telefone:') }}</h3>
                           <span class="ul-widget__desc text-mute">{{ $rows->phone }}</span>
                       </div>
                   </div>
                   <div class="ul-widget__item">
                       <div class="ul-widget__info">
                           <h3 class="ul-widget1__title">{{ __('Documento(CPF ou CNPJ):') }}</h3>
                           <span class="ul-widget__desc text-mute">{{ $rows->document }}</span>
                       </div>
                   </div>
                   <br>
                   @if($rows->address)
                        <div class="ul-widget__item">
                           <div class="ul-widget__info">
                               <h3 class="ul-widget1__title">{{ __('ENDEREÇO:') }}</h3>
                               @if($rows->address->city)
                                   {{ $rows->address->city }},
                               @endif
                               @if($rows->address->state)
                                   {{ $rows->address->state }},
                               @endif
                               @if($rows->address->zip)
                                   {{ $rows->address->zip }},
                               @endif
                               @if($rows->address->street)
                                   {{ $rows->address->street }},
                               @endif
                               @if($rows->address->number)
                                   {{ $rows->address->number }},
                               @endif
                               @if($rows->address->district)
                                   {{ $rows->address->district }},
                               @endif
                               @if($rows->address->complement)
                                   {{ $rows->address->complement }}
                               @endif
                           </div>
                       </div>
                   @endif
                 <br>
                 <br>
                   <div class="card-body">
                       <div class="card-title">{{ __("Últimos produto adquiridos") }}</div>
                       @if($rows->orders)
                           @foreach($rows->orders as $order)
                               @can('view', $order)
                                   @foreach($order->items as $item)
                                       <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-3"><img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="{{ asset($item->products->cover) }}" alt="{{ $item->products->name }}">
                                           <div class="flex-grow-1">
                                               <h5><a href="{{ route('admin.products.show', $item->products->id) }}">{{ $item->products->name }}</a></h5>
                                               <p class="m-0 text-small text-muted">{{ __('Quantidade') }}: {{ str_pad((int)$item->amount, 5, '0', STR_PAD_LEFT) }}</p>
                                               <p class="text-small text-danger m-0"> R$ {{ form_read($item->products->price) }}</p>
                                           </div>
                                           <div>
                                               <a title="Ver detalhes do pedido" href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-primary mt-3 mb-3 m-sm-0 btn-rounded btn-sm">
                                                   {{ __('Ver Pedido') }}
                                               </a>
                                           </div>
                                       </div>
                                   @endforeach
                               @endcan
                           @endforeach
                       @endif
                   </div>
               </div>
           </div>
       </div>
    </div>
@endsection

