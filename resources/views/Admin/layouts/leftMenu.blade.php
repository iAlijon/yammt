<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">YAMMT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/admin" class="nav-link {{(request()->is('/admin')) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Bosh sahifa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('news.index')}}" class="nav-link {{(request()->is('news*')) ? 'active' : ''}}">
                        <i class="fas fa-file nav-icon"></i>
                        Yangiliklar
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="fas fa-file"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('menu.index')}}" class="nav-link {{(request()->is('menu*')) ? 'active' : ''}}"><i class="fas fa-file nav-icon"></i> Menu</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('menu-item.index')}}" class="nav-link {{request()->is('menu-item*') ? 'active' : ''}}"><i class="fas fa-file nav-icon"></i>Menu Item</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
