@extends('layout.client.app')

@section('header')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5" style="margin-top: 7rem;">
                <h1 class="display-5 animated fadeIn mb-4">Property</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="property">Property</li>
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
                            <a class="btn btn-outline-primary @if(!$featured) active @endif" href="{{ url('/properties/'.session('type').'/'.session('location').'/all/') }}">All</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary @if($featured) active @endif" href="{{ url('/properties/'.session('type').'/'.session('location').'/featured/') }}">Featured</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 @if(!$featured) active @endif">
                    <div class="row g-4">
                        @forelse($properties as $property)
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
                        @empty
                            <div class="col-12 text-center">
                                <span class="text-dark">No data Found</span>
                            </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            @if(!empty((array)$properties))
                                {!! $properties->links() !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0 @if($featured) active @endif">
                    <div class="row g-4">
                        @forelse($featured_properties as $property)
                                <div class="col-lg-4 col-md-6">
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
                            @empty
                                <div class="col-12 text-center">
                                    <span class="text-dark">No data Found</span>
                                </div>
                            @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            @if(!empty((array)$featured_properties))
                                {!! $featured_properties->links() !!}
                            @endif
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection

@push('scripts')
        <script>
        $('#whatsappButton').venomButton({
            phone: '+918714324466',
            popupMessage: 'Hello, how can we help you?',
            message: "Hi",
            avatar: "{{ asset('images/favicon.png') }}",
            showPopup: true,
            position: "right",
            linkButton: false,
            showOnIE: false,
            headerTitle: 'Welcome!',
            headerColor: '#25d366',
            backgroundColor: '#25d366',
            buttonImage: "{{ asset('images/whatsapp.svg') }}"
        });
        </script>
@endpush
