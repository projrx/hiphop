<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

  <?php include 'include/head.php';
  
  			
  			function truncateString($str, $chars, $to_space, $replacement="...") {
   if($chars > strlen($str)) return $str;

   $str = substr($str, 0, $chars);
   $space_pos = strrpos($str, " ");
   if($to_space && $space_pos >= 0) 
       $str = substr($str, 0, strrpos($str, " "));

   return($str . $replacement);
}

?>
  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['sproduct_name'])) $page = $_GET['sproduct_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = Null ?>
  <?php if(empty( $_GET['sproduct_name'])) $page = Null ?>


  <title>Products - <?php echo $sitename ?> </title>
  

</head>

<body class="body-wrapper">
    

  <div class="main_wrapper">
  <?php include 'include/header.php'; ?>

  <div class="container">

    
    <div class="latest-products text-center">
    
    <h2 style="text-transform: capitalize;"><?php echo $page ?> Products</h2>
    
    <div class="clearfix">&nbsp;</div>
    
    

	                	<div class="row ">


    <?php

    $rows =mysqli_query($con,"SELECT * FROM product where pslug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
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


  <div class="col-md-4">
            <div class="iportfolio">
              <div class="portfolio-image">
                <a href="dproducts-<?php echo $slug ?>">
                  <img src="images/products/<?php echo $img ?>" alt="Workspace Stuff">
                  <?php if(!empty($sale)){ ?><div class="bgcolor icn">-<?php $saleper = ($price/$saleprice)*100; echo round($saleper)  ?>%</div> <?php } ?>

                </a>
              </div>
              <div class="portfolio-desc">
                <h3><a href="product.php"><?php echo $name ?></a></h3>
                <span>Rs. <?php echo number_format($price) ?>/ <?php if(!empty($sale)){ ?> <t class="und txtcolor">Rs.  <?php echo number_format($saleprice) ?>/-</t> <?php } ?></span>
              </div>
            </div>
  </div>

  <!--
                   <div class="item col-md-4">
                       <div class="item-inner">
                                     <br>



                             <div class="img">
                                <center>

                               <figure id="fig1">
                                <a href="dproducts-<?php echo $slug ?>">
                                 <img  class="simg" src="images/products/<?php echo $img ?>" alt="" id="img1" />
                               </a>
                               </figure>
                             </center>

                             </div>
                             
                                     <h4 class="heading1"><?php echo $name ?></h4>
                             <br>

                               
                               
                       </div>
                       </div>

                     -->
                                  
                    <?php $n++; $img='Null'; } ?>
                    
            </div>
            </div>
                      
        </div><!--//products-->
    </div><!--//containers-->


    <br>
    <br>











    <?php include 'include/footer.php'; ?>

</div>
</body>

</html>

