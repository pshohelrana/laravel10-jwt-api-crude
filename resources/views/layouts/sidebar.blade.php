<aside class="main-sidebar text-primary elevation-4"style="background: #E7F6ED">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{asset('asset/dist/img/micro boirob.png')}}" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Agrogoti <br>Cooperative Societies </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('asset/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
         
          <div class="info">
    @if (Auth::check())
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
    @else
        <a href="#" class="d-block">Guest</a>
    @endif
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
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
             @include('layouts.menus.dashboard')
             @include('layouts.menus.member')
             @include('layouts.menus.loanactive')
             @include('layouts.menus.loanapplicant')
             @include('layouts.menus.diposit')
             @include('layouts.menus.withdraw')
             @include('layouts.menus.expense')
             @include('layouts.menus.income')
             @include('layouts.menus.system')
             @include('layouts.menus.signout')
            
             @include('layouts.menus.active')
             <!-- <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Widgets
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li> -->
          
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>