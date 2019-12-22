@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('Events') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            <a href="{{ route('admin.events.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Create Event') }}</a>
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
                            @if($row->tasks)
                            <div class="card ul-card__border-radius">
                                <div class="card-header">
                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
                                        <a  class="text-default collapsed" data-toggle="collapse"  href="#accordion-item-{{$row->id}}">
                                            <span><i class="i-Lock-User ul-accordion__font"> </i></span> {{ __("Listar Tarefas") }}
                                        </a>
                                    </h6>
                                </div>

                                    <div class="collapse" id="accordion-item-{{$row->id}}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table text-center" id="user_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">{{ __('Rascunho') }}</th>
                                                    <th scope="col">{{ __('Publicado') }}</th>
                                                    <th scope="col">{{ __('Completo') }}</th>
                                                    <th scope="col">{{ __('Atualizar') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($row->tasks() as $tasks)
                                                    <tr>
                                                        <td>
                                                            <label class="radio radio-primary">
                                                                <input type="radio" name="status" value="1"><span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="radio radio-primary">
                                                                <input type="radio" name="status" value="2"><span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="radio radio-primary">
                                                                <input type="radio" name="status" value="3"><span class="checkmark"></span>
                                                            </label>
                                                        </td>
                                                        <td class="col-md-2 mt-3 mt-md-0">
                                                            <button class="btn btn-primary btn-block">{{ $tasks->name }}</button>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                    </div>
                            </div>

                        </div>
                            @endif
                        <hr>
                        {{ $row->description }}</p>
                        <a class="btn btn-primary btn-rounded" href="{{ route('admin.events.edit',$row->id) }}">{{ __('Editar Evento') }}</a>
                        <a class="btn btn-primary btn-rounded" href="{{ route('admin.events.show',$row->id) }}">{{ __('Excluir Evento') }}</a>
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
                       'url' =>route('admin.events.create')
                   ])
            </div>
        </div>

    @endif

@endsection

@include("admin.includes.alert")
