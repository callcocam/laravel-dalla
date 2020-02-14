@extends('layouts.admin')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Painel') }}</a></li>
            <li><a href="{{ route('admin.grids.index', request()->query()) }}">{{ __('Grades') }}</a></li>
            <li>{{ __('Visualizar Grade') }} - {{ $rows->name }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row">

       <div class="col-12">
           <div class="card mb-4">
               <div class="card-header">{{ $rows->name }}</div>
               <div class="card-body">

               </div>
           </div>
       </div>
    </div>
@endsection

