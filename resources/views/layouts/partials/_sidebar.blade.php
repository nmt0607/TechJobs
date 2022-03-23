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
              <i class=" nav-icon fas fa-cog"></i>
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
          <li class="nav-item {{setOpen('user')}} {{setOpen('role')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Người dùng</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link {{setActive2('user')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.role.index')}}" class="nav-link {{setActive2('role')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách nhóm người dùng</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item {{setOpen('customer')}} {{setOpen('role')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Quản lý khách hàng</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.customer.index')}}" class="nav-link {{setActive2('customer')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách khách hàng</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item active">
            <a href="{{route('admin.customer.index')}}" class="nav-link {{setActive2('customer')}}">
                <i class="nav-icon fas fa-users"></i>
                <p>Quản lý khách hàng</p>
            </a>
        </li>
          <li class="nav-item {{setOpen('ticker')}} {{setOpen('role')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>Quản lý ticket</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ticket.index')}}" class="nav-link {{setActive2('ticket')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách ticket</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{setOpen('sla')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-signal"></i>
              <p>Quản lý SLA</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sla.priority') }}" class="nav-link {{setActive2('sla/priority')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mức độ ưu tiên</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sla.priority-spdv') }}" class="nav-link {{setActive2('sla/priority-spdv')}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khai báo SLA theo SPDV</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khai báo SLA theo PLYC</p>
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
              <i class="nav-icon fas fa-tools"></i>
              <p>Sản phẩm dịch vụ</p>
            </a>
          </li>
            <li class="nav-item active">
                <a href="{{route('admin.delegate.index')}}" class="nav-link {{setActive2('delegate')}}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Người đại diện</p>
                </a>
            </li>
          <li class="nav-item active">
            <a href="{{route('admin.unit.index')}}" class="nav-link {{setActive2('unit')}}">
              <i class="nav-icon fas fa-building"></i>
              <p>Quản lý đơn vị</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
