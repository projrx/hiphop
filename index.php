<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
		============================================= -->
		<title>HipHop Kids | Homepage</title>

		<style type="text/css">
			.slideimg{
				height: 645px !important;
				max-height: 645px !important;
			}
			
			#logo{
				margin-left: 45%
			}

			@media (max-width: 576px) {
				.slideimg { 
					max-width: 540px; 
					height: 240px !important;
					max-height: 240px !important;
				}
				#logo{
					margin-left: 4%
				}

				.mobhide{
					display: none;
				}

				.mobdisplay{
					display: block !important;
				}
				#top-bar .col_half {
					display: none;
				}

				#header.sticky-style-2 #header-wrap, #header.sticky-style-3 #header-wrap {
					min-height: 0px;
				}
				#primary-menu > div > ul {
					padding-top: 6px !important;
				}


				.homeimg{
					width: 100%;
					height: 400px !important;

				}


			}



			#primary-menu ul li:hover > a, #primary-menu ul li.current > a {
				color: #ffffff;
			}


			.sf-js-enabled{
				width: 100%;

			}



			#primary-menu.style-2 > div > ul > li > a {
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 15px;
				font-weight: 200;
			}
			#primary-menu ul li > a i {
				position: relative;
				top: 0px;
				font-size: 11px;
				width: 16px;
				text-align: center;
				margin-right: 6px;
				vertical-align: top;
			}

			.deskhide{
				display: none;
			}

			.deskdisplay{
				display: block;
			}


			#header.sticky-style-2 {
				height: 142px;
			}
			#header.sticky-header:not(.static-sticky), #header.sticky-header:not(.static-sticky) #header-wrap, #header.sticky-header:not(.static-sticky):not(.sticky-style-2):not(.sticky-style-3) #logo img {
				height: 42px;
			}


			.homeimg{
				width: 100%;
				height: 600px;
				opacity: 1;
				font-size: 8px;

				transition: linear 0.2s;

			}

			.homeimg:hover{
				opacity: 0.5;
				font-size: 5px;
			}

			.homebg{
				background: #ecbf0c;
				padding:6px;
				margin-bottom: 15px;
				font-size: 16px;
				transition: linear 0.2s;


			}

			.homebg:hover .hometext{
				font-size: 18px;
				
			}
			

			.hometext{
				color: black;
				padding:10px;
				font-weight: 200;
				transition: linear 0.2s;
				font-size: 16px;


			}

			
		</style>

	</head>

	<body class="stretched">

	<!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">

		<!-- Header
			============================================= -->
			<?php 	include 'include/header.php'; ?>


			<div class="fslider"  data-arrows="true">
				<div class="flexslider">
					<div class="slider-wrap">
						<div class="slide">
							<a href="#">
								<img class="slideimg" src="images/logo2.jpg" alt="Shop Image">
							</a>
						</div>

						<div class="slide">
							<a href="#">
								<img class="slideimg" src="images/slider/slider2.jpg" alt="Shop Image">
							</a>
						</div>

					</div>
				</div>
			</div>
			<br><br>
			<div class="container">
				<div class="row">

					<div class="col-md-6">
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/boy11.jpg" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="#"><span class="hometext">Boy</span></a></center></div>
					</div>
					<div class="col-md-6">
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/kid1.jpg" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="#"><span class="hometext">Little Boy</span></a></center></div>
					</div>
				</div>
				<div class="row">

					<div class="col-md-6">
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/p2.jpg" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="#"><span class="hometext">Little Girl</span></a></center></div>
					</div>
					<div class="col-md-6">
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/p6.jpg" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="#"><span class="hometext">Girl</span></a></center></div>
					</div>
				</div>
			</div>













<br><br>


<div class="fancy-title title-dotted-border title-center">
						<h2>Our  <span>Featured</span> Products</h2>
					</div>
<br><br>




			<div class="container">

			<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">

				

				<div class="oc-item">
					<div class="iportfolio">
						<div class="portfolio-image">
							<a href="#">
								<img src="images/products/boy11.jpg" alt="Workspace Stuff">
							</a>
							<div class="portfolio-overlay">
								<a href="https://vimeo.com/89396394" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="portfolio-single-video.html">T-Shirt Yellow</a></h3>
							<span>Price: <strong>Rs. 2000/-</strong></span>
						</div>
					</div>
				</div>

				<div class="oc-item">
					<div class="iportfolio">
						<div class="portfolio-image">
							<a href="portfolio-single.html">
								<img src="images/products/p1.jpg" alt="Workspace Stuff">
							</a>
							<div class="portfolio-overlay">
								<a href="images/portfolio/full/5.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="portfolio-single.html">Console Shirt</a></h3>
							<span>Price: <strong>Rs. 5900/-</strong></span>
						</div>
					</div>
				</div>

				<div class="oc-item">
					<div class="iportfolio">
						<div class="portfolio-image">
							<a href="portfolio-single-video.html">
								<img src="images/products/girl2.jpg" alt="Workspace Stuff">
							</a>
							<div class="portfolio-overlay">
								<a href="https://www.youtube.com/watch?v=kuceVNBTJio" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="portfolio-single-video.html">Skirt Red</a></h3>
							<span>Price: <strong>Rs. 850/-</strong></span>
						</div>
					</div>
				</div>

				<div class="oc-item">
					<div class="iportfolio">
						<div class="portfolio-image">
							<a href="portfolio-single.html">
								<img src="images/products/p8.jpg" alt="Workspace Stuff">
							</a>
							<div class="portfolio-overlay">
								<a href="images/portfolio/full/8.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="portfolio-single.html">Shirt Glow</a></h3>
							<span>Price: <strong>Rs. 2000/-</strong></span>
						</div>
					</div>
				</div>

				<div class="oc-item">
					<div class="iportfolio">
						<div class="portfolio-image">
							<a href="portfolio-single-video.html">
								<img src="images/products/p6.jpg" alt="Workspace Stuff">
							</a>
							<div class="portfolio-overlay">
								<a href="https://vimeo.com/91973305" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="portfolio-single-video.html">Pink Dress Shirts</a></h3>
							<span>Price: <strong>Rs. 3500/-</strong></span>
						</div>
					</div>
				</div>

				<div class="oc-item">
					<div class="iportfolio">
						<div class="portfolio-image">
							<a href="portfolio-single.html">
								<img src="images/products/p1.jpg" alt="Workspace Stuff">
							</a>
							<div class="portfolio-overlay">
								<a href="images/portfolio/full/11.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="portfolio-single.html">Workspace Stuff</a></h3>
							<span><a href="#">Media</a>, <a href="#">Icons</a></span>
						</div>
					</div>
				</div>
			</div>












		</div>

		<!-- Footer
			============================================= -->

			<?php  	include 'include/footer.php'; ?>

			
		</div><!-- #wrapper end -->

	</body>
	</html>