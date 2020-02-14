<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('admin.admin.index') }}"><i class="nav-icon i-Dashboard"></i><span class="nav-text">{{ __('Painel') }}</span></a>
                <div class="triangle"></div>
            </li>
            {!! \App\Suports\Menus\AutoMenu::parent()->render() !!}
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
        {!! \App\Suports\Menus\AutoMenu::children()->render('parent-item') !!}

    </div>
    <div class="sidebar-overlay"></div>
</div>
