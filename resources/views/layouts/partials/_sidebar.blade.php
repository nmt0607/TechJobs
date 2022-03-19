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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{setOpen('new')}}{{setOpen('faq')}}{{setOpen('recruitment')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Tin tức
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.new.list.index') }}" class="nav-link {{setActive('new')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tin tức</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('faq.index', [])}}" class="nav-link {{setActive('faq')}}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>FAQ</p>
                </a>
              </li>

              <li class="nav-item {{setOpen('recruitment')}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Tuyển dụng</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin.recruitment.index')}}" class="nav-link {{setActive('recruitment')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách tuyển dụng</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
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
                <a href="{{route('guideline.index')}}" class="nav-link {{setActive('guideline')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý hướng dẫn</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.seo_config.index')}}" class="nav-link {{setActive('seo_config')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách cấu hình SEO</p>
                </a>
              </li>
            </ul>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.config.master', [])}}" class="nav-link {{setActive('master')}}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Master data</p>
                </a>
              </li>
            </ul>

          </li>

          <li class="nav-item {{setOpen('adviselist')}}{{setOpen('log_access')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-phone"></i>
              <p>
                Tư vấn
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('advise_list')}}" class="nav-link {{setActive('adviselist')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách người dùng cần tư vấn</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('log_access.index')}}" class="nav-link {{setActive('log_access')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log truy cập</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('admin.log_survey.index')}}" class="nav-link {{setActive('log_survey')}}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Log dữ liệu khảo sát</p>
                      </a>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('survey.index')}}" class="nav-link {{setActive('log_survey')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách câu hỏi khảo sát</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item {{setOpen('funds')}}{{setOpen('fundmaster')}}{{setOpen('fundnav')}}{{setOpen('fundnews')}}{{setOpen('fund-expected-profit')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Quỹ đầu tư</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.funds', [])}}" class="nav-link {{setActive('funds')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý quỹ đầu tư</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.fundmaster')}}" class="nav-link {{setActive('fundmaster')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cấu hình thông tin quỹ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.fundnav')}}" class="nav-link {{setActive('fundnav')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý NAV quỹ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.fundnews') }}" class="nav-link {{setActive('fundnews')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tin tức quỹ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.fund-expected-profit.index') }}" class="nav-link {{setActive('fund-expected-profit')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lợi suất quỹ</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Nhân viên -->
          <li class="nav-item {{setOpen('employee')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Đội ngũ nhân sự</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.employee.index')}}" class="nav-link {{setActive('employee')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách nhân sự</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{setOpen('nguoiDung')}}{{setOpen('role')}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Người dùng</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('nguoiDung.create.index') }}" class="nav-link {{setActive2('nguoiDung/create')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('nguoiDung.index')}}" class="nav-link {{setActive2('nguoiDung')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link {{setActive('role')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý vai trò</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item active">
            <a href="{{route('system.audit.list')}}" class="nav-link {{setActive('system/audit')}}">
              <i class="nav-icon fas fa-file"></i>
              <p>Dữ liệu Audit</p>
            </a>
          </li>
          <li class="nav-item active">
            <a href="{{route('files.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Quản lý File</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
