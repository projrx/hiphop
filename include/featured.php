<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">


  <?php

    $rows =mysqli_query($con,"SELECT * FROM product where feat='1'  ORDER BY ordr" ) or die(mysqli_error($con));
    $n=0;

    while($row=mysqli_fetch_array($rows)){

      $name = $row['name'];
      $slug = $row['slug'];
      $desp = $row['desp'];
      $id = $row['id'];
               $price = $row['price']; 
               $sale = $row['sale']; 
               $saleprice = $row['saleprice']; 

      if(empty($desp)) $desp='...';
      
      
      $rows2 =mysqli_query($con,"SELECT * FROM pimgs where feat=1 AND  pslug='$slug'   ORDER BY ordr" ) or die(mysqli_error($con));
      $n=0;
      while($row2=mysqli_fetch_array($rows2)){
        $img = $row2['img'];
      }
        
      ?>
					<div class="oc-item">
						<div class="iportfolio">
							<div class="portfolio-image">
								<a href="dproducts-<?php echo $slug ?>">
									<?php if(!empty($sale)){ ?>
									<div class="sale-item icn">-<?php $saleper = ($price/$saleprice)*100; echo round($saleper)  ?>%</div> <?php } ?>

									<img src="images/products/<?php echo $img ?>" alt="Workspace Stuff">
								</a>

							</div>
							<div class="portfolio-desc">
								<h3><a href="dproducts-<?php echo $slug ?>"><?php echo $name ?></a></h3>
                  
                  <span>Rs. <?php echo number_format($price) ?>/- <?php if(!empty($sale)){ ?> <t class="und txtcolor">Rs.  <?php echo number_format($saleprice) ?>/-</t> <?php } ?></span>


							</div>
						</div>
					</div>

				<?php } ?>

			</div>