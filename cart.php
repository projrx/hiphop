<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
		============================================= -->
		<title>Cart | HipHop</title>

	</head>

	<body class="stretched">

	<!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">

		<!-- Header
			============================================= -->
			<?php 	include 'include/header.php'; ?>

			<div class="container">
				<br><br>


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-md-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">

					<div class="row">
						<div class="col-md-2">Image
						</div>
						<div class="col-md-3">
							<span class="btn-link">Product name</span>
						</div>
						<div class="col-md-6">
							<div class="row">
							<div class="col-md-5 text-center">

								<span >Price</span>
							</div>
							<div class="col-md-2">
								<span>Quantity</span>
							</div>
							<div class="col-md-2">Remove						</div>
							<div class="col-md-3 text-right">
								<span>Total Price</span>
							</div>
						</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2"><img class="img-responsive" src="images/products/s1.jpg" width="100px;">
						</div>
						<div class="col-md-3">
							<span class="btn-link">Product name</span>
							<br><span><small>Product description</small></span	>
						</div>
						<div class="col-md-6">
							<div class="row">
							<div class="col-md-5 text-center">

								<span >Rs. 2000/ <t class="und btn-link">Rs.  400/-</t></span>
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" value="1">
							</div>
							<div class="col-md-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> X</span>
								</button>
							</div>
							<div class="col-md-3 text-right">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> Rs. 5,000</span>
								</button>
							</div>
						</div>
						</div>
					</div>
					<hr>


				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-9">
						</div>
						<div class="col-md-1">
														<h4 class="text-left">Total</h4>

						</div>
						<div class="col-md-2">
														<h4 class="text-right"> <strong>Rs. 5,000</strong></h4>

						</div>
					</div>

					<div class="row">
						<div class="col-md-9">
						</div>
						<div class="col-md-3">
													
    <button onchange="" class="pbtn" style="background: black; color:white"> Update Cart</button>
    </a>
    <br>

    <button class="pbtn bgcolor"> Checkout </button>


						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

				<br>

			</div>

		<!-- Footer
			============================================= -->

			<?php  	include 'include/footer.php'; ?>

			
		</div><!-- #wrapper end -->

	</body>
	</html>