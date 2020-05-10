<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Products - Admin  
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['product_name'])) $page = $_GET['product_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $ordr=$_POST['ordr'.$i];
      $desp=$_POST['desp'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);

      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/products/".basename($image);

        $data=mysqli_query($con,"UPDATE productcat SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE productcat SET `name` = '$name',`slug` = '$slug',`desp` = '$desp' ,`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";


    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];

       $rows =mysqli_query($con,"SELECT img FROM productcat where id='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
         $img = $row['img']; 
         unlink("../images/products/".$img);
         }
  
      $sql = "DELETE FROM productcat WHERE id=$id ";

      $rows =mysqli_query($con,"SELECT id FROM product where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
                 $pid = $row['id']; 

      $rowsx =mysqli_query($con,"SELECT img FROM pimgs where pid='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($rowx=mysqli_fetch_array($rowsx)){
                 $img = $rowx['img']; 
         unlink("../images/products/".$img);

      $sql = "DELETE FROM pimg WHERE pid=$pid  ";
      mysqli_query($con, $sql) ;
       }
     }

      mysqli_query($con, $sql) ;
      $sql = "DELETE FROM product WHERE pid=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="product Category Deleted";

            header("location:products");


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
       $target = "../images/products/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }


  $data=mysqli_query($con,"INSERT INTO productcat (name,slug,img,ordr)VALUES ('$name','$slug','$image','$ordr')")or die( mysqli_error($con) );

    $msg="Category Added" ;


      
  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savesub'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savesub'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $ordr=$_POST['ordr'.$i];
      $desp="";

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);

      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/products/".basename($image);

        $data=mysqli_query($con,"UPDATE productsubcat SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE productsubcat SET `name` = '$name',`slug` = '$slug',`ordr` = '$ordr',`desp` = '$desp' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['addsub'.$i])){
      $msg="Unsuccessful" ;

      $pid=$_POST['addsub'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $pslug=$_POST['pslug'.$i];

      $ordr=$_POST['ordr'.$i];
     $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));

     
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/products/".basename($image);
        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }




  $data=mysqli_query($con,"INSERT INTO productsubcat (name,slug,pid,pslug,img,ordr)VALUES ('$name','$slug','$pid','$pslug','$image','$ordr')")or die( mysqli_error($con) );

      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Category Added";

    }

  }




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delsub'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delsub'.$i];

       $rows =mysqli_query($con,"SELECT img FROM productsubcat where id='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
         $img = $row['img']; 
         unlink("../images/products/".$img);
         }
  

      $rows =mysqli_query($con,"SELECT id FROM product where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
                 $pid = $row['id']; 
                 
      $rowsx =mysqli_query($con,"SELECT img FROM pimgs where pid='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($rowx=mysqli_fetch_array($rowsx)){
                 $img = $rowx['img']; 
         unlink("../images/products/".$img);



      $sql = "DELETE FROM pimg WHERE pid=$pid  ";
      mysqli_query($con, $sql) ;
       }
     }

      $sql = "DELETE FROM product WHERE pid=$id  ";
      mysqli_query($con, $sql) ;


      $sql = "DELETE FROM productsubcat WHERE id=$id ";
      mysqli_query($con, $sql) ;


      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="product Category Deleted";

            header("location:products");


      }

  }
  
  




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savepro'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savepro'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $ordr=$_POST['ordr'.$i];

       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


      if(isset($_POST['feat'.$i]) ){
        $feat=1;
      }else{
        $feat=0;
      } 



      $sql = "UPDATE product SET `name` = '$name',`slug` = '$slug',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Product Updated";

    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delpro'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delpro'.$i];
  

      $rowsx =mysqli_query($con,"SELECT img FROM pimgs where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($rowx=mysqli_fetch_array($rowsx)){
                 $img = $rowx['img']; 
         unlink("../images/products/".$img);

      $sql = "DELETE FROM pimg WHERE pid=$id  ";
      mysqli_query($con, $sql) ;
       }


      $sql = "DELETE FROM product WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Product Deleted";



    }

  }




  
  ?>



  <?php
  if(isset($_POST['addpro'])){

      $msg="Unsuccessful" ;
      
       $pid=$_POST['addpro'];
       $name=$_POST['newname'];
       $slug1=$_POST['newslug'];
       $ordr=$_POST['newordr'];
       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


       if(isset($_POST['feat']) ){
         $feat=1;
       }else{
         $feat=0;
       } 

$rows =mysqli_query($con,"SELECT slug FROM productsubcat where id='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
while($row=mysqli_fetch_array($rows)){
 $pslug = $row['slug'];        }


       $rows =mysqli_query($con,"SELECT pid FROM productsubcat where id='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
       $mid = $row['pid'];        }
       $rows =mysqli_query($con,"SELECT pslug FROM productsubcat where id='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
         $mslug = $row['pslug'];        }
        



  $data=mysqli_query($con,"INSERT INTO product (name,mid,mslug,pid,pslug,slug,ordr,feat)VALUES ('$name','$mid','$mslug','$pid','$pslug','$slug','$ordr','$feat')");

  ($msg=mysqli_error($con));

  if(empty($msg)) {
  header("location:dproducts-$slug");

  } 
  

      
  }
  ?>


<style type="text/css">
  
  #catimg{
    height: 70px;
    width:  70px;
  }

  #catimg1{
    width:  118px;
  }  

  #subimg{
    height: 70px;
    width:  70px;
  }
  #proimg{
    width: 70px;
    height: 70px;
  }


  #subimg1{
    height: 100px;
    width:  150px;
  }

  .filein{
    width: 100px;
  }

  .sptd{
    width: 80px;
    max-width: 80px
  }
</style>

</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 layout-boxed">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>

<?php if (!empty($page)) {
$n=0;

  ?>


      <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-tags"></i><?php echo $page ?> Category
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered" style="border: none">
                <thead>
                  <th colspan="2" style="min-width: 300px;">
                   Name 
                 </th>

                 <th>
                   Slug 
                 </th>
                 
                 <th class="hidden">
                  Image
                </th>
                <th class="hidden" style="max-width: 100px; width: 100px;">
                  New Image
                </th>
              
                <th style="max-width: 60px;">
                  Order
                </th>
                <th></th>

                <th class="">
                  Add/Manage
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM productsubcat where pslug = '$page' ORDER BY ordr  LIMIT $pclimit" ) or die(mysqli_error($con));
                $n=1;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $pslug = $row['slug']; 
                  $name = $row['name']; 
                  $img = $row['img']; 
                  $desp = $row['desp']; 

                  $ordr = $row['ordr']; 
                  $id = $row['id']; 
                  $pid = $row['pid']; 
                  $parentid = $row['id']; 

                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td colspan="2">
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>

                      <td>
                        <input readonly="" type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                      </td>
                      
                      <td class="hidden">
                        <center>
                        <img id="catimg" src="../images/products/<?php echo $img ?>" class="form-control" ?>
                          
                        </center>
                      </td>
                      <td class="hidden">
                        <center>
                        <input id="catimg1"  type="file" class="filein  form-control" name="img<?php echo $n ?>">
                        </center>
                      </td>
                  

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>
                      <td></td>


                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savesub<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>


                          <button type="submit" name="delsub<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>
                     <tr>
                        
                      <td  style="display:none"  colspan="6"  style="min-width: 300px;">
                        <textarea id="editor<?php echo $n; ?>" name="desp<?php echo $n ?>"><?php echo $desp ?></textarea> 
                      </td>
                    </tr>

                  </form>


                  <tr>
                    <td class="sptd" style="border-bottom: none;"></td>
                    <td colspan="" style="min-width:">Product Name</td>
                    <td colspan=""> Product Slug </td>
                    <td class="hidden"> Image </td>
                    <td>Order </td>
                    <td>Featured   </td>
                    <td> Actions </td>
                  </tr>
                
                  <?php

                  $rowsz =mysqli_query($con,"SELECT * FROM product where pslug='$pslug'  ORDER BY ordr LIMIT $plimit" ) or die(mysqli_error($con));
                  

                  while($rowz=mysqli_fetch_array($rowsz)){

                    $proslug = $rowz['slug']; 
                    $proname = $rowz['name']; 
                    $prometak = $rowz['metak']; 
                    $prometad = $rowz['metad']; 
                    $proordr = $rowz['ordr']; 
                    $proid = $rowz['id']; 
                    $profeat = $rowz['feat']; 

                    $prows =mysqli_query($con,"SELECT * FROM pimgs where pslug='$proslug'  AND feat=1  ORDER BY ordr" ) or die(mysqli_error($con));
                    while($prow=mysqli_fetch_array($prows)){
                    $img = $prow['img']; }

                    ?>
                    <form method="post" action="" enctype="multipart/form-data">

                      <tr>
                        <td  style="max-width: 90px;">
                          <center>
                         <div class="hidden"> <?php echo $proid ?> </div>
                         <?php if(!empty($img)){ ?>
                      <img id="proimg" src="../images/products/<?php echo $img ?>" class="" ?>
                    <?php } ?>
                       </center>

                        </td>
                        <td>
                          <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $proname ?>">
                        </td>

                        <td>
                          <input readonly="" type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $proslug ?>">
                        </td>


                        <td  style="max-width: 60px;">
                          <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $proordr ?>">
                        </td>
                        <td  style="max-width: 60px;">
                          <center>
                            <input type="checkbox" style="display: inline-block;" class="" name="feat<?php echo $n ?>" <?php if($profeat==1) echo 'checked' ?> >
                          </center>
                        </td>



                        <td>

                          <div class="btn-group">

                            <button type="submit" name="savepro<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $proid ?>"> <i class="fa fa-save"></i></button>

                            <a href="dproducts-<?php echo $proslug ?>" class="btn btn-primary-outline" value="<?php echo $proid ?>"> </i> <i class="fa fa-pencil"></i></a>


                            <button type="submit" name="delpro<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $proid ?>"> <i class="fa fa-trash-o"></i></button>
                          </div>
                        </td>
                      </tr>

                    </form>

                    <?php $n++; $img=''; } ?>

                    <form method="post" action="" enctype="multipart/form-data">

                      <tr>
                        <td  style="max-width: 60px;"></td>
                        <td>
                          <input type="text" class="form-control" name="newname" value="" required="">
                        </td>

                        <td>
                          <input type="text" class="form-control" name="newslug" value="" required="">
                        </td>


                        <td  style="max-width: 60px;">
                          <input type="text" class="form-control" name="newordr" value="<?php $n++; echo $n ?>" required="">
                       </td>
                       <td>
                          <center>
                            <input type="checkbox" style="display: inline-block;" class="" name="feat"  >
                          </center>
                        </td>



                        <td>

                          <div class="btn-group">

                            <button type="submit" value="<?php echo $parentid ?>" name="addpro" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
                          </div>
                        </td>
                      </tr>

                    </form>



                  <tr style="border: none"><td style="border: none">&nbsp;</td></tr>
                  <tr style="border: none"><td style="border: none">&nbsp;</td></tr>



                  <?php $n++; } ?>


                  <form method="post" action="" enctype="multipart/form-data">

                      <tr>
                        <td colspan="2">
                          <input placeholder="New SubCategory" type="text" class="form-control" name="name<?php echo $n; ?>" value="" required="">
                        </td>

                        <td>
                          <input placeholder="SubCategory Slug" type="text" class="form-control" name="slug<?php echo $n; ?>" value="" required="">
                        </td>
                        <td colspan="2" class="hidden">
                          <input  id="catimg1" type="file" class="form-control" name="img<?php echo $n; ?>" value="">
                        </td>
                        <td style="display:none">
                          <input type="text" class="form-control" name="pslug<?php echo $n; ?>" value="<?php echo $page ?>">
                        </td>

                        <td  style="max-width: 60px;">
                          <input placeholder="Ord." type="text" class="form-control" name="ordr<?php echo $n; ?>" value="" required="">
                        </td>

                        <td>
                        </td>
                        <td>

                          <div class="btn-group">

                            <button type="submit" value="<?php echo $pid ?>" name="addsub<?php echo $n; ?>" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
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
  <?php }else{ ?>

    

      <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-tags"></i>Products Category
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered" style="border: none">
                <thead>
                  <th colspan="2" style="min-width: 300px;">
                   Name 
                 </th>

                 <th>
                   Slug 
                 </th>
                 
                 <th>
                  Image
                </th>
                <th style="max-width: 100px; width: 100px;">
                  New Image
                </th>
              
                <th style="max-width: 60px;">
                  Order
                </th>

                <th class="hidden-xs">
                  Add/Manage
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM productcat  ORDER BY ordr  LIMIT $pclimit" ) or die(mysqli_error($con));
                $n=1;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $pslug = $row['slug']; 
                  $name = $row['name']; 
                  $img = $row['img']; 
                  $desp = $row['desp']; 

                  $ordr = $row['ordr']; 
                  $id = $row['id']; 
                  $parentid = $row['id']; 

                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td colspan="2">
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>

                      <td>
                        <input readonly="" type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                      </td>
                      
                      <td>
                        <center>
                        <img id="catimg" src="../images/products/<?php echo $img ?>" class="form-control" ?>
                          
                        </center>
                      </td>
                      <td>
                        <center>
                        <input id="catimg1"  type="file" class="filein  form-control" name="img<?php echo $n ?>">
                        </center>
                      </td>
                  

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>


                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>
                     <tr>
                        
                      <td  style="display:none"  colspan="6"  style="min-width: 300px;">
                        <textarea id="editor<?php echo $n; ?>" name="desp<?php echo $n ?>"><?php echo $desp ?></textarea> 
                      </td>
                    </tr>

                  </form>


                  <tr>
                    <td class="sptd" style="border-bottom: none;"></td>
                    <td colspan="2" style="min-width:">SubCategory Name</td>
                    <td colspan="2"> SubCategory Slug </td>
                    <td class="hidden"> Image </td>
                    <td>Order </td>
                    <td> Action </td>
                  </tr>
                <?php

                $rowsx =mysqli_query($con,"SELECT * FROM productsubcat where pslug='$pslug'  ORDER BY ordr LIMIT $pslimit " ) or die(mysqli_error($con));
                $p=0;

                while($rowx=mysqli_fetch_array($rowsx)){

                  $slug = $rowx['slug']; 
                  $name = $rowx['name']; 
                  $img = $rowx['img']; 

                  $ordr = $rowx['ordr']; 
                  $id = $rowx['id']; 


                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td class="sptd" style="border:none; border-left: 1px solid #ddd;"></td>

                      <td colspan="2">
                        <input type="text" class="form-control" name="name<?php echo $p ?>" value="<?php echo $name ?>">
                      </td>

                      <td colspan="2">
                        <input  type="text" class="form-control" name="slug<?php echo $p ?>" value="<?php echo $slug ?>">
                      </td>


                      <td class="hidden"  style="max-width: 60px;">
                        <center>
                          <img src="../images/products/<?php echo $img ?>" class="form-control" id="subimg">

                      </center>
                      </td>

                      <td class="hidden"  style="max-width: 60px;">
                        <center>
                        <input  id="catimg1" type="file" class="form-control" name="img<?php echo $p; ?>" value="">

                      </center>
                      </td>


                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $p ?>" value="<?php echo $ordr ?>">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savesub<?php echo $p ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="products-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> </i> <i class="fa fa-plus"></i></a>


                          <button type="submit" name="delsub<?php echo $p ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>
                  <?php $p++; } ?>

                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td class="sptd" style="border:none; border-left: 1px solid #ddd;border-bottom: 1px solid #ddd"></td>
                      <td colspan="2">
                        <input placeholder="New SubCategory" type="text" class="form-control" name="name<?php echo $n; ?>" value="" required="">
                      </td>

                      <td colspan="2">
                        <input placeholder="SubCategory Slug" type="text" class="form-control" name="slug<?php echo $n; ?>" value="" required="">
                      </td>
                       <td colspan="2" class="hidden">
                        <input  id="catimg1" type="file" class="form-control" name="img<?php echo $n; ?>" value="">
                      </td>
                      <td style="display:none">
                        <input type="text" class="form-control" name="pslug<?php echo $n; ?>" value="<?php echo $pslug ?>">
                      </td>

                      <td  style="max-width: 60px;">
                        <input placeholder="Ord." type="text" class="form-control" name="ordr<?php echo $n; ?>" value="" required="">
                      </td>

                      <td>

                        <div class="btn-group">

                          <button type="submit" value="<?php echo $parentid ?>" name="addsub<?php echo $n; ?>" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <tr style="border: none"><td style="border: none">&nbsp;</td></tr>
                  <tr style="border: none"><td style="border: none">&nbsp;</td></tr>



                  <?php $n++; } ?>



                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td colspan="2">
                        <input placeholder="New Products Category" type="text" class="form-control" name="newname" value="" required="">
                      </td>

                      <td>
                        <input placeholder="New Category Slug" type="text" class="form-control" name="newslug" value="" required="">
                      </td>
                      
                      <td colspan="2">
                        <input type="file" class="form-control" name="img" required="">

                      </td>
                  

                      <td  style="max-width: 60px;">
                        <input placeholder="Ord." type="text" class="form-control" name="newordr" value="" required="">
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
<?php } ?>

<div class="space"></div>



  </div>
</div>

<?php include('include/footer.php') ?>

</body>
</html>