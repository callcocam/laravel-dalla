<div class="main-header">
    <div class="logo">
        <img src="{{ asset($tenant->cover) }}" alt="">
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div style="margin: auto"></div>
    <div class="header-part-right">
        <!-- Full screen toggle
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>-->
        <!-- Grid menu Dropdown -->

        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{ asset($user->avatar) }}" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> {{ $user->name }}
                    </div>
                    <a class="dropdown-item"  href="{{ route('admin.auth.profile.form') }}">{{ __("Minha Conta") }}</a>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
