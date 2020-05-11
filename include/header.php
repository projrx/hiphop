	<!-- Top Bar
		============================================= -->
		<div id="top-bar" style="background: #ececec">

			<div class="container clearfix">

				<div class="col_half nobottommargin d-none d-md-block" style="display: block !important;">

					<p class="nobottommargin"> <i class="icon-phone">	<strong> </i> Call:</strong><?php echo $sitephone ?> |  <i class="icon-envelope"></i> <strong> Email:</strong> <?php echo $sitemail ?></p>

				</div>

				<div class="col_half col_last fright nobottommargin">

					<!-- Top Links
						============================================= -->
						<div class="top-links">
							<ul>


								<?php 
								$rows =mysqli_query($con,"SELECT * FROM shop where status='cart' AND device='$device'" ) or die(mysqli_error($con));        $rowcount=mysqli_num_rows($rows);
								?>
								<li>
									<i class="hidden-md">
										<div id="top-cart" style="margin-top: 12px;">
											<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span><?php echo $rowcount ?></span> </a>

											<div style="width: 500px;z-index: 9999;" class="top-cart-content">
												<div class="top-cart-title">
													<h4>Shopping Cart</h4>
												</div>
												<table class="table table-striped">
													<thead>
														<tr>
															<td>Image</td><td style="min-width: 200px">Name</td><td>Size</td><td>Qty</td><td></td><td>Price</td>
														</tr>
													</thead>
													<tbody>

														<?php 
														$rows =mysqli_query($con,"SELECT * FROM shop where status='cart' AND device='$device'" ) or die(mysqli_error($con));
														$rowcount=mysqli_num_rows($rows);
														$n=0;      $stotal=0;

														while($row=mysqli_fetch_array($rows)){
															$oid = $row['id']; 
															$pid = $row['pid']; 
															$qty = $row['qty']; 
															$size = $row['size']; 


															$rowsx =mysqli_query($con,"SELECT name,price FROM product where id='$pid' " ) or die(mysqli_error($con));
															while($rowx=mysqli_fetch_array($rowsx)){

																$price = $rowx['price'];  
																$proname = $rowx['name']; 
																$total = $qty*$price;
																$stotal = $stotal+$total;

																$rowsxx =mysqli_query($con,"SELECT img FROM pimgs where pid='$pid'  and feat='1' LIMIT 1 " ) or die(mysqli_error($con));
																while($rowxx=mysqli_fetch_array($rowsxx)){
																	$image = $rowxx['img']; 
																}

																?>

																<tr>
																	<td><img src="images/products/<?php echo $image ?>" class="minicartimg"></td><td><?php echo $proname ?></td><td> <?php echo $size ?> </td><td> <?php echo $qty ?> </td><td> x </td><td><?php echo number_format($price) ?></td>
																</tr><tr>
																<?php } } ?>
															</tbody>
															<tfoot>
																<tr>
																	<td colspan="3" class="text-right">Total</td><td colspan="3">Rs.  <?php echo number_format($stotal) ?> </td>
																</tr>
																<tr>
																	<td colspan="6" class="bgcolor text-center">

																		<a href="cart.php" class="bgcolor textwhite"  > <div style="width: 100%"> <span class="hoverwhite"> View Cart </span> </div></a>
																	</td>
																</tr>
															</tfoot>


														</table>
													</div>

												</div><!-- #top-cart end -->
											</i>
										</li>
									</ul>
								</div><!-- .top-links end -->

							</div>

						</div>

					</div><!-- #top-bar end -->

		<!-- Header
			============================================= -->
			<header id="header" class="sticky-style-2">

				<div class="container clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<center>
				<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index" class="standard-logo" data-dark-logo="images/<?php echo $sitelogo ?>"><img src="images/<?php echo $sitelogo ?>" alt="Logo"></a>
						<a href="index" class="retina-logo" data-dark-logo="images/<?php echo $sitelogo ?>"><img src="images/<?php echo $sitelogo ?>" alt="Logo"></a>

					</div><!-- #logo end -->
				</center>
				<i class="deskhide mobdisplay">
					<div id="top-cart">
						<a href="cart.php" id=""><i class="icon-shopping-cart"></i><span>5</span></a>
					</div>
				</i>

			</div>
			<center>
				<div id="header-wrap">

				<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="style-2 bgcolor">

						<div class="container clearfix">


							<ul >
								


								<?php

								$rows =mysqli_query($con,"SELECT name,slug FROM productcat ORDER BY ordr" ) or die(mysqli_error($con));      
								while($row=mysqli_fetch_array($rows)){
									$slug = $row['slug']; 
									$name = $row['name'];
									?>

									<li><a href="products-<?php echo $slug ?>"><div> <?php echo $name ?> <i class="icon-chevron-down thin"></i></div></a>

										<ul class="dropdown-menu col-lg-6">
											<?php 
											$rowsx =mysqli_query($con,"SELECT name,slug FROM productsubcat WHERE pslug='$slug' ORDER BY ordr" ) or die(mysqli_error($con));      
											while($rowx=mysqli_fetch_array($rowsx)){
												$cslug = $rowx['slug']; 
												$cname = $rowx['name'];  ?>	
												<li style="display: block !important;"><a href="sproducts-<?php echo $cslug ?>"><div><?php echo $cname ?></div></a></li>
											<?php } ?>

										</ul>
									</li><!-- .mega-menu end -->
								<?php } ?>

							</ul>

						<!-- Top Cart
							============================================= -->
							<!-- #top-cart end -->

						</div>

					</nav><!-- #primary-menu end -->

				</div>

		</header><!-- #header end -->