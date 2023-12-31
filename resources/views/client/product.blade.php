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
    @php
        $product_images = json_decode($product->product_image->image_names);
    @endphp

<!-- Enquiry Modal -->
<div class="modal fade" id="enquireProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="viewProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>
	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

				<!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
					<div class="shop-single">
                    	<div class="product-details">

                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                        <figure class="image-box owl-carousel owl-theme">
                                            @foreach ($product_images as $product_image)
                                                <a href="{{ asset('Product Images/'.$product_image) }}" class="lightbox-image item" title="Image Caption Here"><img src="{{ asset('Product Images/'.$product_image) }}" alt=""></a>
                                            @endforeach
                                        </figure>
                                    </div>
                                    <div class="info-column col-md-6 col-sm-6 col-xs-12">
                                        <div class="details-header">
                                            <h4>{{ $product->product_name }}</h4>
                                        </div>

                                        <div class="text">
                                            <p>{{ $product->product_summary }}</p>
                                        </div>
                                        <div class="other-options clearfix">
                                            <button id="enquiry-btn" type="button" class="theme-btn btn-style-two add-to-cart" data-toggle="modal" data-target="#enquireProduct"><span class="txt">Enquire</span></button>
                                        </div>
									</div>
                                </div>
                            </div>
                            <!--Basic Details-->

                            <!--Product Info Tabs-->
                            <div class="product-info-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">

                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-details" class="tab-btn active-btn">Description</li>
                                        {{-- <li data-tab="#prod-reviews" class="tab-btn">Reviews (2)</li> --}}
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        <!--Tab / Active Tab-->
                                        <div class="tab active-tab" id="prod-details">
                                            <div class="content">
                                                <p>{{ $product->product_description }}</p>
                                            </div>
                                        </div>

                                        <!--Tab-->
                                        {{-- <div class="tab" id="prod-reviews">
                                        	<h2 class="title">2 Reviews For win Your Friends</h2>
                                            <!--Reviews Container-->
                                            <div class="comments-area">
                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img src="images\resource\author-1.png" alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">Steven Rich – Sep 17, 2020</div>
                                                            <div class="rating">
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star light"></span>
                                                            </div>
                                                            <div class="text">How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Comment Box-->
                                                <div class="comment-box reply-comment">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img src="images\resource\author-2.png" alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">William Cobus – Aug 21, 2020</div>
                                                            <div class="rating">
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star-half-empty"></span>
                                                            </div>
                                                            <div class="text">There anyone who loves or pursues or desires to obtain pain itself, because it is pain sed, because occasionally circumstances occur some great pleasure.</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Comment Form -->
                                            <div class="shop-comment-form">
                                                <h2>Add Your Comments</h2>
                                                <div class="rating-box">
                                                    <div class="text"> Your Rating:</div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                    </div>
                                                </div>
                                                <form method="post" action="contact.html">
                                                    <div class="row clearfix">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                        	<label>First Name *</label>
                                                            <input type="text" name="username" placeholder="" required="">
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                        	<label>Last Name*</label>
                                                            <input type="email" name="email" placeholder="" required="">
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                        	<label>Email*</label>
                                                            <input type="text" name="number" placeholder="" required="">
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                        	<label>Your Comments*</label>
                                                            <textarea name="message" placeholder=""></textarea>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                            <button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="txt">Submit now</span></button>
                                                        </div>

                                                    </div>
                                                </form>

                                            </div>

                                        </div> --}}

                                    </div>
                                </div>

                            </div>
                            <!--End Product Info Tabs-->

                            <!--Related Products-->
                            {{-- <div class="related-products">
                                <h2>Related Products</h2>
                                <div class="row clearfix">
                                	<!--Shop Item-->
                                    <div class="shop-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images\resource\products\4.jpeg" alt="">
                                                <div class="overlay-box">
                                                    <ul class="cart-option">
                                                        <li><a href="shop-single.htm"><span class="flaticon-shopping-cart-1"></span></a><span class="tooltip-data">Add to Cart</span></li>
                                                        <li><a href="shop-single.htm"><span class="fa fa-heart-o"></span></a><span class="tooltip-data">Add to Whishlist</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="lower-content">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <h3><a href="shop-single.htm">Product 01</a></h3>
                                                    </div>
                                                    <div class="pull-right">
                                                        <!--Rating-->
                                                        <div class="rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">$29.00</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Shop Item-->
                                    <div class="shop-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images\resource\products\5.jpeg" alt="">
                                                <div class="overlay-box">
                                                    <ul class="cart-option">
                                                        <li><a href="shop-single.htm"><span class="flaticon-shopping-cart-1"></span></a><span class="tooltip-data">Add to Cart</span></li>
                                                        <li><a href="shop-single.htm"><span class="fa fa-heart-o"></span></a><span class="tooltip-data">Add to Whishlist</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="lower-content">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <h3><a href="shop-single.htm">Product 02</a></h3>
                                                    </div>
                                                    <div class="pull-right">
                                                        <!--Rating-->
                                                        <div class="rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>

                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-o"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">$29.00</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Shop Item-->
                                    <div class="shop-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images\resource\products\6.jpeg" alt="">
                                                <div class="overlay-box">
                                                    <ul class="cart-option">
                                                        <li><a href="shop-single.htm"><span class="flaticon-shopping-cart-1"></span></a><span class="tooltip-data">Add to Cart</span></li>
                                                        <li><a href="shop-single.htm"><span class="fa fa-heart-o"></span></a><span class="tooltip-data">Add to Whishlist</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="lower-content">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <h3><a href="shop-single.htm">Product 03</a></h3>
                                                    </div>
                                                    <div class="pull-right">
                                                        <!--Rating-->
                                                        <div class="rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-half-empty"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">$34.99</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
				</div>

				<!-- Sidebar Side -->
                {{-- <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">

						<!-- Search -->
						<div class="sidebar-widget search-box">
							<form method="post" action="contact.html">
								<div class="form-group">
									<input type="search" name="search-field" value="" placeholder="Search Here" required="">
									<button type="submit"><span class="icon fa fa-search"></span></button>
								</div>
							</form>
						</div>

						<!-- Categories Widget -->
						<div class="sidebar-widget categories-widget">
							<div class="sidebar-title">
								<h4>Categories</h4>
							</div>
							<div class="widget-content">
								<ul class="blog-cat">
									<li><a href="#">Content Marketing <span>( 01 )</span></a></li>
									<li><a href="#">Social Marketing  <span>( 25 )</span></a></li>
									<li><a href="#">App Development <span>( 66 )</span></a></li>
									<li><a href="#">SEO Optimization <span>( 12 )</span></a></li>
									<li><a href="#">Web Development <span>( 11 )</span></a></li>
									<li><a href="#">PPC Advertising <span>( 02 )</span></a></li>
								</ul>
							</div>
						</div>

						<!-- Categories Widget -->
						<div class="sidebar-widget popular-posts">
							<div class="sidebar-title">
								<h4>Recent Post</h4>
							</div>
							<div class="widget-content">
								<article class="post">
									<figure class="post-thumb"><img src="images\resource\post-thumb-1.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<div class="text"><a href="news-detail.htm">Google now disregards overlooks all links.</a></div>
									<div class="post-info">November 21, 2020</div>
								</article>
								<article class="post">
									<figure class="post-thumb"><img src="images\resource\post-thumb-2.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<div class="text"><a href="news-detail.htm">How to increase your ROI through scientific SEM?</a></div>
									<div class="post-info">November 28, 2020</div>
								</article>
								<article class="post">
									<figure class="post-thumb"><img src="images\resource\post-thumb-3.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<div class="text"><a href="news-detail.htm">A Guide to Google SEO <br> Algorithm Updates</a></div>
									<div class="post-info">December 04, 2020</div>
								</article>
							</div>
						</div>

						<!-- Instagram Widget -->
						<div class="sidebar-widget instagram-widget">
							<div class="sidebar-title">
								<h4>Instagram</h4>
							</div>
							<div class="widget-content">
								<div class="clearfix">
									<figure class="post-thumb"><img src="images\resource\instagram-1.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images\resource\instagram-2.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images\resource\instagram-3.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images\resource\instagram-4.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images\resource\instagram-5.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images\resource\instagram-6.jpeg" alt=""><a href="news-detail.htm" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								</div>
							</div>
						</div>

						<!-- Popular Posts -->
						<div class="sidebar-widget popular-tags">
							<div class="sidebar-title">
								<h4>Tags</h4>
							</div>
							<div class="widget-content">
								<a href="#">Business</a>
								<a href="#">Marketing</a>
								<a href="#">SEO</a>
								<a href="#">SEO</a>
								<a href="#">SMM</a>
								<a href="#">Solution</a>
								<a href="#">Tips</a>
								<a href="#">Startup</a>
								<a href="#">Strategy</a>
							</div>
						</div>

					</aside>
				</div> --}}

			</div>
		</div>
	</div>

@endsection

@push('footer-script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true
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
                                        <form method="post" action="sendemail.php" id="enquiry-form">
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
                        'enquiry_id': '{{ $product->id }}',
                        'enquiry_name': $('#enquiryName').val(),
                        'enquiry_email': $('#enquiryEmail').val(),
                        'enquiry_phone': $('#enquiryPhone').val(),
                        'enquiry_message': $('#enquiryMessage').val(),
                    };

                    if (result.isConfirmed) {
                        $.ajax({
                            url:'{{ route('admin.enquiry.product.store') }}',
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
