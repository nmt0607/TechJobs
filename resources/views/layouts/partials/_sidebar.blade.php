<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{setOpen('guideline')}}{{setOpen('master')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Cấu hình
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.config.master', [])}}" class="nav-link {{setActive('master')}}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Master data</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{setOpen('user')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Người dùng</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.create.index') }}" class="nav-link {{setActive2('user/create')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link {{setActive2('user')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách người dùng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item active">
            <a href="{{route('files.index')}}" class="nav-link {{setActive2('files')}}">
              <i class="nav-icon fas fa-file"></i>
              <p>Quản lý File</p>
            </a>
          </li>
          <li class="nav-item active">
            <a href="{{route('admin.serviceProduct.index')}}" class="nav-link {{setActive2('serviceProduct')}}">
              <i class="nav-icon fas fa-file"></i>
              <p>Sản phẩm dịch vụ</p>
            </a>
          </li>
            <li class="nav-item active">
                <a href="{{route('admin.delegate.index')}}" class="nav-link {{setActive2('delegate')}}">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>Người đại diện</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
