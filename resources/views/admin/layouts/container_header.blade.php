<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@yield('breadcrumbName', __('message.dashboard'))</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @if (Route::currentRouteName() != 'admin.dashboard')
              <li class="breadcrumb-item"><a href="#">{{ __('message.dashboard') }}</a></li>
              <li class="breadcrumb-item active">@yield('breadcrumbMenu', __('message.category'))</li>
            @endif
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->