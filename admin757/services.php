<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Services - Admin
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['service_name'])) $page = $_GET['service_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $desp=$_POST['desp'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);

      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/services/".basename($image);

        $data=mysqli_query($con,"UPDATE servicecat SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE servicecat SET `name` = '$name',`slug` = '$slug',`desp` = '$desp' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      header("location:services-$slug");


    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];
   $rows =mysqli_query($con,"SELECT img FROM servicecat where id='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
         $img = $row['img']; 
         unlink("../images/services/".$img);
         }
      $sql = "DELETE FROM servicecat WHERE id=$id ";
      $rows =mysqli_query($con,"SELECT id FROM service where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
                 $pid = $row['id']; 

      $rowsx =mysqli_query($con,"SELECT img FROM simgs where pid='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($rowx=mysqli_fetch_array($rowsx)){
                 $img = $rowx['img']; 
         unlink("../images/services/".$img);

      $sql = "DELETE FROM pimg WHERE pid=$pid  ";
      mysqli_query($con, $sql) ;
       }


     }



      $sql = "DELETE FROM service WHERE pid=$id  ";
      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="service Category Deleted";

      header('location:services');

    }

  }




  
  ?>



  <?php
  if(isset($_POST['addcat'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $slug1=$_POST['newslug'];
       $ordr=$_POST['newordr'];


       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));

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


  $data=mysqli_query($con,"INSERT INTO servicecat (name,slug,img,ordr)VALUES ('$name','$slug','$image','$ordr')")or die( mysqli_error($con) );

    $msg="Category Added" ;
      header("location:services-$slug");

      
  }




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['saveccat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['saveccat'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];

      $ordr=$_POST['ordr'.$i];

       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


      if(isset($_POST['feat'.$i]) ){
        $feat=1;
      }else{
        $feat=0;
      } 






      $sql = "UPDATE service SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="service Updated";


    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delccat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delccat'.$i];
  


      $rowsx =mysqli_query($con,"SELECT img FROM simgs where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($rowx=mysqli_fetch_array($rowsx)){
                 $img = $rowx['img']; 
         unlink("../images/services/".$img);

      $sql = "DELETE FROM simg WHERE pid=$id  ";
      mysqli_query($con, $sql) ;
       }



      $sql = "DELETE FROM service WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="service Deleted";



    }

  }




  
  ?>



  <?php
  if(isset($_POST['addccat'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $slug1=$_POST['newslug'];
       $ordr=$_POST['newordr'];
       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


       $metak=$_POST['newmetak'];
       $metad=$_POST['newmetad'];


       if(isset($_POST['feat']) ){
         $feat=1;
       }else{
         $feat=0;
       } 


       $rows =mysqli_query($con,"SELECT id FROM servicecat where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){

         $id = $row['id']; 
       }
        



  $data=mysqli_query($con,"INSERT INTO service (name,pid,pslug,slug,metak,metad,ordr,feat)VALUES ('$name','$id','$page','$slug','$metak','$metad','$ordr','$feat')");

  ($msg=mysqli_error($con));

  if(empty($msg))  $msg="service Added";


      
  }
  ?>


<style type="text/css">
  
  #catimg{
    height: 100px;
    width:  150px;
  }

  #catimg1{
    width:  200px;
  }  
  #ccatimg{
    height: 70px;
    width:  150px;
  }

  #ccatimg1{
    width:  120px;
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

        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-lightbulb-o"></i> <?php echo $page ?> service
            </div>
            <div class="widget-content padded clearfix">
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

                <th class="hidden-xs">
                  Save
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM service where pslug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $name = $row['name']; 
                  $metak = $row['metak']; 
                  $metad = $row['metad']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 
                  $feat = $row['feat']; 

                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

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



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="saveccat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="dservices-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> </i> <i class="fa fa-pencil"></i></a>


                          <button type="submit" name="delccat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>

                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="newname" value="" required="">
                      </td>

                      <td>
                        <input type="text" class="form-control" name="newslug" value="" required="">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="newmetak" value="">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="newmetad" value="">
                      </td>


                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="newordr" value="" required="">
                      </td>

                      <td  style="max-width: 60px;">
                        <center>
                        <input type="checkbox" style="display: inline-block;" class="" name="feat"  >
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

  <?php } ?>

    

      <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-tags"></i>services Category
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Name 
                 </th>

                 <th>
                   Slug 
                 </th>
                 
                 <th>
                  Image
                </th>
                <th>
                  New Image
                </th>
              
                <th style="max-width: 60px;">
                  Order
                </th>

                <th class="hidden-xs">
                  Add services
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM servicecat  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=1;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $name = $row['name']; 
                  $img = $row['img']; 
                  $desp = $row['desp']; 

                  $ordr = $row['ordr']; 
                  $id = $row['id']; 

                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>

                      <td>
                        <input readonly="" type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                      </td>
                      
                      <td>
                        <img id="catimg" src="../images/services/<?php echo $img ?>" class="form-control" ?>
                      </td>
                      <td>
                        <input id="catimg1"  type="file" class="form-control" name="img<?php echo $n ?>">
                      </td>
                  

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="services-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> </i> <i class="fa fa-plus"></i></a>

                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>
                     <tr>
                        
                      <td style="display:none"  colspan="6"  style="min-width: 300px;">
                        <textarea id="editor<?php echo $n; ?>" name="desp<?php echo $n ?>"><?php echo $desp ?></textarea> 
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>

                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="newname" value="" required="">
                      </td>

                      <td>
                        <input type="text" class="form-control" name="newslug" value="" required="">
                      </td>
                      
                      <td colspan="2">
                        <input type="file" class="form-control" name="img" required="">

                      </td>
                  

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="newordr" value="" required="">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="addcat" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
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