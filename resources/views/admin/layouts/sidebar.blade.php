<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(auth('admin')->user()->avatar)
        <img src="{{ asset(auth('admin')->user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        @else
        <img src="{{ asset('backend/no-avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="{{ route('admin.dashboard') }}" class="d-block">{{ auth('admin')->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        {{-- menu for home page --}}
        <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-open' : '' }}">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{ __('message.dashboard') }}
            </p>
          </a>

        </li>

        {{-- menu of category module --}}
        @php
        $routeCategoryArr = [
        'admin.category.index',
        'admin.category.create',
        'admin.category.edit',
        'admin.category.show',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeCategoryArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              {{ __('message.category_management') }}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.category.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.category.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('message.category_list') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.category.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.category.create' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('message.create_category') }}</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- menu of product module --}}
        @php
        $routeProductArr = [
        'admin.product.index',
        'admin.product.create',
        'admin.product.edit',
        'admin.product.show',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeProductArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fab fa-product-hunt"></i>
            <p>
              {{ __('message.product_management') }}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.product.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.product.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('message.product_list') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.product.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.product.create' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('message.create_product') }}</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- menu of order module --}}
        @php
        $routeOrderArr = [
        'admin.order.index',
        'admin.order.edit',
        'admin.order.show',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeOrderArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              {{ __('message.order_management') }}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.order.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.order.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('message.order_list') }}</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- menu of customer module --}}
        @php
        $routeCustomerArr = [
        'admin.customer.index',
        'admin.customer.edit',
        'admin.customer.show',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeCustomerArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              {{ __('message.customer_management') }}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.customer.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.customer.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('message.customer_list') }}</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- menu of comment module --}}
        @php
        $routeCommentArr = [
        'admin.user.index',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeCommentArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-secret"></i>
            <p>
              Quản lý đánh giá
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.comment.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.comment.index' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách đánh giá</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- menu of report module --}}
        @php
        $routeReportArr = [
        'admin.report.order',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeReportArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-secret"></i>
            <p>
              Báo cáo bán hàng
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.report.order') }}" class="nav-link {{ Route::currentRouteName() == 'admin.report.order' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách báo cáo bán hàng</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

  <div class="p-2">
    <form action="{{ route('admin.logout') }}" method="POST">
      @csrf
      <button type="submit" onclick="return confirm('{{ __("message.confirm_logout") }}')"><i class="fas fa-sign-out-alt"></i> <span class="ml-2">{{ __('message.logout') }}</span></button>
    </form>
  </div>
</aside>