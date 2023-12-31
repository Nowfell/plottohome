<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Plot To Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <!--<link href="img/favicon.ico" rel="icon">-->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/slick/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/social-share/css/socialSharing.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/venom-button/venom-button.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!--<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />-->
    <link rel="shortcut icon" href="{{ asset('images/p2h-fav-ico.png') }}" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @stack('style')
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0" nonce="3nS2K7f0"></script>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        @include('section.client.navbar')
        <!-- Navbar End -->


        <!-- Header Start -->
        @yield('header')
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input id="searchKeyword" type="text" class="form-control border-0 py-3" value="{{ session('searchKeyword') }}" placeholder="Search Keyword">
                            </div>
                            <div class="col-md-4">
                                <select id="type" class="form-select border-0 py-3">
                                    <option value="type" selected>Property Type</option>
                                    @foreach($data['categories'] as $category)
                                        <option value="{{ $category }}" @if(session('type') == $category) selected @endif>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="location" class="form-select border-0 py-3">
                                    <option value="location" selected>Location</option>
                                    @foreach($data['locations'] as $location)
                                        @if(!empty($location->location))
                                            <option value="{{ $location->location }}" @if(session('location') == $location->location) selected @endif>{{ $location->location }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button id="propertySearch" class="btn btn-dark border-0 w-100 py-3">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->

        @yield('content')

        <!-- Footer Start -->
        @include('section.client.footer')
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

        <!-- Whatsapp Button -->
        <div id="whatsappButton"></div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/slick/js/slick.js') }}"></script>
    <script src="{{ asset('lib/social-share/js/socialSharing.js') }}"></script>
    <script src="{{ asset('lib/venom-button/venom-button.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $('#propertySearch').on('click', function(){
            var type = $('#type').val();
            var location = $('#location').val();
            var keyword = $('#searchKeyword').val();
            keyword = encodeURIComponent(keyword);
            keyword = keyword != null ? keyword : '';
            var url = "{{ url('/properties/:type/:location/all/:searchKeyword') }}";

            url = url.replace(':type', type);
            url = url.replace(':location', location);
            url = url.replace(':searchKeyword', keyword);

            window.location.href = url;
        });

        function whatsApp(url = null, message = null){
            if((message == null || message == '') && (url == null || url == '')){
            $('#whatsappButton').venomButton({
                //     phone: '918714324466',
                //     popupMessage: 'Hello, how can we help you?',
                //     message: "Hi",
                    avatar: "{{ asset('images/favicon.png') }}",
                    showPopup: true,
                    position: "right",
                //     linkButton: false,
                //     showOnIE: false,
                //     headerTitle: 'Welcome!',
                //     headerColor: '#25d366',
                //     backgroundColor: '#25d366',
                    buttonImage: "{{ asset('images/whatsapp.svg') }}"
                });
            }
            else{
                $('#whatsappButton').venomButton({
                //     phone: '918714324466',
                //     popupMessage: 'Hello, how can we help you?',
                    message: message + "\n" + url,
                    avatar: "{{ asset('images/favicon.png') }}",
                    showPopup: true,
                    position: "right",
                //     linkButton: false,
                //     showOnIE: false,
                //     headerTitle: 'Welcome!',
                //     headerColor: '#25d366',
                //     backgroundColor: '#25d366',
                    buttonImage: "{{ asset('images/whatsapp.svg') }}"
                });
            }
        }
    </script>
    @stack('scripts')
</body>

</html>
