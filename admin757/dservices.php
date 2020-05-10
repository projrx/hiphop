<html>
<head>

  <?php include('include/head.php') ?>

  <title>
    service Details
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['dservice_name'])) $page = $_GET['dservice_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>

<?php

  for ($i=0; $i < 2 ; $i++) { 

    if(isset($_POST['upcat'.$i])){
      $msg="Unsuccessful" ;

    
    $id=$_POST['upcat'.$i];

    $name=$_POST['name'.$i];
    $slug1=$_POST['slug'.$i];
    $metak=$_POST['metak'.$i];
    $metad=$_POST['metad'.$i];
    $desp=$_POST['desp'.$i];

    $ordr=$_POST['ordr'.$i];

     $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));

     if(isset($_POST['feat'.$i]) ){
       $feat=1;
     }else{
       $feat=0;
     } 



     $sql = "UPDATE service SET `name` = '$name',`slug` = '$slug',`desp` = '$desp',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

     mysqli_query($con, $sql) ;
     ($msg=mysqli_error($con));
     if(empty($msg))  $msg="Service Updated"; 


    }

  }






  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['saveccat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['saveccat'.$i];

      $ordr=$_POST['ordr'.$i];

      if(isset($_POST['feat'.$i]) ){
        $feat=1;
      }else{
        $feat=0;
      } 



      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/services/".basename($image);

        $data=mysqli_query($con,"UPDATE simgs SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE simgs SET `ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Image Updated";


    }

  }



  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['delccat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delccat'.$i];
  

      $rowsx =mysqli_query($con,"SELECT img FROM simgs where id='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($rowx=mysqli_fetch_array($rowsx)){
                 $img = $rowx['img']; 
         unlink("../images/services/".$img);
       }

      $sql = "DELETE FROM simgs WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Image Deleted";

    }

  }




  
  ?>



  <?php
  if(isset($_POST['addccat'])){

      $msg="Unsuccessful" ;
      

       $ordr=$_POST['newordr'];


       if(isset($_POST['feat']) ){
         $feat=1;
       }else{
         $feat=0;
       } 


       $rows =mysqli_query($con,"SELECT id FROM service where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){

         $id = $row['id']; 
       }
        

       // Get image name
       $image = $_FILES['img']['name'];
       $image = md5(uniqid())  . "1.png";
       
       // image file directory
       $target = "../images/services/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }


  $data=mysqli_query($con,"INSERT INTO simgs (pid,pslug,img,ordr,feat)VALUES ('$id','$page','$image','$ordr','$feat')");

  ($msg=mysqli_error($con));

  if(empty($msg))  $msg="Image Added";

    $msg="Image  Added" ;
      
  }
  ?>



<style type="text/css">
  
  #catimg{
    height: 100px;
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

  }

</style>

</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 layout-boxed">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>

<?php if (!empty($page)) {


  ?>

    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-lightbulb-o"></i> <?php echo $page ?> service Details
              <span style="float: right;    text-decoration: underline;">
              <a href="services-add-services"> <i class="fa fa-reply"></i>Back to services </a>
            </span>
            </div>
            <div class="widget-content padded clearfix">
               <form method="post" action="" enctype="multipart/form-data">

              <table class="table table-bordered">
                <thead>
                 <th>
                    Name 
                  </th>

                  <th>
                    Slug 
                  </th>

                  <th>
                   Meta Keywords
                 </th>
                 <th>
                   Meta Descp
                 </th>
                 <th style="max-width: 60px;">
                   Order
                 </th>
                 <th style="max-width: 60px;">
                   Feature
                 </th>




              </thead>
              <tbody>

             

             <?php

             $rows =mysqli_query($con,"SELECT * FROM service where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
             $n=0;

             while($row=mysqli_fetch_array($rows)){

               $slug = $row['slug']; 
               $name = $row['name']; 
               $metak = $row['metak']; 
               $metad = $row['metad']; 
               $ordr = $row['ordr']; 
               $id = $row['id']; 
               $feat = $row['feat']; 
               $desp = $row['desp']; 

               ?>

                 <tr>
                   <td>
                     <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                   </td>

                   <td>
                     <input type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                   </td>
                   <td>
                     <input type="text" class="form-control" name="metak<?php echo $n ?>" value="<?php echo $metak ?>">
                   </td>
                   <td>
                     <input type="text" class="form-control" name="metad<?php echo $n ?>" value="<?php echo $metad ?>">
                   </td>


                   <td  style="max-width: 60px;">
                     <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                   </td>
                   <td  style="max-width: 60px;">
                     <center>
                     <input type="checkbox" style="display: inline-block;" class="" name="feat<?php echo $n ?>" <?php if($feat==1) echo 'checked' ?> >
                   </center>
                   </td>





                  <?php } ?>


                </tbody>
              </table>

              <textarea name="desp<?php echo $n ?>" id="editor1"><?php echo $desp; ?></textarea>
              <br><br>

                <center>

                 <button type="submit" name="upcat<?php echo $n ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i> Save</button>

              </center>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>



  <div class="container-fluid main-content">
    <div class="row">
      <!-- Basic Table -->
      <div class="col-lg-1">
      </div>
      <div class="col-lg-10">
        <div class="widget-container fluid-height clearfix">
          <div class="heading" style="text-transform: capitalize;">
            <i class="fa fa-picture-o"></i> <?php echo $page ?> Images
          </div>
          <div class="widget-content padded clearfix">
            <table class="table table-bordered">
              <thead>


               <th>
                Image
              </th>
              <th>
                New Image
              </th>
              <th style="max-width: 60px;">
                Order
              </th>
              <th style="max-width: 60px;">
                Feature
              </th>

              <th class="hidden-xs">
                Save
              </th>


            </thead>
            <tbody>

              <?php

              $rows =mysqli_query($con,"SELECT * FROM simgs where pslug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
              $n=0;

              while($row=mysqli_fetch_array($rows)){


                $img = $row['img']; 
                $ordr = $row['ordr']; 
                $id = $row['id']; 
                $feat = $row['feat']; 

                ?>
                <form method="post" action="" enctype="multipart/form-data">

                  <tr>

                    <td>
                      <img id="ccatimg" src="../images/services/<?php echo $img ?>" class="form-control" ?>
                    </td>
                    <td>
                      <input id="ccatimg1"  type="file" class="form-control" name="img<?php echo $n ?>">
                    </td>

                    <td  style="max-width: 60px;">
                      <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                    </td>
                    <td  style="max-width: 60px;">
                      <center>
                      <input type="checkbox" style="display: inline-block;" class="" name="feat<?php echo $n ?>" <?php if($feat==1) echo 'checked' ?> >
                    </center>
                    </td>



                    <td>

                      <div class="btn-group">

                        <button type="submit" name="saveccat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                        <button type="submit" name="delccat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                      </div>
                    </td>
                  </tr>

                </form>

                <?php $n++; } ?>

                <form method="post" action="" enctype="multipart/form-data">

                  <tr>
                 

                    <td colspan="2">
                      <input type="file" class="form-control" name="img" >

                    </td>

                    <td  style="max-width: 60px;">
                      <input type="text" class="form-control" name="newordr" value="0">
                    </td>

                    <td  style="max-width: 60px;">
                      <center>
                      <input type="checkbox" style="display: inline-block;" class="" name="feat" <?php if($n==0) echo 'checked' ; ?> >
                      </center>
                    </td>



                    <td>

                      <div class="btn-group">

                        <button type="submit" name="addccat" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
                      </div>
                    </td>
                  </tr>

                </form>

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

</body>
</html>