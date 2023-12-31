<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile border-bottom">
        <a href="#" class="nav-link flex-column">
          <div class="nav-profile-image">
            <img src="{{ asset('images/profile/default-profile.png') }}" alt="profile" />
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
            <span class="font-weight-semibold mb-1 mt-2 text-center">Admin</span>
            {{-- <span class="text-secondary icon-sm text-center">$3499.00</span> --}}
          </div>
        </a>
      </li>
      <!--<li class="nav-item pt-3">-->
      <!--  <a class="nav-link d-block" href="{{ route('admin.dashboard') }}">-->
      <!--    <img class="sidebar-brand-logo" src="{{ asset('images/logo.svg') }}" alt="" />-->
      <!--    <img class="sidebar-brand-logomini" src="{{ asset('images/logo-mini.svg') }}" alt="" />-->
      <!--    {{-- <div class="small font-weight-light pt-1">Responsive Dashboard</div> --}}-->
      <!--  </a>-->
      <!--  {{-- <form class="d-flex align-items-center" action="#">-->
      <!--    <div class="input-group">-->
      <!--      <div class="input-group-prepend">-->
      <!--        <i class="input-group-text border-0 mdi mdi-magnify"></i>-->
      <!--      </div>-->
      <!--      <input type="text" class="form-control border-0" placeholder="Search" />-->
      <!--    </div>-->
      <!--  </form> --}}-->
      <!--</li>-->
      <li class="pt-2 pb-1">
        <!--<span class="nav-item-head">Admin Pages</span>-->
        <span class="nav-item-head">Dashboard</span>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="mdi mdi-compass-outline menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          <span class="menu-title">UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
            </li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.products.index') }}">
          <i class="mdi mdi-package-variant-closed menu-icon"></i>
          <span class="menu-title">Products</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.properties.index') }}">
          <i class="mdi mdi-toolbox menu-icon"></i>
          <span class="menu-title">Property Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.reset-user') }}">
          <i class="mdi mdi-account-circle menu-icon"></i>
          <span class="menu-title">User Management</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.careers.index') }}">
          <i class="mdi mdi-passport-biometric menu-icon"></i>
          <span class="menu-title">Career</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-comment-question-outline menu-icon"></i>
          <span class="menu-title">Enquiries</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.enquiry.product') }}">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.enquiry.service') }}">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.enquiry.career') }}">Careers</a>
            </li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="mdi mdi-chart-bar menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item pt-3">
        <a class="nav-link" href="http://bootstrapdash.com/demo/plus-free/documentation/documentation.html" target="_blank">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- partial -->
