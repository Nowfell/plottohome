@extends('layout.client.app')

@section('content')

	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

				<!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
					<div class="shop-section">

						<!-- Sort By -->
                        {{-- <div class="items-sorting">
                        	<div class="row clearfix">
                                <div class="results-column col-lg-8 col-md-8 col-sm-12">
                                    <h4>Showing 1-9 of 12 results</h4>
                                </div>
                                <div class="select-column pull-right col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <select name="sort-by">
                                            <option>Default Sorting
                                            <option>By Order
                                            <option>By Price
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

						<div class="row clearfix">

                            @foreach($products as $product)
                                @php
                                    $product_first_image = json_decode($product->product_image->image_names)[0];
                                @endphp
                                <!--Shop Item-->
                                <div class="shop-item col-lg-4 col-md-6 col-sm-6 col-xs-12" data-product-url="{{ route('client.product',$product->id) }}">
                                    <div class="inner-box">
                                        <div class="image">
                                            <img src="{{ asset('Product Images/'.$product_first_image) }}" alt="">
                                            <div class="overlay-box" style="cursor: pointer;">
                                                {{-- <ul class="cart-option">
                                                    <li><a href="shop-single.htm"><span class="flaticon-shopping-cart-1"></span></a><span class="tooltip-data">Add to Cart</span></li>
                                                    <li><a href="shop-single.htm"><span class="fa fa-heart-o"></span></a><span class="tooltip-data">Add to Whishlist</span></li>
                                                </ul> --}}
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="clearfix">
                                                <div class="text-center">
                                                    <h3><a href="javascript:void(0);">{{ $product->product_name }}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

						<!-- Post Share Options -->
						{{-- <div class="styled-pagination text-center">
							<ul class="clearfix">
								<li class="prev"><a href="#"><span class="fa fa-angle-left"></span> </a></li>
								<li><a href="#">01</a></li>
								<li class="active"><a href="#">02</a></li>
								<li><a href="#">03</a></li>
								<li class="next"><a href="#"><span class="fa fa-angle-right"></span> </a></li>
							</ul>
						</div> --}}

					</div>
				</div>

			</div>
		</div>
	</div>

@endsection

@push('footer-script')
    <script>
        $('.shop-item').hover(function(){
            $('.shop-item .inner-box .lower-content h3 a').css('color','#e82a6a');
        },function(){
            $('.shop-item .inner-box .lower-content h3 a').css('color','');
        })
        $('body').on('click','.shop-item',function(){
            window.location.href = $(this).data('product-url');
        })
    </script>
@endpush
