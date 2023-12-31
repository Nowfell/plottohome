@extends('layout.client.app')

@push('header-script')
    <style>
        .swal2-styled{
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
@endpush

@section('content')
    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

				<!-- Sidebar Side -->
                <div class="sidebar-side left-sidebar col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">

						<!-- Services -->
                        @include('section.client.service.sidebar')

                    </aside>
                </div>

				<!-- Content Side -->
                <div class="content-side right-sidebar col-lg-8 col-md-12 col-sm-12">
                	<div class="service-detail">
						<div class="inner-box">
							{!! $service->service_description !!}
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Sidebar Page Container -->
@endsection

@push('footer-script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            // $('#enquireProduct').modal('show');
            $('#enquiry-btn').on('click',function(){
                swal.fire({
                    html:
                        `
                        <!-- Contact Form Section -->
                        <section class="contact-form-section enquiry-form-override mt-5">
                            <div class="auto-container">
                                <div class="inner-container">

                                    <!-- Contact Form -->
                                    <div class="contact-form">

                                        <!--Contact Form-->
                                        <form method="post" id="enquiry-form">
                                            <div class="row clearfix">

                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <span class="icon flaticon-user-2"></span>
                                                    <input id="enquiryName" type="text" name="enquiryname" placeholder="Your Name" required="">
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <span class="icon flaticon-phone-call"></span>
                                                    <input id="enquiryPhone" type="text" name="enquiryphone" placeholder="Your Phone" required="">
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <span class="icon flaticon-big-envelope"></span>
                                                    <input id="enquiryEmail" type="email" name="enquiryemail" placeholder="Email" required="">
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <span class="icon flaticon-message"></span>
                                                    <textarea id="enquiryMessage" name="enquirymessage" placeholder="Message"></textarea>
                                                </div>

                                            </div>
                                        </form>

                                        <!--End Contact Form -->
                                    </div>

                                </div>
                            </div>
                        </section>
                        <!-- End Contact Form Section -->
                        `,
                    showCloseButton: true,
                    showCancelButton: false,
                    focusConfirm: true,
                    confirmButtonText:
                        `
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
                                <button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Submit Now</span></button>
                            </div>
                        `,
                    confirmButtonAriaLabel: 'Submit Now'
                }).then(function(result){

                    var formData = {
                        'enquiry_id': '{{ $service->id }}',
                        'enquiry_name': $('#enquiryName').val(),
                        'enquiry_email': $('#enquiryEmail').val(),
                        'enquiry_phone': $('#enquiryPhone').val(),
                        'enquiry_message': $('#enquiryMessage').val(),
                    };

                    if (result.isConfirmed) {
                        $.ajax({
                            url:'{{ route('admin.enquiry.service.store') }}',
                            type:'POST',
                            data:formData,
                            success:function(result){
                                swal.fire(
                                'Enquiry Submitted Succesfully',
                                'Your enquiry has been submitted succesfully. We will contact you soon.',
                                'success'
                                )
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
