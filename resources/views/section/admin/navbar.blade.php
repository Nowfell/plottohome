<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-chevron-double-left"></span>
      </button>
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{ asset('/admin') }}"><img src="{{ asset('images/logo-mini.png') }}" style="width: 45px;" alt="logo" /></a>
      </div>
      <ul class="navbar-nav navbar-nav-right">
        {{-- <li class="nav-item nav-profile dropdown d-none d-md-block">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-text">English </div>
          </a>
          <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="#">
              <i class="flag-icon flag-icon-bl mr-3"></i> French </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="flag-icon flag-icon-cn mr-3"></i> Chinese </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="flag-icon flag-icon-de mr-3"></i> German </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="flag-icon flag-icon-ru mr-3"></i>Russian </a>
          </div>
        </li> --}}
        <li class="nav-item nav-logout d-none d-lg-block" title="Logout">
          <a class="nav-link" href="{{ route('admin.signout') }}">
            <i class="mdi mdi-power" style="font-size: 23px;"></i> LOGOUT
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
