<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Cart Orders
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['order_name'])) $page = $_GET['order_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>


  <style type="text/css">

    #catimg{
      height: 150px;
      width:  200px;
    }

    #catimg1{
      width:  200px;
    }  
    #ccatimg{
      height: 100px;
      width:  150px;
    }

    #ccatimg1{
      width:  120px;
    }

  </style>


  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />


</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 layout-boxed">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>


    <?php include('include/orderdetail.php') ?>
    

<div class="">
  <div class="row">
    <!-- Basic Table -->
    <div class="col-md-2">
      <?php include 'include/ordernav.php'; ?>
    </div>
    <div class="col-md-10">
      <div class="widget-container fluid-height clearfix overflow">
        <div class="heading">
          <i class="fa fa-tags"></i>Items in Customer's Cart Right Now.
        </div>
        <div class="widget-content padded clearfix">
          <table class="table "  id="example" >
            <thead>
             <tr>
              <td>Order#</td><td>Customer ID.</td>
              <td>Name </td>
              <td>Image</td><td style="min-width: 100px">Name</td>
              <td>Size</td><td>Qty</td><td></td><td>Price</td>
              <td style="min-width: 150px !important;">Date Created </td>
            </tr>
          </thead>
          <tbody>

            <?php 
            $rows =mysqli_query($con,"SELECT * FROM shop where status='cart' Order By id desc LIMIT $glimit " ) or die(mysqli_error($con));
            $rowcount=mysqli_num_rows($rows);
            $n=0;      $stotal=0;

            while($row=mysqli_fetch_array($rows)){
              $oid = $row['id']; 
              $pid = $row['pid']; 
              $qty = $row['qty']; 
              $size = $row['size']; 
              $device = $row['device']; 
              $datec = $row['datec']; 
              $bfirstname = $row['bfname'];
              $blastname = $row['blname'];


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

                <tr class="orow" onclick="window.location='corders-<?php echo $oid ?>'">

                  <td>
                   <?php echo $oid ?> 
                 </td>
                 <td> <?php echo $device ?> </td>
                 <td> <?php echo $bfirstname ?> <?php echo $blastname ?> </td>
                 <td><img src="../images/products/<?php echo $image ?>" class="minicartimg"></td><td><?php echo $proname ?></td><td> <?php echo $size ?> </td><td> <?php echo $qty ?> </td><td> x </td><td><?php echo number_format($price) ?></td>
                 <td><?php echo $datec ?>

               </tr>

             <?php } } ?>
           </tbody>

         </table>
       </div>
     </div>
   </div>
 </div>
</div>

<div class="space"></div>



</div>
</div>




<?php include('include/footer.php') ?>


<script type="text/javascript">
  if (window.innerWidth  > 780) {
    document.write('<script src="dt/jquery.min.js"><\/script>')
  }

</script>


<script src="dt/jszip.min.js"></script>
<script src="dt/pdfmake.min.js"></script>
<script src="dt/vfs_fonts.js"></script>
<script src="dt/jquery.dataTables.min.js"></script>
<script src="dt/dataTables.buttons.min.js"></script>
<script src="dt/buttons.flash.min.js"></script>
<script src="dt/buttons.html5.min.js"></script>
<script src="dt/buttons.print.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
  } );
</script>


</body>
</html>