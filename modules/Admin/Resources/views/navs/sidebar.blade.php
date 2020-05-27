<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">

        <span class="brand-text font-weight-light">Listashop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('img/'.auth()->user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                {{-- Dashboard --}}
                <li class="nav-item">
                    <router-link to="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </router-link>
                </li>
                {{-- User --}}
                <li class="nav-item">
                    <router-link to="/admin/customers" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                        </p>
                    </router-link>
                </li>
                {{-- Product --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <router-link to="/admin/products" class="nav-link">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>
                                    Catalog
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/admin/categories" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Category
                                </p>
                            </router-link>
                        </li>
                        {{-- <li class="nav-item">
                            <router-link to="/admin/attributes" class="nav-link">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>
                                    Attributes
                                </p>
                            </router-link>
                        </li>--}}
                        <li class="nav-item">
                            <router-link :to="{ name: 'option.index'}" class="nav-link">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>
                                    Options
                                </p>
                            </router-link>
                        </li>
                    </ul>
                </li>
                {{-- Sales --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Sales
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <router-link to="/admin/orders" class="nav-link">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>
                                    Order
                                </p>
                            </router-link>
                        </li>
                    </ul>
                </li>
                {{-- Logout --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
