@extends('client.layouts.app')

@section('content')

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Shop</h1>
				<span>Start Buying your Favourite Theme</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Shop</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row gutter-40 col-mb-80">
						<!-- Post Content
						============================================= -->
						<div class="postcontent col-lg-9 order-lg-last">

							<!-- Shop
							============================================= -->
							<div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/dress/1.jpg" alt="Checked Short Dress"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/dress/1-1.jpg" alt="Checked Short Dress"></a>
											<div class="sale-flash badge badge-secondary p-2">Out of Stock</div>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Checked Short Dress</a></h3></div>
											<div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-half-full"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/pants/1-1.jpg" alt="Slim Fit Chinos"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/pants/1.jpg" alt="Slim Fit Chinos"></a>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Slim Fit Chinos</a></h3></div>
											<div class="product-price">$39.99</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-half-full"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<div class="fslider" data-arrows="false">
												<div class="flexslider">
													<div class="slider-wrap">
														<div class="slide"><a href="#"><img src="{{asset('client')}}/images/shop/shoes/1.jpg" alt="Dark Brown Boots"></a></div>
														<div class="slide"><a href="#"><img src="{{asset('client')}}/images/shop/shoes/1-1.jpg" alt="Dark Brown Boots"></a></div>
														<div class="slide"><a href="#"><img src="{{asset('client')}}/images/shop/shoes/1-2.jpg" alt="Dark Brown Boots"></a></div>
													</div>
												</div>
											</div>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Dark Brown Boots</a></h3></div>
											<div class="product-price">$49</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-empty"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/dress/2.jpg" alt="Light Blue Denim Dress"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/dress/2-2.jpg" alt="Light Blue Denim Dress"></a>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Light Blue Denim Dress</a></h3></div>
											<div class="product-price">$19.95</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/sunglasses/1.jpg" alt="Unisex Sunglasses"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/sunglasses/1-1.jpg" alt="Unisex Sunglasses"></a>
											<div class="sale-flash badge badge-success p-2 text-uppercase">Sale!</div>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Unisex Sunglasses</a></h3></div>
											<div class="product-price"><del>$19.99</del> <ins>$11.99</ins></div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-empty"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/tshirts/1.jpg" alt="Blue Round-Neck Tshirt"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/tshirts/1-1.jpg" alt="Blue Round-Neck Tshirt"></a>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Blue Round-Neck Tshirt</a></h3></div>
											<div class="product-price">$9.99</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-half-full"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/watches/1.jpg" alt="Silver Chrome Watch"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/watches/1-1.jpg" alt="Silver Chrome Watch"></a>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Silver Chrome Watch</a></h3></div>
											<div class="product-price">$129.99</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-half-full"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/shoes/2.jpg" alt="Men Grey Casual Shoes"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/shoes/2-1.jpg" alt="Men Grey Casual Shoes"></a>
											<div class="sale-flash badge badge-success p-2 text-uppercase">Sale!</div>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Men Grey Casual Shoes</a></h3></div>
											<div class="product-price"><del>$45.99</del> <ins>$39.49</ins></div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-half-full"></i>
												<i class="icon-star-empty"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<div class="fslider" data-arrows="false">
												<div class="flexslider">
													<div class="slider-wrap">
														<div class="slide"><a href="#"><img src="{{asset('client')}}/images/shop/dress/3.jpg" alt="Pink Printed Dress"></a></div>
														<div class="slide"><a href="#"><img src="{{asset('client')}}/images/shop/dress/3-1.jpg" alt="Pink Printed Dress"></a></div>
														<div class="slide"><a href="#"><img src="{{asset('client')}}/images/shop/dress/3-2.jpg" alt="Pink Printed Dress"></a></div>
													</div>
												</div>
											</div>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Pink Printed Dress</a></h3></div>
											<div class="product-price">$39.49</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-empty"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/pants/5.jpg" alt="Green Trousers"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/pants/5-1.jpg" alt="Green Trousers"></a>
											<div class="sale-flash badge badge-success p-2 text-uppercase">Sale!</div>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Green Trousers</a></h3></div>
											<div class="product-price"><del>$24.99</del> <ins>$21.99</ins></div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-half-full"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/sunglasses/2.jpg" alt="Men Aviator Sunglasses"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/sunglasses/2-1.jpg" alt="Men Aviator Sunglasses"></a>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Men Aviator Sunglasses</a></h3></div>
											<div class="product-price">$13.49</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-empty"></i>
											</div>
										</div>
									</div>
								</div>

								<div class="product col-md-4 col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="{{asset('client')}}/images/shop/tshirts/4.jpg" alt="Black Polo Tshirt"></a>
											<a href="#"><img src="{{asset('client')}}/images/shop/tshirts/4-1.jpg" alt="Black Polo Tshirt"></a>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#">Black Polo Tshirt</a></h3></div>
											<div class="product-price">$11.49</div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
											</div>
										</div>
									</div>
								</div>

							</div><!-- #shop end -->

						</div><!-- .postcontent end -->

						<!-- Sidebar
						============================================= -->
						<div class="sidebar col-lg-3">
							<div class="sidebar-widgets-wrap">

								<div class="widget widget_links clearfix">

									<h4>Shop Categories</h4>
									<ul>
										<li><a href="#">Shirts</a></li>
										<li><a href="#">Pants</a></li>
										<li><a href="#">Tshirts</a></li>
										<li><a href="#">Sunglasses</a></li>
										<li><a href="#">Shoes</a></li>
										<li><a href="#">Bags</a></li>
										<li><a href="#">Watches</a></li>
									</ul>

								</div>

								<div class="widget clearfix">

									<h4>Recent Items</h4>
									<div class="posts-sm row col-mb-30" id="recent-shop-list-sidebar">
										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/1.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Blue Round-Neck Tshirt</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$29.99</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/6.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Checked Short Dress</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$23.99</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i><i class="icon-star-empty"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/7.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Light Blue Denim Dress</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$19.99</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="widget clearfix">

									<h4>Last Viewed Items</h4>
									<div class="posts-sm row col-mb-30" id="last-viewed-shop-list-sidebar">
										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/3.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Round-Neck Tshirt</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$15</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/10.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Green Trousers</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$19</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/11.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Silver Chrome Watch</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$34.99</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i><i class="icon-star-empty"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="widget clearfix">

									<h4>Popular Items</h4>
									<div class="posts-sm row col-mb-30" id="popular-shop-list-sidebar">
										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/8.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Pink Printed Dress</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$21</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/5.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Blue Round-Neck Tshirt</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$19.99</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<div class="entry col-12">
											<div class="grid-inner row no-gutters">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="{{asset('client')}}/images/shop/small/12.jpg" alt="Image"></a>
													</div>
												</div>
												<div class="col pl-3">
													<div class="entry-title">
														<h4><a href="#">Men Aviator Sunglasses</a></h4>
													</div>
													<div class="entry-meta no-separator">
														<ul>
															<li class="color">$14.99</li>
															<li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="widget clearfix">
									<iframe src="{{asset('client')}}///www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" style="border:none; overflow:hidden; width:100% !important; height: 290px;"></iframe>
								</div>

								<div class="widget subscribe-widget clearfix">

									<h4>Subscribe For Latest Offers</h4>
									<h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
									<form action="#" class="my-0">
										<div class="input-group mx-auto">
											<input type="text" class="form-control" placeholder="Enter your Email" required="">
											<div class="input-group-append">
												<button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
											</div>
										</div>
									</form>
								</div>

								<div class="widget clearfix">

									<div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false">

										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/1.png" alt="Clients"></a></div>
										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/2.png" alt="Clients"></a></div>
										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/3.png" alt="Clients"></a></div>
										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/4.png" alt="Clients"></a></div>
										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/5.png" alt="Clients"></a></div>
										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/6.png" alt="Clients"></a></div>
										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/7.png" alt="Clients"></a></div>
										<div class="oc-item"><a href="#"><img src="{{asset('client')}}/images/clients/8.png" alt="Clients"></a></div>

									</div>

								</div>

							</div>
						</div><!-- .sidebar end -->
					</div>

				</div>
			</div>
		</section><!-- #content end -->


@endsection


@section('script')
<script>
      function productDetailsModal(id) {

let url = "{{ route('client.getsingleProductdata') }}";
axios.post(url, {
        id: id
    })
    .then(function(response) {
        console.log(response.data);
        if (response.status == 200) {
            var jsonData = response.data;


            var url = `product/${jsonData[0].product_slug}`;



            var inStock = '';
            if (jsonData[0].product_in_stock == 0) {
                inStock = "STOCK OUT!"
            } else {
                inStock = "SALE!"
            }

            $('#pdTitle').html(jsonData[0].product_title);
            $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
            $('#pdMainPrice').html("&#2547;   " + jsonData[0].product_price);
            $('#inStock').html(inStock);
            $('#pdCategory').html(jsonData[0].cat.name);
            $('#pDescription').html(jsonData[0].product_discription);
            $('#product_ids').val(id);
            $('#modalSingleView').attr("href", url);




            var imageDiv = "";
            for (let index = 0; index < jsonData[0].img.length; index++) {
                const element = jsonData[0].img[index];
                imageDiv += '<div  class="slide">';
                imageDiv += '<a href="#" title="Pink Printed Dress - Front View">';
                imageDiv += '<img src="' + element.image_path + '" alt="Pink Printed Dress">';
                imageDiv += '</a>';
                imageDiv += '</div>';

            }

            $('.slider-wrap').html(imageDiv);

            var maserment = "";
            for (let index = 0; index < jsonData[0].maserment.length; index++) {
                const element = jsonData[0].maserment[index];
                checked = ""
                if (index == 0) {
                    checked = "checked"
                } else {
                    checked = ""
                }

                maserment += '<div>';
                maserment += '<input type="radio" id="' + element.meserment_value + '" name="maserment" ' +
                    checked + ' value="' + element.meserment_value + '">';
                maserment += '<label for="' + element.meserment_value +
                    '"><span style="background-color:#000;"></span></label>';
                maserment += '<span>' + element.meserment_value + '</span>&nbsp;';
                maserment += '</div>';

            }

            $('.meserment-choose').html(maserment);




            var color = "";
            for (let index = 0; index < jsonData[0].color.length; index++) {
                const elementColor = jsonData[0].color[index];

                colorChecked = ""
                if (index == 0) {
                    colorChecked = "checked"
                } else {
                    colorChecked = ""
                }
                color += '<div>';
                color += '<input type="radio" id="' + elementColor.product_color_code + '" name="color" ' +
                    colorChecked + ' value="' + elementColor.product_color_code + '">';
                color += '<label for="' + elementColor.product_color_code +
                    '"><span style="background-color:' + elementColor.product_color_code +
                    ';"></span></label>';
                color += '</div>';

            }

            $('.color-choose').html(color);




        } else {

        }
    }).catch(function(error) {

    });
}













// Add to cart


$('#cartForm').on('submit', function(event) {
event.preventDefault();
let formData = $(this).serializeArray();
let meserment = formData[0]['value'];
let color = formData[1]['value'];
let quantity = formData[2]['value'];
let product_ids = formData[3]['value'];
console.log(formData);
let url = "{{ route('client.addCart') }}";
axios.post(url, {
    meserment: meserment,
    color: color,
    quantity: quantity,
    product_id: product_ids
}).then(function(response) {
    console.log(response.data);
    if (response.status == 200 && response.data == 1) {
        $('.bd-example-modal-lg').modal('hide');
        toastr.success('Product Add Successfully');
        getcartData()
    } else {
        toastr.error('Product not Added ! Try Again');
    }

}).catch(function(error) {
    toastr.error('Product not Added  ! Something Error');
})


})





getcartData()

function getcartData() {

axios.get("{{ route('client.cartData') }}")
    .then(function(response) {

        if (response.status = 200) {
            var dataJSON = response.data;
            var cartData = dataJSON.cart;

            var a = Object.keys(cartData).length;


            $("#cart_quantity").html(a);
            var tp = parseFloat(dataJSON.total).toFixed(2);
            $("#total_cart_price").html(' &#2547; ' + tp);

            var imageViewHtml = "";
            $.each(cartData, function(i, item) {
                imageViewHtml += `<div class="top-cart-item">
                                         <div class="top-cart-item-image">
                                             <a href="#"><img src="${cartData[i].image}"
                                                     alt="Blue Round-Neck Tshirt" /></a>
                                         </div>
                                         <div class="top-cart-item-desc">
                                             <div class="top-cart-item-desc-title">
                                                 <a href="#">${cartData[i].title}</a>
                                                 <span class="top-cart-item-price d-block"> ${cartData[i].quantity} x &#2547; ${cartData[i].unit_price}</span>
                                             </div>
                                             <div class="top-cart-item-quantity"><button class="cartDeleteIcon" data-id="${i}" type="submit"><i class="icon-remove"> </i></button></div>
                                         </div>
                                </div>`
            });


            $('.top-cart-items').html(imageViewHtml);

            console.log(a);

            if (a == 0) {
                $("#HeaderPreview").css("display", "none");
            } else {
                $("#HeaderPreview").css("display", "block");
            }


            //Carts click on delete icon
            $(".cartDeleteIcon").click(function() {
                var id = $(this).data('id');
                $('#CartsDeleteId').html(id);
                DeleteDataCart(id);
            })
        } else {
            toastr.error('Something Went Wrong');
        }
    }).catch(function(error) {

        toastr.error('Something Went Wrong...');
    });
}












$('#confirmDeleteCart').click(function() {


alert("hello")
var id = $(this).data('id');
DeleteDataCart(id);
})


//delete Cart function
function DeleteDataCart(id) {

axios.post("{{ route('client.cartRemove') }}", {
        product_id: id
    })
    .then(function(response) {

        if (response.status == 200) {
            toastr.success('Cart Removed Success.');
            getcartData();
        } else {
            toastr.error('Something Went Wrong');
        }
    }).catch(function(error) {

        toastr.error('Something Went Wrong......');
    });
}

</script>
@endsection
