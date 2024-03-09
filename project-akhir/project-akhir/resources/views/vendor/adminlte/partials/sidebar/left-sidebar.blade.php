<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Manual Sidebar Links --}} 
                
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa fa-landmark"></i>
                    <p>
                        Inventaris Barang
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/gedung')}}" class="nav-link">
                            <i class="fa fa-building"></i>
                            <p>
                                Gedung
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/kategori')}}" class="nav-link">
                            <i class="fa fa-book"></i>
                            <p>
                                Kategori
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/inventaris')}}" class="nav-link">
                            <i class="fa fa-box"></i>
                            <p>
                                Inventaris
                            </p>
                        </a>
                    </li>
                </ul>
            </li>

                {{-- End Manual Sidebar Links --}}
            </ul>
        </nav>
    </div>

</aside>

