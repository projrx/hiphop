<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
		============================================= -->
		<title>Product Kids | HipHop</title>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/jquery-picZoomer.css">
    <style type="text/css">
    html {
        background-color: #D3CEC0;
    }

    body{
        margin: 0 auto;
    }

    .piclist{
        margin-top: 30px;
    }
    .piclist li{
        display: inline-block;
        width: 50px;
        height: 50px;
    }
    .piclist li img{
        width: 100%;
        height: auto;
    }

    /* custom style */
    .picZoomer-pic-wp,
    .picZoomer-zoom-wp{
        border: 1px solid #fff;
    }
.picZoomer-zoom-pic {
    min-width: fit-content !important;
        width: 1400px !important;
    height: 1407px !important;
}

.picZoomer-pic-wp{
	width: 50% !important;
	height: auto !important; 
}
.picZoomer-zoom-wp{
	left: 50% !important;
}

.proinfo {
    float: right;
    padding: 30px;
    border-style: double;
    border-color: #e2e1e1;
    height: 570px;
    width: 48%;
}

@media (max-width: 991px){
.picZoomer-zoom-wp {
    display: none !important;
}
.picZoomer-pic-wp:hover .picZoomer-cursor{
    display: none !important;

}
.proinfo{
	float: right;
    padding: 5px;
    border-style: double;
    border-color: grey;
    height: 542px;
    width: 50%;
}

}

@media (max-width: 576px){
.picZoomer-zoom-wp {
    display: none !important;
}
.picZoomer-pic-wp:hover .picZoomer-cursor{
    display: none !important;
}

.picZoomer-pic-wp {
    width: 100% !important;
    height: auto !important;
}

.proinfo {
    float: none;
    padding: 30px;
    border-style: double;
    border-color: #e2e1e1;
    height: 100%;
    width: 100%;
}


}



}








.boxed label {
  display: inline-block;
  width: 200px;
  padding: 10px;
  border: solid 2px #ccc;
  transition: all 0.3s;
}

.boxed input[type="radio"] {
  display: none;
}

.boxed input[type="radio"]:checked + label {
     border: solid 1px #000000;
    background: #000000;
    color: white;
}
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

			<div class="container">
				<br><br>

<div class="picZoomer">


        <img src="images/products/s1.jpg" width="50%" alt="">

<div class="proinfo" style="">
<h3><a href="portfolio-single-video.html">Red Strips Shirt</a></h3>
<span>Rs. 2000/ <t class="und">Rs.  400/-</t></span>
<br>
<br>


<span>Size:</span> 

<form class="boxed" style="margin-bottom: 0px;">
  <input type="radio" id="s" name="skills" value="S">
  <label class="size" for="s">Small</label>

  <input type="radio" id="m" name="skills" value="M">
  <label class="size" for="m">Medium </label>


</form>



<span>Quantity: </span><br><br>
<button id="less" class="qbtn">-</button>
<input type="number" class="qbtn" style="width: 80px" id="quan" name="" value="0">
<button class="qbtn" id="add">+</button>

<br>
<br>
	<a href="cart.php">
    <button onchange="" class="pbtn" style="background: black; color:white"> Add To Cart </button>
    </a>
    <br>
    <br>
    <button class="pbtn bgcolor"> Buy It Now </button>

    <hr>


    <span>Paint the town red in this uber cool striped polo with contrasting collar two button placket.
    </span>
    <br>
    <a href="contact.php"> Contact us </a>


</div>

    </div>

    <ul class="piclist">
        <li><img src="images/products/s1.jpg" alt=""></li>
        <li><img src="images/products/s2.jpg" alt=""></li>
        <li><img src="images/products/s3.jpg" alt=""></li>
    </ul>

    <br><br>




			<div class="fancy-title title-dotted-border title-center">
				<h2><span>Simillar</span> Products</h2>
			</div>
			<br><br>

				<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="20" data-nav="false" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">



					<div class="oc-item">
						<div class="iportfolio">
							<div class="portfolio-image">
								<a href="product.php">
									<div class="sale-item icn">-30%</div>

									<img src="images/products/boy11.jpg" alt="Workspace Stuff">
								</a>

							</div>
							<div class="portfolio-desc">
								<h3><a href="product.php">T-Shirt Yellow</a></h3>
								<span>Rs. 2000/ <t class="und">Rs.  400/-</t></span>
							</div>
						</div>
					</div>

					<div class="oc-item">
						<div class="iportfolio">
							<div class="portfolio-image">
								<a href="product.php">
									<div class="sale-item icn">-30%</div>

									<img src="images/products/p1.jpg" alt="Workspace Stuff">
								</a>
							</div>


							<div class="portfolio-desc">
								<h3><a href="product.php">Console Shirt</a></h3>
								<span>Rs. 2000/ <t class="und">Rs.  400/-</t></span>
							</div>
						</div>
					</div>


					<div class="oc-item">
						<div class="iportfolio">
							<div class="portfolio-image">
								<a href="product.php">
									<div class="sale-item icn">-30%</div>

									<img src="images/products/girl2.jpg" alt="Workspace Stuff">
								</a>
							</div>

							<div class="portfolio-desc">
								<h3><a href="product.php">Skirt Red</a></h3>
								<span>Rs. 2000/ <t class="und">Rs.  400/-</t></span>
							</div>
						</div>
					</div>


					<div class="oc-item">
						<div class="iportfolio">
							<div class="portfolio-image"><a href="product.php">
									<img src="images/products/p3.jpg" alt="Workspace Stuff">
									<div class="sale-item icn">-30%</div>

								</a>

							<div class="portfolio-desc">
								<h3><a href="product.php">Shirt Glow</a></h3>
								<span>Rs. 2000/ <t class="und">Rs.  400/-</t></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>








			</div>

		<!-- Footer
			============================================= -->

			<?php  	include 'include/footer.php'; ?>
    <script type="text/javascript" src="js/jquery.picZoomer.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.picZoomer').picZoomer();


            $('.piclist li').on('click',function(event){
                var $pic = $(this).find('img');
                $('.picZoomer-pic').attr('src',$pic.attr('src'));
            });
        });
    </script>

    <script type="text/javascript">
    	$('#less').click( function(){
		
		qt = $('#quan').val();
		newqt = qt-1;
		$('#quan').val(newqt)
})

    	$('#add').click( function(){
		
		qt = $('#quan').val();
		nqt = parseInt(qt);
		newqt = nqt + 1 ;
		$('#quan').val(newqt)
})


    </script>


		</div><!-- #wrapper end -->

	</body>
	</html>