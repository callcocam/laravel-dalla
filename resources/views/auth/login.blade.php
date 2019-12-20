@extends('layouts.auth')
@section('content')asdadasdas
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4"><img src="{{ asset('/_dist/admin/images/logo.png') }}" alt=""></div>
                        <h1 class="mb-3 text-18">{{ __('Sign In') }}</h1>
                        {!! form($form) !!}
                        <div class="mt-3 text-center"><a class="text-muted" href="{{ route('register') }}">
                                <u>{{ __('Resister?') }}</u></a> |
                            <a class="text-muted" href="{{ route('password.request') }}">
                                <u>{{ __('Forgot Password?') }}</u></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
