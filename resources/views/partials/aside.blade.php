<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <router-link exact :to="{ name: 'dashboard' }" class="brand-link">
        <img src="{{ asset('dashboard/favicon.ico') }}" alt="Gaber.Ware" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Gaber.Ware</span>
    </router-link>

    <div class="sidebar">

        <!-- Start User Icon -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <!-- End User Icon -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <router-link exact :to="{ name: 'dashboard' }" active-class="active" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link exact :to="{ name: 'users' }" active-class="active" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link exact :to="{ name: 'profile' }" active-class="active" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </router-link>
                </li>

                {{-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Layout Options
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item">

                    <a href="#" class="nav-link"
                        onclick="event.preventDefault();document.getElementById('formLogout').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>

                    <form id="formLogout" action="{{ route('logout') }}" method="POST" style="display: none">
                        {{ csrf_field() }}
                    </form>

                </li>

            </ul>

        </nav>

    </div>

</aside>