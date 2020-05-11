<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

  <?php include 'include/head.php'; ?>

  <title>Address </title>


  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['client_name'])) $page = $_GET['client_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = Null ?>
  <?php if(empty( $_GET['client_name'])) $page = Null ?>
  
  <style type="text/css">
    td{
      text-align:left  !important;
    }
  </style>
</head>

<body class="body-wrapper">

  <div class="main_wrapper">
    <?php include 'include/header.php'; ?>
    <br>


    <form action="" method="post">


    <div class="container pbg" style="  overflow: auto;">


      <h1>Enter Order Details</h1>



      <!-- get single row data from database -->

      <?php

      $rows =mysqli_query($con,"SELECT * FROM shop WHERE device LIKE ('$device')" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $bfirstname = $row['bfname'];
        $blastname = $row['blname'];
        $bpostalcode = $row['bpostal'];
        $baddress1 = $row['baddress1'];
        $baddress2 = $row['baddress2'];
        $bcity = $row['bcity'];
        $bphone = $row['bmobile'];
        $bemail = $row['bemail'];
        $sfirstname = $row['sfname'];
        $slastname = $row['slname'];
        $spostalcode = $row['spostal'];
        $saddress1 = $row['saddress1'];
        $saddress2 = $row['saddress2'];
        $scity = $row['scity'];
        $sphone = $row['smobile'];
        $semail = $row['semail'];
        $inst = $row['inst'];


      }

      ?>


  

        <div class="section row text-center" style="padding: 36px 60px 1px 60px;">



         <div class="col-md-6"> 

          <h2>Billing Details</h2>
          <br><br>

<table class="table text-left">
         <tr>
          <td>             First Name:         </td>
          <td>        <input type="text" value="<?php if(!empty($bfirstname)) echo $bfirstname ; ?>" class="form-control myform" id="fname" name="firstname">         </td>
         </tr>
         <tr>
          <td>          Last Name:      </td>
          <td>          
           <input type="text" value="<?php if(!empty($blastname)) echo $blastname ; ?>" class="form-control myform" id="lname" name="lastname">
           </td>
         </tr>
         <tr>
          <td>      Address Line 1:        </td>
          <td>        
            <input type="text" value="<?php if(!empty($baddress1)) echo $baddress1 ; ?>" class="form-control myform" id="address1" name="address1">       
          </td>
         </tr>

         <tr>
          <td>    Address Line 2:        </td>
          <td>        
            
          <input type="text" value="<?php if(!empty($baddress2)) echo $baddress2 ; ?>" class="form-control myform" id="address2" name="address2">       
          </td>
         </tr>
         <tr>
          <td>     City:      </td>
          <td>        
            
             <select style="border:solid 1px;" class="form-control myform" id="city" name="city">
           <?php if(!empty($bcity)) { ?><option value="<?php echo $bcity ;?>"><?php echo $bcity ;?></option><?php }
           $rows =mysqli_query($con,"SELECT * FROM cities" ) or die(mysqli_error($con));
           while($row=mysqli_fetch_array($rows)){
            $city = $row['city'];
            ?>
            <option value="<?php echo $city ;?>"><?php echo $city ;?></option>
          <?php } ?>
        </select>
      
          </td>
         </tr>


         <tr>
          <td> Postal Code:      </td>
          <td>        
             <input type="text" value="<?php if(!empty($bpostalcode)) echo $bpostalcode ; ?>" class="form-control myform" id="postal" name="postalcode">       
          </td>
         </tr>

         <tr>
          <td> Phone:      </td>
          <td>        
             <input type="text" value="<?php if(!empty($bphone)) echo $bphone ; ?>" class="form-control myform" id="phone" name="phone">      
          </td>
         </tr>

         <tr>
          <td> Email:     </td>
          <td>        
              <input type="text" value="<?php if(!empty($bemail)) echo $bemail ; ?>" class="form-control myform" id="email" name="email">       
          </td>
         </tr>


</table>

   </div>

   <div class="col-md-6"> 

    <h2>Shipping Details</h2>
    <br><br>



<table class="table">
         <tr>
          <td>             First Name:         </td>
          <td>          <input type="text" value="<?php if(!empty($sfirstname)) echo $sfirstname ; ?>" class="form-control myform" id="shipping_fname" name="shipping_firstname">         </td>
         </tr>
         <tr>
          <td>          Last Name:      </td>
          <td>          
           <input type="text" value="<?php if(!empty($slastname)) echo $slastname ; ?>" class="form-control myform" id="shipping_lname" name="shipping_lastname">
           </td>
         </tr>
         <tr>
          <td>      Address Line 1:        </td>
          <td>        
          <input type="text" value="<?php if(!empty($saddress1)) echo $saddress1 ; ?>" class="form-control myform" id="shipping_address1" name="shipping_address1">     
          </td>
         </tr>
         <tr>
          <td>    Address Line 2:        </td>
          <td>        
            
           <input type="text" value="<?php if(!empty($saddress2)) echo $saddress2 ; ?>" class="form-control myform" id="shipping_address2" name="shipping_address2">     
          </td>
         </tr>
         <tr>
          <td>     City:      </td>
          <td>        
            
             <select style="border:solid 1px;" class="form-control myform" id="shipping_city" name="shipping_city">
           <?php if(!empty($scity)) { ?><option value="<?php echo $scity ;?>"><?php echo $scity ;?></option>
         <?php }
           $rows =mysqli_query($con,"SELECT * FROM cities" ) or die(mysqli_error($con));
           while($row=mysqli_fetch_array($rows)){
            $city = $row['city'];
            ?>
            <option value="<?php echo $city ;?>"><?php echo $city ;?></option>
          <?php } ?>
        </select>
      
          </td>
         </tr>


         <tr>
          <td> Postal Code:      </td>
          <td>        
             <input type="text" value="<?php if(!empty($spostalcode)) echo $spostalcode ; ?>" class="form-control myform" id="shipping_postal" name="shipping_postalcode">       
          </td>
         </tr>

         <tr>
          <td> Phone:      </td>
          <td>        
             <input type="text" value="<?php if(!empty($sphone)) echo $sphone ; ?>" class="form-control myform" id="shipping_phone" name="shipping_phone">      
          </td>
         </tr>

         <tr>
          <td> Email:     </td>
          <td>        
      <input type="text" value="<?php if(!empty($semail)) echo $semail ; ?>" class="form-control myform" id="shipping_email" name="shipping_email">

          </td>
         </tr>


</table>

</div>
</div>



<div class="row" style="padding-bottom:25px">
  <div class="col-md-2">
  </div>
  <div class="col-md-6">
    <br>
 <input type="checkbox" id="toshipping_checkbox">
  <em>Check this box if Shipping Details and Billing Details are the same.</em>
  <br>
  <br>
    <h3>Special Instructions: </h3>
  <br>

    <textarea class="form-control myform" name="inst" rows="6"><?php if(!empty($inst)) echo $inst ; ?></textarea>


 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-2">
  <br><br><br><br><br>
  <button class="btn btn-primary" name="submitaddress">Submit <i class="fa fa-arrow-right"></i> </button>
</div>

</div>
</div>

</form>




  <br><br>



<?php include 'include/footer.php'; ?>

<script>        
 $("#toshipping_checkbox").on("click",function(){
  var ship = $(this).is(":checked");
  $("[id^='shipping_']").each(function(){
    var tmpID = this.id.split('shipping_')[1];
    $(this).val(ship?$("#"+tmpID).val():"");
  });
});        </script>         

</body>

</html>

