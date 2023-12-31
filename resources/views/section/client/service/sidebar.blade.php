
        <!-- Services -->
        <div class="sidebar-widget">
            <ul class="service-list">
                <li><a href="{{ route('client.services') }}"><span class="color-layer"></span>All Services</a></li>

                @foreach($services as $each_services)
                    <li @if($each_services->id == $service->id) class="current" @endif><a href="{{ route('client.service',$each_services->id) }}"><span class="color-layer"></span>{{ $each_services->service_name }}</a></li>
                @endforeach
            </ul>
        </div>

        <!-- Broucher Widget -->
        <div class="broucher-widget">
            <div class="widget-content" style="background-image: url(images/background/pattern-19.jpeg)">
                <h3>Download <br> Our Brochures</h3>
                <div class="icon flaticon-pdf-1"></div>
                <div class="text">Business is a marketing discipline focused on growing visibility in organic (non-paid) technic required.</div>
                <a href="#" class="download">Click here to download</a>
            </div>
        </div>

        <!-- Help Widget -->
        <div class="help-widget">
            <div class="widget-content">
                {{-- <h4>Need Help ?</h4> --}}
                <div class="d-flex justify-content-center">
                    <button id="enquiry-btn" type="button" class="theme-btn btn-style-two add-to-cart" data-toggle="modal" data-target="#enquireProduct"><span class="txt">Enquire</span></button>
                </div>
            </div>
        </div>
