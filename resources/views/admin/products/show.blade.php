@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.products.index') }}">{{ __('Produtos') }}</a></li>
            <li>{{ __('Visualzar Produto') }} - {{ $rows->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <section class="ul-product-detail">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ul-product-detail__image"><img src="{{ asset($rows->cover) }}" alt="alt"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ul-product-detail__brand-name mb-4">
                                    <h5 class="heading">{{ $rows->name }}</h5><span class="text-mute">Estoque: {{ $rows->stock }}</span>
                                </div>
                                <div class="ul-product-detail__price-and-rating d-flex align-items-baseline">
                                    <h3 class="font-weight-700 text-primary mb-0 mr-2">R$ {{ form_read($rows->price) }}</h3>
                                </div>
                                <div class="ul-product-detail__features mt-3">
                                    <h6 class="font-weight-700">Descrição:</h6>
                                    {!! $rows->description !!}
                                </div>
                                <div class="ul-product-detail__quantity d-flex align-items-center mt-3">
                                    <a href="{{ route('admin.products.edit', $rows->id) }}" class="btn btn-primary m-1"><i class="fa fa-edit"></i> {{ __('Editar Produto') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="ul-product-detail__box">
            <div class="row">

                <div class="col-lg-6 col-md-6 mt-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="ul-product-detail__border-box">
                                <div class="ul-product-detail--icon mb-2"><i class="i-Reload text-danger text-25 font-weight-500"></i></div>
                                <h5 class="heading">Estoque</h5>
                                <p class="text-muted text-12">{{ $rows->stock }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="ul-product-detail__border-box">
                                <div class="ul-product-detail--icon mb-2"><i class="fa fa-shopping-cart text-success text-25 font-weight-500"></i></div>
                                <h5 class="heading">Vendidos</h5>
                                <p class="text-muted text-12">{{ $rows->countItems() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection

