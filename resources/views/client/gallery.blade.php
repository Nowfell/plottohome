@extends('layout.client.app')

@section('header')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5" style="margin-top: 7rem;">
                <h1 class="display-5 animated fadeIn mb-4">Gallery</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="property">Gallery</li>
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
                    @foreach($properties as $property)
                        @if(!empty($property->property_uploaded_images[0]))
                            <div class="col-lg-4 col-sm-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="cat-item d-block bg-light text-center rounded p-3">
                                    <div class="rounded p-4">
                                        <div style="background-image: url('{{ asset('Property Images/'.$property->property_uploaded_images[0]->name) }}');background-size: 100%;background-repeat: no-repeat;height: 216px;"></div>
                                        {{-- <img class="img-fluid" src="{{ $property->image }}"> --}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
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