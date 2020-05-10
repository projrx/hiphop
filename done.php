<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<?php include 'include/head.php'; ?>

  <title>Store Products </title>
  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['ds_product'])) $page = $_GET['ds_product'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
  <?php if(empty( $_GET['ds_product'])) $page = Null ?>

</head>

<body class="body-wrapper">
    

<style>
	

</style>


  <div class="main_wrapper">
  <?php include 'include/header.php'; ?>


  


    <br>    
      <div class="container">


<center>

    <br>

    
      <h1>Order Confirm Successful! Thank You!</h1>
      <br>
      <br>
      <h4>View More Featured Products and Explore </h4>
    </center>

    <?php include 'include/featured.php'; ?>



</div>

    <?php include 'include/footer.php'; ?>

</div>
</body>

</html>

