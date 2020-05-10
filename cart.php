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

   
      <h1>Shopping Cart</h1>

    <table class="table ">

      <thead>
        <th>Image</th>
        <th style="min-width: 200px">Product</th>
        <th>Size</th>
        <th>Price</th>
        <th>Quantity</th>
        <th style="min-width: 100px;">Manage</th>
        <th>Total</th>
      </thead>
      <tbody>
        <?php 

        $rows =mysqli_query($con,"SELECT * FROM shop where status='cart' AND device='$device'" ) or die(mysqli_error($con));
        $n=0;
        $stotal=0;

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
            $img = $rowxx['img']; 
          }

          ?>

        <form action="" method="post">

      <tr class="product">
        <td class="image">
          <img style="width:50px; height: 50px" src="images/products/<?php echo $img ?>">
        </td>
        <td class="product-details">
          <div class="product-title"><?php echo $proname ?></div>
        </td>
        <td class=""> <?php echo $size ?></td>
        <td class="">Rs. <?php echo number_format($price) ?>/-</td>
        <td class="product-quantity">

          <input class="form-control" name="qty<?php echo $n ?>" style="max-width: 100px ;"  type="number" value="<?php echo $qty ?>" min="1">
        </td>
        <td class="product-removal">
          <button name="upcart<?php echo $n ?>" value="<?php echo $oid ?>" class="btn bgcolor">
            <i class="icon-save"></i>
          </button>
          <button name="rem<?php echo $n ?>" value="<?php echo $oid ?>" class="btn btn-danger">
            <i class="icon-trash"></i>
          </button>
        </td>
        <td class="product-line-price">Rs. <?php echo number_format($total) ?>/-</td>
      </tr>

      </form>

      <?php $n++; } } ?>

      <tr class="totals" style="height: 50px">
        <td colspan="5" ></td>
        <td class="text-right">
          <strong>
          Total: 
            
          </strong>

        </td>
        <td class="totals-item">
          
          <strong>
          Rs. <?php echo number_format($stotal) ?>/-
            
          </strong> 

        </td>
      </tr>
      <tr>
        <td colspan="5"></td>
        <td colspan="2">
          <a href="address.php" class="btn bgcolor hoverwhite" style="width: 100%">
            <div style="width: 100%">
          Checkout
        </div>
        </a>
      </td>
      </tr>
      </tbody>
     </table> 
    

  </div>




    <br><br>

  

  </div>
<?php include 'include/footer.php'; ?>


</body>

</html>

