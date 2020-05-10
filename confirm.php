<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

  <?php include 'include/head.php'; ?>

  <title>Cart </title>


  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['client_name'])) $page = $_GET['client_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = Null ?>
  <?php if(empty( $_GET['client_name'])) $page = Null ?>
  
</head>

<body class="body-wrapper">

  <div class="main_wrapper">
  <?php include 'include/header.php'; ?>
<br>



  <div class="container pbg" style="  overflow: auto;">

   
     <table class="table ">
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
        <td><img src="images/products/<?php echo $image ?>" style="width: 50px;height: 50px"></td><td><?php echo $proname ?></td><td> <?php echo $size ?> </td><td> <?php echo $qty ?> </td><td> x </td><td><?php echo number_format($price) ?></td>
      </tr>
      <?php } } ?>
      </tbody>
      <tfoot>
          <tr>
            <td colspan="4" class="text-right">Total</td><td colspan="3">Rs.  <?php echo number_format($stotal) ?> </td>
          </tr>
      </tfoot>
      

    </table>



<?php

$rows =mysqli_query($con,"SELECT * FROM shop WHERE device='$device' AND status='cart' Limit 1 " ) or die(mysqli_error($con));
          
  while($row=mysqli_fetch_array($rows)){
    
    $bfirstname = $row['bfname'];
    $blastname = $row['blname'];
    $bpostalcode = $row['bpostal'];
    $baddress1 = $row['baddress1'];
    $baddress2 = $row['baddress2'];
    $bcity = $row['bcity'];
    $bcountry = $row['bcountry'];
    $bphone = $row['bmobile'];
    $bemail = $row['bemail'];
    $sfirstname = $row['sfname'];
    $slastname = $row['slname'];
    $spostalcode = $row['spostal'];
    $saddress1 = $row['saddress1'];
    $saddress2 = $row['saddress2'];
    $scity = $row['scity'];
    $scountry = $row['scountry'];
    $sphone = $row['smobile'];
    $semail = $row['semail'];
    $inst = $row['inst'];
    
    
    }

?>

   
<div class="section row " style="padding: 36px 60px 1px 60px;">



<div class="col-md-6"> 
    
<h2>Billing Address</h2>
<br><br>

<strong>
    Name:
    </strong>
<?php if(!empty($bfirstname)) echo $bfirstname ; ?> -

<?php if(!empty($blastname)) echo $blastname ; ?>
    <br><br>
   
<strong>
    Address:
    </strong> 

<?php if(!empty($baddress1)) echo $baddress1 ; ?> ,

<?php if(!empty($baddress2)) echo $baddress2 ; ?>
<br>
<?php if(!empty($bcountry)) { echo $bcountry ; }?>

<?php if(!empty($bcity)) {  echo $bcity ; }?> 
    
<?php if(!empty($bpostalcode)) echo $bpostalcode ; ?>
     <br><br>
<strong>
Contact:    </strong>
    <br>
<?php if(!empty($bphone)) echo $bphone ; ?>
    <br>
<?php if(!empty($bemail)) echo $bemail ; ?>
</div>

<div class="col-md-6"> 

<h2>Shipping Address</h2>
<br><br>
 
<strong>
    Name:
    </strong> 
<?php if(!empty($sfirstname)) echo $sfirstname ; ?>

<?php if(!empty($slastname)) echo $slastname ; ?>
 
    <br>
    <br>
    
<strong>
    Address:
    </strong> 
   
<?php if(!empty($saddress1)) echo $saddress1 ; ?>

<?php if(!empty($saddress2)) echo $saddress2 ; ?>
<br>
<?php if(!empty($scountry)) { echo $scountry ; }?>


<?php if(!empty($scity)) {  echo $scity ; } ?>

<?php if(!empty($spostalcode)) echo $spostalcode ; ?>


  <br>
  <br>
   
<strong>
    Contact:
    </strong> 
   
<br>
<?php if(!empty($sphone)) echo $sphone ; ?>
    <br>
    <?php if(!empty($semail)) echo $semail ; ?>   


</div>
<div class="col-md-3">
<br>

  <h4>Special Instructions: </h4>
  </div>
  <div class="col-md-8">
<br>
  
    <?php echo $inst ?>
    </div>              
</div> 

<table>
  
      <tfoot>
          <tr>

            <td class="" style="width: 100%">
                <div class="row">
                  <div class="col-md-5 text-right">
              <br><br>
              <img src="images/cod.png" style="width: 50px">
            </div>
                  <div class="col-md-6 text-left">
              <br><br>
              <h2>Cash on Delivery</h2>
              Total : <strong> Rs.  <?php echo number_format($stotal) ?>  </strong>
            </div>
          </div>
            </td>
            <td class="text-center">

                &nbsp;
              </td>
              

          </tr>
      </tfoot>
</table>

<center>
<?php if(!empty($sphone)) { ?>

    <br>
    <br>
       <form method="post" action="">
       <button class="btn bgcolor" type="submit" name="confirm" >Confirm Order </button>  
        </form>  
      <?php } ?>
</center>

</div>       

    <br><br>

  </div>



    <br><br>


  

  </div>

    <br><br>

<?php include 'include/footer.php'; ?>


</body>

</html>

