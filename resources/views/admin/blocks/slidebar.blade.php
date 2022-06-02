<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/admin/images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="img-user">
                    <img src="{{asset('assets/admin/images/img-user.jpg')}}" class="" alt="User Image">
                </div>
            </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="{{route('admin.home')}}" class="nav-link active">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Quản lý chung
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-product-hunt"></i>
                    <p>
                        Sản phẩm
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.product.group.addGroup')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Nhóm sản phẩm</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.product.show')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách sản phẩm</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class=" nav-icon fas fa-users"></i>
                    <p>
                        Khách hàng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Khách hàng mới <span class="right badge badge-danger">New</span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.client')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách Khách hàng</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p>
                        Đơn hàng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Tạo đơn hàng
                                <span class="badge badge-info right">6</span>
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.order.orderWaitConfirm')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Chờ xác nhận<span class="badge badge-info right">6</span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.order.orderWaitForTheGood')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Chờ lấy hàng<span class="badge badge-info right">6</span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.order.orderDelivering')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đang giao hàng<span class="badge badge-info right">6</span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.order.orderDeliveySuccess')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Giao hàng thành công<span class="badge badge-info right">6</span></p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.promo.show')}}" class="nav-link">
                    <i class="nav-icon fas fa-store"></i>
                    <p>Khuyến mại</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>Báo cáo</p>
                    <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Doanh thu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Doanh chi</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.warehouse.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p>Kho</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.website.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>Website</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Cài đặt</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>
