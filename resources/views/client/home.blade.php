@extends('layout.client.app')

@push('style')
    <style>
        .owl-carousel{
            display: flex !important;  // to override display:bloc i added !important
            flex-direction: row;
            justify-content: center;  // to center you carousel
        }
        @media only screen and (max-width: 900px) {
            .fb-post span, .fb-post span iframe {
                width: 100% !important;
            }
        }
    </style>
@endpush

@section('header')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Plot</span> To Live With Your Family</h1>
                {{-- <p class="animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet
                    sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p> --}}
                {{-- <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a> --}}
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    </div>
                    {{-- <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-3.jpg" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-4.jpg" alt="">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property Types</h1>
                    {{-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> --}}
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ url('/properties/'.rawurlencode('Appartments').'/location/all/') }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>Apartments</h6>
                                <span>{{ App\Models\Property::where('categories', array_search('Appartments', Config::get('constants')))->get()->count() }} Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ url('/properties/'.rawurlencode('Villas').'/location/all/') }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                                </div>
                                <h6>Villas</h6>
                                <span>{{ App\Models\Property::where('categories', array_search('Villas', Config::get('constants')))->get()->count() }} Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ url('/properties/'.rawurlencode('Properties for Rent').'/location/all/') }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                                </div>
                                <h6>Properties for Rent</h6>
                                <span>{{ App\Models\Property::where('categories', array_search('Properties for Rent', Config::get('constants')))->get()->count() }} Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ url('/properties/'.rawurlencode('House Plots').'/location/all/') }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-neighborhood.png" alt="Icon">
                                </div>
                                <h6>House Plots</h6>
                                <span>{{ App\Models\Property::where('categories', array_search('House Plots', Config::get('constants')))->get()->count() }} Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ url('/properties/'.rawurlencode('Commercial Properties').'/location/all/') }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-building.png" alt="Icon">
                                </div>
                                <h6>Commercial Properties</h6>
                                <span>{{ App\Models\Property::where('categories', array_search('Commercial Properties', Config::get('constants')))->get()->count() }} Properties</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <!--DISABLED THIS SECTON SINCE IT'S DUMMY CONTENT-->
        <!--UPDATED BY ANEES M A on May 01, 2023 - 8.58AM-->
        <!--<div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/about.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">#1 Place To Find The Perfect Property</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- About End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            {{-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">Latest</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @foreach($featured_properties as $property)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <a href="{{ url('/property/'.$property->id) }}">
                                            <div class="position-relative overflow-hidden image-container">
                                                @if(!empty($property->property_uploaded_images[0]))
                                                    <div><img class="img-fluid" src="{{ asset('Property Images/'.$property->property_uploaded_images[0]->name) }}" alt=""></div>
                                                @endif
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">@if(str_contains(Config::get('constants')[$property->categories], 'Rent'))For Rent @else For Sale @endif</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ Config::get('constants')[$property->categories] }}</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3"><span>&#8377</span>{{ $property->price }}</h5>
                                                <div class="d-block h5 mb-2" href="">{{ $property->name }}</div>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->location }}</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center py-2 text-limit">{{ $property->summary }}</small>
                                                {{-- <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small> --}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="{{ url('/properties/type/location/featured/') }}">Browse More Property</a>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">

                            @foreach($latest_properties as $property)
                                <div class="col-lg-4 col-md-6" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <a href="{{ url('/property/'.$property->id) }}">
                                            <div class="position-relative overflow-hidden image-container">
                                                @if(!empty($property->property_uploaded_images[0]))
                                                    <div><img class="img-fluid" src="{{ asset('Property Images/'.$property->property_uploaded_images[0]->name) }}" alt=""></div>
                                                @endif
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">@if(str_contains(Config::get('constants')[$property->categories], 'Rent'))For Rent @else For Sale @endif</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ Config::get('constants')[$property->categories] }}</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3"><span>&#8377</span>{{ $property->price }}</h5>
                                                <div class="d-block h5 mb-2" href="">{{ $property->name }}</div>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->location }}</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center py-2 text-limit">{{ $property->summary }}</small>
                                                {{-- <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small> --}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12 text-center">
                                <a class="btn btn-primary py-3 px-5" href="{{ url('/properties/type/location/all/') }}">Browse More Property</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->




        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4"  style="max-width: 600px;" >
                            <div class="fb-post" data-href="https://www.facebook.com/sajith.sudhakaran.7/posts/pfbid03283DjpLH73BZUSRBvmEAzc86Wbk8GSjaa1DchALu5MYr5L4JxHNH1ZGeK5ivRMRyl" data-width="500" data-show-text="true"><blockquote cite="https://www.facebook.com/sajith.sudhakaran.7/posts/6217031581667963" class="fb-xfbml-parse-ignore"><p>I was in search of buying a property in Trivandrum for my future needs and I happen to meet Shein through Facebook...</p>Posted by <a href="https://www.facebook.com/sajith.sudhakaran.7">Sajith Sudhakaran</a> on&nbsp;<a href="https://www.facebook.com/sajith.sudhakaran.7/posts/6217031581667963">Saturday, 17 June 2023</a></blockquote></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

@endsection

@push('scripts')
        <script>
            $('.border-top').each(function(){
                var textContainerHeight = $(this).height();
                $(this).find('.text-limit').each(function () {
                var $ellipsisText = $(this);

                while ($ellipsisText.outerHeight(true) > textContainerHeight) {
                    $ellipsisText.text(function(index, text) {
                        alert(test);
                    return text.replace(/\W*\s(\S)*$/, '...');
                    });
                }
                });
            });
            whatsApp();
        </script>
@endpush
