<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
                <li class="nav-item">
                    <a class="nav-item-hold" href="{{ route('admin.admin.index') }}"><i class="nav-icon i-Dashboard"></i><span class="nav-text">{{ __('Dashboard') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @can('admin.settings.index')
                <li class="nav-item">
                    <a class="nav-item-hold" href="{{ route('admin.settings.setting') }}"><i class="nav-icon i-Gear-2"></i><span class="nav-text">{{ __('Settings') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @canany(['admin.roles.index','admin.permissions.index','admin.users.index'])
                <li class="nav-item" data-item="operacional"><a class="nav-item-hold" href="#"><i class="nav-icon i-Lock-User"></i><span class="nav-text">{{ __('Oprational') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @canany(['admin.events.index'])
                <li class="nav-item" data-item="events"><a class="nav-item-hold" href="#"><i class="nav-icon i-Calendar"></i><span class="nav-text">{{ __('Events') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('admin.auth.profile.form') }}"><i class="nav-icon i-Administrator"></i><span class="nav-text">{{ __('Profile') }}</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="#" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class="nav-icon i-Arrow-Inside"></i><span class="nav-text">{{ __("Sign out") }}</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
        <ul class="childNav" data-parent="operacional">
            @can('admin.users.index')
                <li class="nav-item"><a href="{{ route('admin.users.index') }}"><i class="nav-icon i-Arrow-Forward-2"></i><span class="item-name">{{ __('Users') }}</span></a></li>
            @endcan
            @can('admin.permissions.index')
                <li class="nav-item"><a href="{{ route('admin.permissions.index') }}"><i class="nav-icon i-Arrow-Forward-2"></i><span class="item-name">{{ __('Permissions') }}</span></a></li>
            @endcan
            @can('admin.roles.index')
                <li class="nav-item"><a href="{{ route('admin.roles.index') }}"><i class="nav-icon i-Arrow-Forward-2"></i><span class="item-name">{{ __('Roles') }}</span></a></li>
            @endcan
        </ul>
        <ul class="childNav" data-parent="events">
            @can('admin.events.index')
                <li class="nav-item"><a href="{{ route('admin.events.index') }}"><i class="nav-icon i-Arrow-Forward-2"></i><span class="item-name">{{ __('List') }}</span></a></li>
            @endcan
        </ul>

    </div>
    <div class="sidebar-overlay"></div>
</div>
