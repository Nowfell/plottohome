@extends('layout.client.app')

@push('header-script')
    <style>
        .swal2-styled {
            margin: 0 !important;
            padding: 0 !important;
        }
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            text-indent: 1px;
            text-overflow: '';
        }
        select::-ms-expand {
            display: none;
        }
        option:first-of-type {
            display: none;
        }
        option {
            color: #222222;
        }
    </style>
@endpush

@section('content')
{{-- {{ dd(get_defined_vars()['__data']) }} --}}
    <!-- Gallery Section -->
    <section class="gallery-section">
		<div class="pattern-layer" style="background-image: url(images/resource/cta-bg.png)"></div>
    	<div class="auto-container">
			<!-- MixitUp Galery -->
			<div class="mixitup-gallery">
				
				{{-- <div class="sec-title">
					<div class="clearfix">
						
						<div class="pull-left">
							<div class="title">RECENT PROJECTS</div>
							<h2>Our Latest Case Works</h2>
						</div>
						
						<div class="pull-right">
							<!--Filter-->
							<div class="filters clearfix">
								
								<ul class="filter-tabs filter-btns clearfix">
									<li class="active filter" data-role="button" data-filter="all">All</li>
									<li class="filter" data-role="button" data-filter=".development">Development</li>
									<li class="filter" data-role="button" data-filter=".marketing">Markeging</li>
									<li class="filter" data-role="button" data-filter=".media">Media</li>
									<li class="filter" data-role="button" data-filter=".optimization">Optimization</li>
								</ul>
								
							</div>
						</div>
						
					</div>
				</div> --}}
				
				<div class="row clearfix">

                    @foreach($careers as $career)
                        
                        <!-- Gallery Block -->
                        <div class="gallery-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ asset('Career Images/'.$career->image_name) }}" alt="">
                                    <!-- Overlay Box -->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <div class="btn-box">
                                                    <a href="javascript:void(0);" data-career-id="{{ $career->id }}" id="enquiry-btn" class="theme-btn btn-style-two"><span class="txt">Apply</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="lower-content">
                                    <div class="title">{{ $career->career_name }}</div>
                                    <h5><a href="{{ route('client.career',$career->id) }}">{{ $career->career_summary }}</a></h5>
                                </div>
                            </div>
                        </div>

                    @endforeach
				
				{{-- <div class="btn-box text-center">
					<a href="projects.htm" class="theme-btn btn-style-three"><span class="txt">View More</span></a>
				</div> --}}
				
			</div>
		</div>
	</section>
	<!-- End Gallery Section -->
@endsection

@push('footer-script')

<script>
    $(function(){
            // $('#enquireProduct').modal('show');
            $('body').on('change','select',function(){
                if(!$(this).find('option:selected').prop('disabled'))
                    $(this).attr('style','');
            });
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
                                        <form method="post" id="enquiry-form" enctype="multipart/form-data">
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
                                                    <span class="icon flaticon-planet-earth"></span>
                                                    <select id="enquiryNationality" name="enquirynationality" style="color: #6c757d !important;">
                                                        <option disabled selected>Select Your Nationality</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country['nationality'] }}">{{ $country['nationality'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <i style="font-weight:initial;" class="icon fa fa-briefcase"></i>
                                                    <input id="enquiryExperience" type="text" name="enquirexperience" placeholder="Year Of Experience" required="">
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <i style="font-weight:initial;" class="icon fa fa-university"></i>
                                                    <select id="enquiryEducation" name="enquireducation" style="color: #6c757d !important;">
                                                        <option disabled selected>Qualification</option>
                                                        <option value="Higher Secondary">Higher Secondary</option>
                                                        <option value="Bachelor Degree">Bachelor Degree</option>
                                                        <option value="Post Graduate">Post Graduate</option>
                                                        <option value="Distance">Distance</option>
                                                        <option value="Diploma">Diploma</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <input id="enquiryUpload" type="text" style="cursor:pointer;padding-right: 47px;" name="enquiruploadcv" placeholder="Upload CV" required="" readonly>
                                                    <label class="file-upload-browse theme-btn" id="pdfUploadLabel" type="button"><input type="file" name="career_pdf" class="file-upload-default" style="display:none;" accept=".pdf" /><i style="font-weight:initial;" class="icon fa fa-upload"></i></label>
                                                </div>

                                                <!--<div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <span class="icon flaticon-message"></span>
                                                    <textarea id="enquiryMessage" name="enquirymessage" placeholder="Message"></textarea>
                                                </div>--!>

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

                    var formData = new FormData();

                    formData.append('_token',"{{ csrf_token() }}");
                    formData.append('enquiry_id',$('#enquiry-btn').data('career-id'));
                    formData.append('enquiry_name',$('#enquiryName').val());
                    formData.append('enquiry_email',$('#enquiryEmail').val());
                    formData.append('enquiry_phone',$('#enquiryPhone').val());
                    formData.append('enquiry_nationality',$('#enquiryNationality').val());
                    formData.append('enquiry_experience',$('#enquiryExperience').val());
                    formData.append('enquiry_education',$('#enquiryEducation').val());
                    formData.append('enquiry_upload_cv',$('#pdfUploadLabel > input')[0].files[0]);

                    // var formData = {
                    //     'enquiry_id': $('#enquiry-btn').data('career-id'),
                    //     'enquiry_name': $('#enquiryName').val(),
                    //     'enquiry_email': $('#enquiryEmail').val(),
                    //     'enquiry_phone': $('#enquiryPhone').val(),
                    //     'enquiry_nationality': $('#enquiryNationality').val(),
                    //     'enquiry_experience': $('#enquiryExperience').val(),
                    //     'enquiry_education': $('#enquiryEducation').val(),
                    //     'enquiry_upload_cv': $('#pdfUploadLabel > input')[0].files[0],
                    // };

                    if (result.isConfirmed) {
                        $.ajax({
                            url:'{{ route('admin.enquiry.career.store') }}',
                            type:'POST',
                            contentType: false,
                            processData: false,
                            data:formData,
                            success:function(result){
                                swal.fire(
                                'Submitted Succesfully',
                                'Your details has been submitted succesfully. We will contact you soon.',
                                'success'
                                )
                            }
                        });
                    }
                })
            });
            $('body').on('click', '#enquiryUpload', function(){
                // alert($(this).parent('div').find('input[type=file]').html());
                $(this).parent('div').find('input[type=file]').trigger('click');
            });
            $('body').on('change','#pdfUploadLabel > input', function(){
                var file = $(this)[0].files[0].name;
                $(this).parent('label').parent('div').find('#enquiryUpload').val(file);
            });
        });
</script>
    
@endpush
