@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('Permissions') }}</li>
        </ul>
        <div style="right: 2%;position: absolute;">
            <a href="{{ route('admin.permissions.create') }}" class="btn btn-success btn-rounded pull-right"><span class="icon i-Add-File"></span> {{ __('Create Permission') }}</a>
        </div>
    </div>
@endsection
@section('content')

        @if($rows->count())
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                         <div class="ul-widget__head v-margin">
                            <div class="ul-widget__head-label">
                                <h3 class="ul-widget__head-title">{{ __('List off Permissions') }}</h3>
                            </div>
                            <button class="btn bg-white _r_btn border-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="_dot _inline-dot bg-primary"></span>
                                <span class="_dot _inline-dot bg-primary"></span>
                                <span class="_dot _inline-dot bg-primary"></span>
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="{{ route('admin.permissions.create') }}">{{ __('Create Permission') }}</a>
                                <a class="dropdown-item" href="{{ route('admin.roles.index') }}">{{ __('List Roles') }}</a>
                                <a class="dropdown-item" href="{{ route('admin.roles.create') }}">{{ __('Create Role') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.permissions.index') }}">{{ __('Reload Permission') }}</a>
                            </div>
                        </div>
                        <div class="ul-widget-body">
                            <div class="ul-widget3">
                                <div class="">
                                    <table class="table">
                                        <thead>
                                        <tr class="ul-widget6__tr--sticky-th">
                                            <th scope="col">{{ __("Name") }}</th>
                                            <th scope="col">{{ __("Updated At") }}</th>
                                            <th scope="col">{{ __("Status") }}</th>
                                            <th scope="col">{{ __("Description") }}</th>
                                            <th scope="col">{{ __("Action") }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- start tr-->
                                        @foreach($rows as $row)
                                         <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->updated_at }}</td>
                                            <td>
                                                <span class="badge badge-pill badge-outline-{{ check_status($row->status) }} p-2 m-1">{{ $row->status }}</span>
                                            </td>
                                            <td>{{ $row->description }}</td>
                                            <td>
                                            <button class="btn bg-white _r_btn border-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="_dot _inline-dot bg-primary"></span>
                                                <span class="_dot _inline-dot bg-primary"></span>
                                                <span class="_dot _inline-dot bg-primary"></span>
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item ul-widget__link--font" href="{{ route('admin.permissions.edit',$row->id) }}"><i class="i-Edit"> </i> {{ __('Edit Permission') }}</a>
                                                <a class="dropdown-item ul-widget__link--font" href="{{ route('admin.permissions.show',$row->id) }}"><i class="i-File-Trash"> </i> {{ __('Delete Permission') }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- end tr-->
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation example">
                                    {{ $rows->render() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    @include("admin.includes.empty", [
                           'url' =>route('admin.permissions.create')
                       ])
                </div>
            </div>

        @endif

@endsection

@include("admin.includes.alert")
