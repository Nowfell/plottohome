<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <!--<a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center">-->
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center">

            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ asset('include/logo-01.png') }}" alt="Icon" style="width: 45px; height: 45px;">
            </div>
            <h1 class="m-0 text-primary">Plot <span style="color:#ed8222">To Home</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <!--<a href="index.html" class="nav-item nav-link active">Home</a>-->
                <!---UPDATED BY ANEES on May 01, 2023, 09.06 AM-->
                <a href="{{ url('/') }}" class="nav-item nav-link {{ activeNav('home', $route_name) }}">Home</a>
                <!----->
                <a href="{{ url('/about') }}" class="nav-item nav-link {{ activeNav('about', $route_name) }}">About</a>
                <a href="{{ url('/properties/type/location/all/') }}" class="nav-item nav-link {{ activeNav('properties', $route_name) }}">Property</a>
                <a href="{{ url('/gallery') }}" class="nav-item nav-link {{ activeNav('gallery', $route_name) }}">Gallery</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="property-list.html" class="dropdown-item">Property List</a>
                        <a href="property-type.html" class="dropdown-item">Property Type</a>
                        <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                    </div>
                </div> --}}
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                    </div>
                </div> --}}
                <a href="{{ url('/contact') }}" class="nav-item nav-link {{ activeNav('contact', $route_name) }}">Contact</a>
            </div>
            {{-- <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a> --}}
        </div>
    </nav>
</div>
