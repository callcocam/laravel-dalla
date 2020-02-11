<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('admin.admin.index') }}"><i class="nav-icon i-Dashboard"></i><span class="nav-text">{{ __('Painel') }}</span></a>
                <div class="triangle"></div>
            </li>
            @can('admin.settings.index')
                <li class="nav-item">
                    <a class="nav-item-hold" href="{{ route('admin.settings.setting') }}"><i class="nav-icon i-Gear-2"></i><span class="nav-text">{{ __('Configuração') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @canany(['admin.roles.index','admin.permissions.index'])
                <li class="nav-item" data-item="operacional"><a class="nav-item-hold" href="#"><i class="nav-icon i-Lock-User"></i><span class="nav-text">{{ __('Operacional') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @if (Route::has('admin.users.index'))
            @can('admin.users.index')
                <li class="nav-item">
                    <a class="nav-item-hold" href="{{ route('admin.users.index') }}"><i class="nav-icon i-Add-User"></i><span class="nav-text">{{ __('Usuários') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @endif
            @if (Route::has('admin.clients.index'))
            @can('admin.clients.index')
                <li class="nav-item">
                    <a class="nav-item-hold" href="{{ route('admin.clients.index') }}"><i class="nav-icon i-Checked-User"></i><span class="nav-text">{{ __('Clientes') }}</span></a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @endif
            @if (Route::has('admin.providers.index'))
                @can('admin.providers.index')
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ route('admin.providers.index') }}"><i class="nav-icon i-Add-UserStar"></i><span class="nav-text">{{ __('Fornecedores') }}</span></a>
                        <div class="triangle"></div>
                    </li>
                @endcan
            @endif
            @if (Route::has('admin.products.index'))
                @can('admin.products.index')
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ route('admin.products.index') }}"><i class="nav-icon i-Add-File"></i><span class="nav-text">{{ __('Produtos') }}</span></a>
                        <div class="triangle"></div>
                    </li>
                @endcan
            @endif
            @if (Route::has('admin.grids.index'))
                @can('admin.grids.index')
                    <li class="nav-item">
                        <a class="nav-item-hold" href="{{ route('admin.grids.index') }}"><i class="nav-icon i-Add-File"></i><span class="nav-text">{{ __('Grades') }}</span></a>
                        <div class="triangle"></div>
                    </li>
                @endcan
            @endif
            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('admin.auth.profile.form') }}"><i class="nav-icon i-Administrator"></i><span class="nav-text">{{ __('Minha Conta') }}</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="#" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class="nav-icon i-Arrow-Inside"></i><span class="nav-text">{{ __("Sair") }}</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
        <ul class="childNav" data-parent="operacional">
            @if (Route::has('admin.permissions.index'))
                @can('admin.permissions.index')
                    <li class="nav-item"><a href="{{ route('admin.permissions.index') }}"><i class="nav-icon i-Arrow-Forward-2"></i><span class="item-name">{{ __('Permissões') }}</span></a></li>
                @endcan
            @endif
            @if (Route::has('admin.roles.index'))
                @can('admin.roles.index')
                    <li class="nav-item"><a href="{{ route('admin.roles.index') }}"><i class="nav-icon i-Arrow-Forward-2"></i><span class="item-name">{{ __('Papéis') }}</span></a></li>
                @endcan
            @endif
        </ul>

    </div>
    <div class="sidebar-overlay"></div>
</div>
