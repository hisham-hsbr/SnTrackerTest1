    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.home') }}" class="brand-link">
            <img src="{{ asset('adminLinks/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SnTracker</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('adminLinks/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    <a href="#" class="d-block">
                        @foreach (Auth::user()->roles as $role)
                            <span class="d-block">
                                Role - {{ $role->name }}
                            </span>
                        @endforeach
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <!-- <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboardss
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Updates
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li> -->

                    <li
                        class="nav-item has-treeview
                @permitToParent('Admin')
                    {{-- {{ (request()->is('admin/home')) ? 'menu-open' : '' }} --}}
                        {{ request()->is('admin/show') ? 'menu-open' : '' }}
                        {{ request()->is('admin/roles') ? 'menu-open' : '' }}
                        {{ request()->is('admin/permissions') ? 'menu-open' : '' }}
                    ">
                        <a href="#"
                            class="nav-link
                        {{-- {{ (request()->is('admin/home')) ? 'active' : '' }} --}}
                        {{ request()->is('admin/show') ? 'active' : '' }}
                        {{ request()->is('admin/roles') ? 'active' : '' }}
                        {{ request()->is('admin/permissions') ? 'active' : '' }}
                        ">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Admin
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @permitToParent('Admin')
                            <li class="nav-item">
                                <a href="{{ route('admin.show') }}"
                                    class="nav-link {{ request()->is('admin/show') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin User</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('Role')
                            <li class="nav-item">
                                <a href="{{ route('admin.roles') }}"
                                    class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('Permission')
                            <li class="nav-item">
                                <a href="{{ route('admin.permissions') }}"
                                    class="nav-link {{ request()->is('admin/permissions') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('User')
                            <li class="nav-item">
                                <a href="" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endpermitToParent
                        </ul>
                    </li>
                    @endpermitToParent
                    {{-- <li class="nav-item has-treeview menu-open"> --}}
                    @permitToParent('Admin')
                    <li
                        class="nav-item has-treeview
                                                    {{ request()->is('admin/product') ? 'menu-open' : '' }}
                                                    {{ request()->is('admin/customer') ? 'menu-open' : '' }}
                                                    {{ request()->is('admin/supplier') ? 'menu-open' : '' }}
                                                    {{ request()->is('admin/brand') ? 'menu-open' : '' }}
                                                    {{ request()->is('admin/branch') ? 'menu-open' : '' }}
                                                    {{ request()->is('admin/division') ? 'menu-open' : '' }}
                                                    {{-- {{ (request()->is('admin/SerialNumber')) ? 'menu-open' : '' }} --}}
                                                    {{-- {{ (request()->is('admin/BottomPrice')) ? 'menu-open' : '' }} --}}
                                                    ">
                        {{-- <li class="nav-item has-treeview menu-open"> --}}
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Masters
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @permitToParent('Product')
                            <li class="nav-item">
                                <a href="{{ route('product.index') }}"
                                    class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}">
                                    {{-- <a href="{{route('product.index')}}" class="nav-link active"> --}}
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('Customer')
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}"
                                    class="nav-link {{ request()->is('admin/customer') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('Brand')
                            <li class="nav-item">
                                <a href="{{ route('brand.index') }}"
                                    class="nav-link {{ request()->is('admin/brand') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Brand</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('Branch')
                            <li class="nav-item">
                                <a href="{{ route('branch.index') }}"
                                    class="nav-link {{ request()->is('admin/branch') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Branch</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('Division')
                            <li class="nav-item">
                                <a href="{{ route('division.index') }}"
                                    class="nav-link {{ request()->is('admin/division') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Division</p>
                                </a>
                            </li>
                            @endpermitToParent
                            @permitToParent('Supplier')
                            <li class="nav-item">
                                <a href="{{ route('supplier.index') }}"
                                    class="nav-link {{ request()->is('admin/supplier') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                            @endpermitToParent
                        </ul>
                    </li>
                    @endpermitToParent
                    @permitToParent('SerialNumber')
                    <li class="nav-item">
                        <a href="{{ route('SerialNumber.index') }}"
                            class="nav-link {{ request()->is('admin/SerialNumber') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Serial Number
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                    @endpermitToParent
                    @permitToParent('BottomPrice')
                    <li class="nav-item">
                        <a href="{{ route('BottomPrice.index') }}"
                            class="nav-link {{ request()->is('admin/BottomPrice') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-tags "></i>
                            <p>
                                Bottom Price
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                    @endpermitToParent
                    @permitToParent('Reports')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Reports
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ChartJS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Flot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inline</p>
                                </a>
                            </li>
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ameer</p>
                            </a>
                    </li>
                </ul>
                </li>
                @endpermitToParent
                @permitToParent('Enquiries')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Enquiries
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endpermitToParent


                <!-- <li class="nav-header">EXAMPLES</li>

                    <li class="nav-item">
                        <a href="pages/calendar.html" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Calendar
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/gallery.html" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>


                    <li class="nav-header">MISCELLANEOUS</li>
                    <li class="nav-item">
                        <a href="https://adminlte.io/docs/3.0" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Documentation</p>
                        </a>
                    </li>
                    <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Level 1</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Level 1
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Level 2</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Level 2
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Level 3</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Level 3</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Level 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Level 2</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">LABELS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Important</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Warning</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Informational</p>
                        </a>
                    </li> -->
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
