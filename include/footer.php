	<div style="background: #f7f7f7;    padding: 60px;" class="">

		<center>
			<h4>Subscribe to our newsletter</h4>
			
			<p>Signup for our newsletter to stay up to date on sales and events.</p>

			
			
			<div class="">
				<input style="background: #00000000;min-width: 40%; border:1px solid black; padding: 10px; border-radius: 1px;color:white" type="email" name="contact[email]" id="Email" class="input-group__field newsletter__input" value="" placeholder="Enter Email Address" autocorrect="off" autocapitalize="off">
				<br>
				<button style="   min-width: 150px;    margin-left: -5px; background: #fdd01f; border:none; padding: 10px; border-radius: 1px;color:white" type="submit" class="btn newsletter__submit" name="commit" id="Subscribe">
					<span style="   min-width: 150px;    margin-left: -5px; border:none; padding: 10px; border-radius: 1px;color:white" class="newsletter__submit-text--large">Join</span>
				</button>
			</div>
			<br>
			<center>
				<a href="<?php echo $facebook ?>">
				<i style="color: black; font-size: 28px" class="icon-facebook"></i>
				<span>&nbsp; &nbsp;</span>
			</a>
			<a href="<?php echo $insta ?>">
				<i style="color: black; font-size: 28px" class="icon-instagram"></i>
			</a>
			</center>

		</center>



	</div>
	<footer>
		<div id="footer-wrapper" style="    background: #fdd01f;">

			<div class="container" style="    background: #fdd01f;">
				<div id="footer" class="row" style="    background: #fdd01f;">
					
					
					
					<div class="col-md-4">
						<h4></h4>

						<h4 class="ftext">Explore</h4>
						<ul style="list-style:none">
				

							<li><a class="ftext" href="products-eid-arrivals" title="">Eid Arrivals</a></li>
							<li><a class="ftext" href="products-big-sale" title="">Big Sale</a></li>
							<li><a class="ftext" href="products-little-girl" title="">Little Girl</a></li>
							<li><a class="ftext" href="products-little-boy" title="">Little Boy</a></li>
							<li><a class="ftext" href="contact" title="">Contact Us</a></li>
														
						</ul>
					</div>
					
					
					
					<div class="col-md-4">
						<h4></h4>
						<p></p><p>&nbsp;<strong>Address:</strong><br><?php echo $siteaddress ?></p>
						<p><strong>Phone:</strong><br><?php echo $sitephone ?></p>
						<p><strong>Email:</strong><br><a class="ftext" href="mailto:<?php echo $sitemail ?>"><?php echo $sitemail ?></a></p>

						<?php echo $fpost ?>

					</div>
					
					
					
					<div class="col-md-4">
						<h4></h4>

						<h4 class="ftext">Connect</h4>
						<p>Join our mailing list for updates</p>
						<div id="footer_signup">
							<p></p>
							
							
							<input style="background: white; border:none; padding: 10px; border-radius: 1px;" type="email" name="contact[email]" id="footer-EMAIL" placeholder="Enter Email Address">
							<input style=" background: black; border:none; padding: 10px; border-radius: 1px;color:white" type="submit" id="footer-subscribe" value="Join">
							
						</div>
					</div>

					
					
				</div>
				<div class="footerb">
					<center>
						<a href="<?php echo $facebook ?>">
				<i style="color: black; font-size: 28px" class="icon-facebook"></i>
				<span>&nbsp; &nbsp;</span>
			</a>
			<a href="<?php echo $insta ?>">
				<i style="color: black; font-size: 28px" class="icon-instagram"></i>
			</a>

						<p class="ftext">
							Copyright © 2020 <a class="ftext" href="/" title="">HipHop Company</a>
						</p>
						<span style="font-size: 10px;">Powered By: <a style="color:#fff" href="http://infotech4it.com" target="blank">InfoTech4iT</a></span>
						<br><br>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
</footer>


	<!-- Go To Top
		============================================= -->
		<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
		=============================================  -->
		<script  src="js/jquery.js"></script>

		<script src="js/plugins.js"></script>


	<!-- Footer Scripts
		============================================= -->
		<script src="js/functions.js"></script>
		
		  <?php if(!empty($msg)){ ?>
    <?php include 'include/snackbar.php'; ?>
  <?php } ?>
  