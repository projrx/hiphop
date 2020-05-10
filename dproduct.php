<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <?php include('include/connect.php') ?>
  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['dproduct_name'])) $page = $_GET['dproduct_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = Null ?>
  <?php if(empty( $_GET['dproduct_name'])) $page = Null ?>
  <?php

  $rows =mysqli_query($con,"SELECT * FROM product where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
  $n=0;

  while($row=mysqli_fetch_array($rows)){
    $name = $row['name']; 
    $metak = $row['metak']; 
    $metad = $row['metad']; 

  }?>
  <meta name="keywords" content="<?php echo $metak ?>">
  <meta name="description" content="<?php echo $metad ?>">
  <?php include 'include/head.php'; ?>

  <title> <?php echo $name ?>  - <?php echo $sitename ?></title>


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
      text-align: center;
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
      height: auto;
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
        border-style: double;
        border-color: grey;
        height: auto;
        width: 50%;
      }


      .boxed label {
        width: 75px !important;
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
        border-style: double;
        border-color: #e2e1e1;
        height: auto;
        width: 100%;
      }

      .boxed label {
        width: 75px;
      }


    }


    .boxed label {
      display: inline-block;
      width: 100px;
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



   .nav-tabs>li {
    float: left;
    margin-bottom: -1px;
    height: 80px;
    width: 96px !important;
  }

  ul {
    list-style-type: disc;
  }
</style>


</head>

<body class="body-wrapper">

  <div class="main_wrapper">
    <?php include 'include/header.php'; ?>
    <br>

    <?php if(!empty( $_GET['dproduct_name'])){ ?>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM product where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

       $slug = $row['slug']; 
       $name = $row['name']; 
       $metak = $row['metak']; 
       $metad = $row['metad']; 
       $ordr = $row['ordr']; 
       $id = $row['id']; 
       $bid = $row['brand']; 
       $feat = $row['feat']; 
       $desp = $row['desp']; 
       $price = $row['price']; 
       $sale = $row['sale']; 
       $saleprice = $row['saleprice']; 
       $sizesm = $row['sizesm']; 
       $sizemd = $row['sizemd']; 
       $sizelg = $row['sizelg']; 


       ?>

       <div class="container">
        <div class="col-md-12">


          <br><br>

          <div class="picZoomer">
            <?php 
            $rowsx =mysqli_query($con,"SELECT * FROM pimgs where pslug='$slug'  ORDER BY feat desc LIMIT 1" ) or die(mysqli_error($con));
            $n=1;

            while($rowx=mysqli_fetch_array($rowsx)){
              $pimg = $rowx['img']; 
              $pordr = $rowx['ordr']; 
              $pid = $rowx['id']; 
              $pfeat = $rowx['feat']; 
            }
            ?>

            <img src="images/products/<?php echo $pimg ?>" width="50%" alt="">


            <form class="proshow" action="" method="POST">
              <div class="proinfo" style="">
                <h3><a><?php echo $name ?></a></h3>
                <span>Rs. <?php echo number_format($price) ?>/ <?php if(!empty($sale)){ ?> <t class="und txtcolor">Rs.  <?php echo number_format($saleprice) ?>/-</t> <?php } ?></span>
                <br>
                <br>


                <span>Size:</span> 

                <div class="boxed" style="margin-bottom: 0px;">
                  <?php if(!empty($sizesm)){ ?>
                    <input type="radio" id="s" name="size" value="S" required="" checked="">
                    <label class="size" for="s">Small</label>
                  <?php } ?>
                  <?php if(!empty($sizemd)){ ?>
                    <input type="radio" id="m" name="size" value="M" required="">
                    <label class="size" for="m">Medium </label>
                  <?php } ?>
                  <?php if(!empty($sizelg)){ ?>
                    <input type="radio" id="l" name="size" value="L" required="">
                    <label class="size" for="l">Large </label>
                  <?php } ?>

                </div>



                <span>Quantity: </span><br><br>
                <input type="button" id="less" value="-" class="qbtn" name="">
                <input type="number" class="qbtn" style="width: 80px" id="quan" name="qty" min="1" value="1">
                <input type="button" value="+" class="qbtn" id="add" name="">

                <br>
                <br>
                
                <button name="addcart" class="pbtn" value="<?php echo $id ?>"> Add To Cart </button>
                <br>
                <br>
                <button name="buycart" class="pbtn bgcolor" value="<?php echo $id ?>"> Buy It Now </button>

                <hr>

                <span>
                  <?php echo $desp ?>
                  <br><br>
                </span>
              </div>
            </form>
          </div>

          <ul class="piclist" style="text-align: left;">
            <?php 
            $rowsx =mysqli_query($con,"SELECT * FROM pimgs where pslug='$slug'  ORDER BY feat desc" ) or die(mysqli_error($con));
            $n=1;

            while($rowx=mysqli_fetch_array($rowsx)){
              $pimg = $rowx['img']; 
              $pordr = $rowx['ordr']; 
              $pid = $rowx['id']; 
              $pfeat = $rowx['feat']; 
              ?>
              <li><img src="images/products/<?php echo $pimg ?>" alt=""></li>
            <?php } ?>
          </ul>

          <br><br>


        <?php } } ?>

      </div>
      <br><br>


<div class="mt">
</div>

<center><h4>View Simillar Products</h4></center>
    <?php include 'include/featured.php'; ?>

  </div>


  <?php include 'include/footer.php'; ?>


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


</body>

</html>

