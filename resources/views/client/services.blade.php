@extends('layout.client.app')

@section('content')

	<!-- Services Page Section -->
	<section class="services-page-section">
		<div class="auto-container">
			<div class="row clearfix">

                @foreach($services as $service)
                    <!-- Service Block Four -->
                    <div class="service-block-four col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="color-layer"></div>
                            <div class="icon-one" style="background-image: url({{ asset('/images/icons/icon-1.png') }})"></div>
                            <div class="icon-two" style="background-image: url({{ asset('images/icons/icon-2.png') }}"></div>
                            <div class="icon-three" style="background-image: url({{ asset('images/icons/icon-3.png') }}"></div>
                            <div class="icon-four" style="background-image: url({{ asset('images/icons/icon-4.png') }}"></div>
                            <div class="icon-box">
                                <img class="service-image-page filter-white-page" src="{{ asset('Service Images/'.$service->service_icon) }}">
                                <div class="icon-five" style="background-image: url({{ asset('images/icons/icon-6.png') }}"></div>
                            </div>
                            <h5><a href="{{ route('client.service',$service->id) }}">{{ $service->service_name }}</a></h5>
                            <div class="text">{{ $service->service_summary }}</div>
                            <a href="{{ route('client.service',$service->id) }}" class="arrow-icon flaticon-arrow-pointing-to-right"></a>
                        </div>
                    </div>
                @endforeach

			</div>
		</div>
	</section>
    <!-- End Services Page Section -->
@endsection

@push('footer-script')

<script>
    $('.service-block-four').hover(function(){
        $('.filter-white-page').css({'-webkit-filter':'brightness(0) invert(1) sepia(1) saturate(10000%) hue-rotate(88deg) contrast(0.35)','filter':'brightness(0) invert(1) sepia(1) saturate(10000%) hue-rotate(88deg) contrast(0.35)'});
    },function() {
        $('.filter-white-page').css({'-webkit-filter':'','filter':''});
    });
</script>
    
@endpush
