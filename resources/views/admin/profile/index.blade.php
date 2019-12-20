@extends('layouts.admin')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>{{ $tenant->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.admin.index') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ __('Profile') }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ __('User Report') }} <small>{{ __('Activity report') }}</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img id="image_tag" class="img-responsive avatar-view" src="{{ asset($user->avatar) }}" alt="Avatar" title="Change the avatar" style="max-width: 220px">
                    </div>
                </div>
                <h3>Samuel Doe</h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                    </li>

                    <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                    </li>
                </ul>

                <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                <br />


            </div>
            <div class="col-md-9 col-sm-9 ">

                {{ Form::open(['route'=>['admin.auth.profile'], "class"=>"form-horizontal form-label-left","method"=>"post"]) }}
                @csrf

                {{ Form::hidden('id', $user->id) }}

                {{ Form::hidden('parent', 'address') }}

                <div class="item form-group">
                    {{ Form::bsText('name', $user->name, "Full Name") }}
                </div>
                <div class="item form-group">
                    {{ Form::bsEmail('email', $user->email, "Email Address") }}
                </div>
                <div class="item form-group">
                    {{ Form::bsAvatar('avatar', $user->avatar,'Select Cover') }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('document', $user->document) }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('phone', $user->phone,'Phone') }}
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                    <div class="col-md-6 col-sm-6 ">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-{{ $user->gender == 'male'?'primary':'secondary' }}" data-toggle-class="btn-{{ $user->gender == 'male'?'primary':'secondary' }}" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; {{ __('Male') }} &nbsp;
                            </label>
                            <label class="btn btn-{{ $user->gender == 'female'?'primary':'secondary' }}" data-toggle-class="btn-{{ $user->gender == 'male'?'primary':'secondary' }}" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="female" class="join-btn"> {{ __('Female') }}
                            </label>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="item form-group">
                    {{ Form::bsText('zip', set_form_value($user->address,'zip'),'Zip') }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('city', set_form_value($user->address,'city'),'City') }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('state', set_form_value($user->address,'state'),'State') }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('district', set_form_value($user->address,'district'),'District') }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('street', set_form_value($user->address,'street'),'Street') }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('number', set_form_value($user->address,'number'),'Number') }}
                </div>
                <div class="item form-group">
                    {{ Form::bsText('complement', set_form_value($user->address,'complement'),'Complement') }}
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success btn-block">{{ __('Update Data User') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection


