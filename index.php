<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
		============================================= -->
		<title>HipHop Kids | Homepage</title>

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
<?php

                $rows =mysqli_query($con,"SELECT * FROM slider  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
                  $name = $row['name']; 
                  $img = $row['img']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 
                  ?>
						<div class="slide">
							<a href="#">
								<img class="slideimg" src="images/slider/<?php echo $img ?>" alt="Shop Image">
							</a>
						</div>
						
						<?php } ?>

					</div>
				</div>
			</div>
			<br><br>
			<div class="container">
				<div class="row">

<?php $rows =mysqli_query($con,"SELECT * FROM productcat WHERE slug='boy' ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
                    $name = $row['name'];
                     $slug = $row['slug'];
                     $id = $row['id'];
                     $img = $row['img'];
            
                  ?>

					<div class="col-md-6">
						<a href="products-<?php echo $slug ?>"> 
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/<?php echo $img ?>" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="products-<?php echo $slug ?>"><span class="hometext"><?php echo $name ?></span></a></center></div>
					</a>
					</div>
				<?php } ?>
<?php $rows =mysqli_query($con,"SELECT * FROM productcat WHERE slug='little-boy' ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
                    $name = $row['name'];
                     $slug = $row['slug'];
                     $id = $row['id'];
                     $img = $row['img'];
            
                  ?>

					<div class="col-md-6">
						<a href="products-<?php echo $slug ?>"> 
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/<?php echo $img ?>" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="products-<?php echo $slug ?>"><span class="hometext"><?php echo $name ?></span></a></center></div>
					</a>
					</div>
				<?php } ?>

			</div>
				<div class="row">

<?php $rows =mysqli_query($con,"SELECT * FROM productcat WHERE slug='girl' ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
                    $name = $row['name'];
                     $slug = $row['slug'];
                     $id = $row['id'];
                     $img = $row['img'];
            
                  ?>

					<div class="col-md-6">
						<a href="products-<?php echo $slug ?>"> 
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/<?php echo $img ?>" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="products-<?php echo $slug ?>"><span class="hometext"><?php echo $name ?></span></a></center></div>
					</a>
					</div>
				<?php } ?>


<?php $rows =mysqli_query($con,"SELECT * FROM productcat WHERE slug='little-girl' ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
                    $name = $row['name'];
                     $slug = $row['slug'];
                     $id = $row['id'];
                     $img = $row['img'];
            
                  ?>

					<div class="col-md-6">
						<a href="products-<?php echo $slug ?>"> 
						<div class="imgcover" style="background: #fff">
							<img class="homeimg" src="images/products/<?php echo $img ?>" alt="Shop Image">
						</div>
						<div class="homebg"><center><a href="products-<?php echo $slug ?>"><span class="hometext"><?php echo $name ?></span></a></center></div>
					</a>
					</div>
				<?php } ?>


					
			</div>


</div>










			<br><br>


			<div class="fancy-title title-dotted-border title-center">
				<h2>Our  <span>Featured</span> Products</h2>
			</div>
			<br><br>




			<div class="container">

    <?php include 'include/featured.php'; ?>
				
		</div>

		<!-- Footer
			============================================= -->

			<?php  	include 'include/footer.php'; ?>

			
		</div><!-- #wrapper end -->

	</body>
	</html>