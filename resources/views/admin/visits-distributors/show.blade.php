@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.events-next.index') }}">{{ __('Visita') }}</a></li>
            <li>{{ __('Visita') }} - {{ $rows->client->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="card">
                <div class="card-header"><h3>{{ $rows->client->name }}</h3></div>
                <div class="card-body">
                    <!-- begin::widget-stats-1 -->
                    <div class="ul-widget1">
                        @if($rows->author())
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Usuário:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->author()->name !!}</span>
                            </div>
                        </div>
                        @endif
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Responsavel:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->resbonsible !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Data da visita:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! date_carbom_format($rows->date_visit)->format('d/m/Y') !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Quantidade de chopeiras do distribuidor:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->quantity_of_distributor_draft_beer !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Quantidade de chopeiras da Dalla Carvejaria:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->quantity_of_matriz_draft_beer !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Quantidade de barris do distribuidor:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->number_of_distributor_barrels !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Quantidade de barris da Dalla Cervejaria:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->number_of_matriz_barrels !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Cidades que atende na região:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->cities_serving_region !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('De que forma atende em cada cidade:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->meet_each_city !!}</span>
                            </div>
                        </div>

                        @include('admin.visits-distributors.beers-score',[
                        'title'=>'02 - AVALIAÇÃO GERAL DO ESTABELECIMENTO',
                        'index'=>'02',
                        'questions'=>['01','02','03','04','05','06','07','08','09','10']
                        ])


                        @include('admin.visits-distributors.beers-score',[
                        'title'=>'03 - CONDIÇÕES DA C MARA FRIA',
                        'index'=>'03',
                        'questions'=>['11','12','13']
                       ])


                        @include('admin.visits-distributors.beers-score',[
                        'title'=>'04 - DESEMPENHO DA DALLA CERVEJARIA COM O DISTRIBUIDOR',
                        'index'=>'04',
                        'questions'=>['14','15','16','17','18','19','20']
                       ])

                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Considerações Distribuidor:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->considerations_distributor !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Considerações Da Cervejaria:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->considerations_beer !!}</span>
                            </div>
                        </div>
                        <div class="ul-widget__item">
                            <div class="ul-widget__info">
                                <h3 class="ul-widget1__title">{{ __('Comparativo De crescimento:') }}</h3>
                                <span class="ul-widget__desc text-mute">{!! $rows->comparative_privious_year !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @if($rows->file)
                            @foreach($rows->file()->get() as $file)
                                <div class="col-lg-4 col-xl-4 mb-4">
                                    <div class="card o-hidden"><img class="d-block w-100" src="{{ url($file->fullPath) }}" alt="Second slide">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-success" href="{{ route('admin.visits-distributors.index') }}">{{ __('Vpltar P/ As Visitas') }}</a>
                    <a class="btn btn-warning" href="{{ route('admin.visits-distributors.edit', $rows->id) }}">{{ __('Editar Visita') }}</a>
                    <a class="btn btn-primary" href="{{ route('admin.visits-distributors.edit', $rows->id) }}">{{ __('Imprimir') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
