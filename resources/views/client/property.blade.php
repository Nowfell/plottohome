@extends('layout.client.app')

@push('style')
    <style>
        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }
        div#social-links ul li {
            display: inline-block;
        }
        div#social-links ul li a {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
            color: #222;
            background-color: #ccc;
        }
    </style>
@endpush

@section('header')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5" style="margin-top: 7rem;">
                {{-- <h1 class="display-5 animated fadeIn mb-4">Property</h1>  --}}
                    <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/properties/type/location/all/') }}">Property</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="property">{{ $property->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="img/header.jpg" alt="">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h4 class="display-5 animated fadeIn mb-4">{{ $property->name }}</h4>

                @if($property->featured)
                    <span class="badge bg-primary" style="height: fit-content;">Featured</span>
                @endif
            </div>
            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->location }}</p>
            <div id="socialButtons" class="d-flex justify-content-end"></div>
            <div class="row g-0 gx-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-block bg-light text-center rounded p-3">
                        <div class="property-images rounded overflow-hidden p-4 slider">
                            @foreach($property->property_uploaded_images as $image)
                                <div style="background-image: url('{{ asset('Property Images/'.$image->name) }}');background-size: 100%;background-repeat: no-repeat;height: 44rem;"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-0 gx-5 mt-5">
                {!! $property->description !!}
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection

@push('scripts')
    <script>
        $('.property-images').slick({
            arrows: false,
            autoplay:true,
            autoplaySpeed: 3000,
            dots:true,
        });
        
        var propertyName = @json($property->name);
        var propertyLocation = @json($property->location);
        var url = @json(url('/property/'.$property->id));
        
        // $('#whatsappButton').venomButton({
        //     phone: '+918714324466',
        //     popupMessage: 'Hello, how can we help you?',
            // message: "Hi, <br> I would like to know more about this property, <br>" + propertyName + ", <br>Location: " + propertyLocation + ", <br>",
        //     avatar: "{{ asset('images/favicon.png') }}",
            // showPopup: true,
            // position: "right",
        //     linkButton: false,
        //     showOnIE: false,
        //     headerTitle: 'Welcome!',
        //     headerColor: '#25d366',
        //     backgroundColor: '#25d366',
        //     buttonImage: "{{ asset('images/whatsapp.svg') }}"
        // });
        
        whatsApp(url, "Hi, \nI would like to know more about this property, \nProperty Name: " + propertyName + ", \nLocation: " + propertyLocation + ",");

        $('#socialButtons').socialSharingPlugin({
            url: window.location.href,
            title: $('meta[property="og:title"]').attr('content'),
            description: $('meta[property="og:description"]').attr('content'),
            img: $('meta[property="og:image"]').attr('content'),
            responsive: true,
            mobilePosition: 'left',
            enable: ['whatsapp', 'facebook', 'twitter', 'pinterest', 'linkedin', 'reddit', 'email']
        })
    </script>
@endpush
