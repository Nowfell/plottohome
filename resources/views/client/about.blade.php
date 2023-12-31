@extends('layout.client.app')

@section('header')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5" style="margin-top: 7rem;">
                <h1 class="display-5 animated fadeIn mb-4">About</h1> 
                    <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="property">About</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                {{-- <img class="img-fluid" src="img/header.jpg" alt=""> --}}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/about.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Welcome to Plottohome</h1>
                        <p class="mb-4">Plottohome is an innovative platform led by a group of young entrepreneurs with a mission to deliver highly professional services undertaking the new real estate market challenges
We are a leading real estate service provider, delivering premium residential and commercial real estate solutions all across Kerala,. For the past five years we have been delivering professional realtor services and All through these years, we have been associating with a wide-ranging portfolio of clients,and we are really keen in fostering a long-lasting relationship with each of them.As a dominant player in Kerala’s real estate segment, land developing and villa construction is our forte. Our diversified clientele ranging from middle class to upper class individuals reflects a true cross section of the highly dynamic real estate community. We also take up projects related to the purchase and development of small, medium and large residential plots as well as commercial properties We take pride in that we have been able to garner ultimate customer satisfaction by delivering compatible outputs, in our stride to emerge as a best-in-class real estate operator.We put our clients at complete ease, while they pass through what could have been a stressful phase otherwise. As a responsible real estate service provider with a successful pan-Kerala presence, we always keep up an eco- friendly approach while delivering customized real estate solutions, to ensure a better tomorrow.</p>
                        {{-- <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
@endsection

@push('scripts')
        <script>
            whatsApp();
        </script>
@endpush
