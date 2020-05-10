<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Dashboard
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];


      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/slider/".basename($image);

        $data=mysqli_query($con,"UPDATE slider SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE slider SET `name` = '$name',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];
  
      $sql = "DELETE FROM slider WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Slide Deleted";



    }

  }




  if(isset($_POST['addcat'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $ordr=$_POST['newordr'];


      
       // Get image name
       $image = $_FILES['img']['name'];
       $image = md5(uniqid())  . "1.png";
       
       // image file directory
       $target = "../images/slider/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }


  $data=mysqli_query($con,"INSERT INTO slider (name,img,ordr)VALUES ('$name','$image','$ordr')")or die( mysqli_error($con) );

    $msg="Slide Added" ;

      
  }




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecatf'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecatf'.$i];
      $name=$_POST['name'.$i];
      $desp1=$_POST['desp'.$i];
      $ordr=$_POST['ordr'.$i];

        $desp = str_replace("'", "''", $desp1);   

      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/slider/".basename($image);

        $data=mysqli_query($con,"UPDATE field SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE field SET `name` = '$name',`ordr` = '$ordr',`desp` = '$desp' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcatf'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcatf'.$i];
  
      $sql = "DELETE FROM field WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Field Deleted";



    }

  }




  if(isset($_POST['addcatf'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $desp1=$_POST['newdesp'];
       $ordr=$_POST['newordr'];

        $desp = str_replace("'", "''", $desp1);   

      
       // Get image name
       $image = $_FILES['img']['name'];
       $image = md5(uniqid())  . "1.png";
       
       // image file directory
       $target = "../images/slider/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }


  $data=mysqli_query($con,"INSERT INTO field (name,img,ordr,desp)VALUES ('$name','$image','$ordr','$desp')")or die( mysqli_error($con) );

    $msg="Field Added" ;

      
  }




  ?>



      <?php
        if(isset($_POST['submitpost'])){
          $msg="Unsuccessful" ;

      

          $post=$_POST['editor1'];

    

          if (!empty($_FILES['image1']['name'])) {
              
            // Get image name
            $image = $_FILES['image1']['name'];
            $image = md5(uniqid())  . "1.png";
            
            // image file directory
            $target = "../images/".basename($image);

            $data=mysqli_query($con,"UPDATE home SET `img`='$image' where `id`=1")or die( mysqli_error($con) );

            if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
              $msg = "Image uploaded successfully";
            }else{
              $msg = "Failed to upload image";
            }


          }


          $sql = "UPDATE home SET `post` = '$post' WHERE `id` =1";

       


          mysqli_query($con, $sql) ;
          ($msg=mysqli_error($con));
          if(empty($msg))  $msg="Saved";


        }
  ?>


      <?php
        if(isset($_POST['submitvid'])){
          $msg="Unsuccessful" ;

      

          $vidpost=$_POST['editor2'];
          $vid=$_POST['vid'];

    

          if (!empty($_FILES['image1']['name'])) {
              
            // Get image name
            $image = $_FILES['image1']['name'];
            $image = md5(uniqid())  . "1.png";
            
            // image file directory
            $target = "../images/".basename($image);

            $data=mysqli_query($con,"UPDATE home SET `vidimg`='$image' where `id`=1")or die( mysqli_error($con) );

            if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
              $msg = "Image uploaded successfully";
            }else{
              $msg = "Failed to upload image";
            }


          }


          $sql = "UPDATE home SET `vid` = '$vid',`vidpost` = '$vidpost' WHERE `id` =1";

       


          mysqli_query($con, $sql) ;
          ($msg=mysqli_error($con));
          if(empty($msg))  $msg="Saved";


        }
  ?>


<!--      This is for Marquee if need to add 
  <?php



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savemar'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savemar'.$i];
      $name=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];
      $url=$_POST['url'.$i];




      $sql = "UPDATE marquee SET `text` = '$name',`url` = '$url',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delmar'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delmar'.$i];
  
      $sql = "DELETE FROM marquee WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Deleted";



    }

  }




  if(isset($_POST['addmar'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $url=$_POST['newurl'];
       $ordr=$_POST['newordr'];


     

  $data=mysqli_query($con,"INSERT INTO marquee (text,url,ordr)VALUES ('$name','$url','$ordr')")or die( mysqli_error($con) );

    $msg="Added" ;

      
  }

?>


-->


  <style type="text/css">
    
    #catimg{
      min-height: 600px;

    }

    #catimg1{
      width:  200px;
    }  
    #ccatimg{
      height: 120px;
      width:  200px;
    }

    #ccatimg1{
      width:  250px;
    }

    #fccatimg{
      height:100px;
      width:  120px;
    }

    #fccatimg1{
      width:  110px;
    }




  </style>


</head>
<body onload="showtoast()" class="page-header-fixed bg-1 layout-boxed">
  <div class="modal-shiftfix">


    <?php include('include/header.php') ?>






    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-picture-o"></i> Slider
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Title 
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
                  Save
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM slider  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
                  $name = $row['name']; 
                  $img = $row['img']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 


                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>

                      <td>
                        <img id="ccatimg" src="../images/slider/<?php echo $img ?>" class="form-control" >
                      </td>
                      <td>
                        <input id="ccatimg1"  type="file" class="form-control" name="img<?php echo $n ?>">
                      </td>

                      <td  style="max-width: 60px;">
                        <input required="" type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>
                     



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>

                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="newname" value="">
                      </td>

                      <td colspan="2">
                        <input required="" type="file" class="form-control" name="img" >

                      </td>

                      <td  style="max-width: 60px;">
                        <input required="" type="text" class="form-control" name="newordr" value="">
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

<hr>



<div class="widget-container hidden ">

<?php

$rows =mysqli_query($con,"SELECT * FROM home" ) or die(mysqli_error($con));
$n=0;

while($row=mysqli_fetch_array($rows)){

  $post = $row['post']; 
  $img = $row['img']; 



  }
?>

<br><br>

      <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">

          <textarea name="editor1"> <?php echo $post ?> </textarea>

        </div>

        <div class="col-md-6">


                  <center>
                      <img src="../images/<?php echo $img ; ?>" style="height: 500px" class="form-control">
                      <br><br>
                      <input type="file" style="width: 400px;" name="image1" class="form-control">

          <br>

                  </center>

        </div>

    </div>


            <center>
           

    <br>
                <input type="submit" name="submitpost" class="btn">
            </center>


  </form>
    <br>


  </div>






  <?php

  $rows =mysqli_query($con,"SELECT * FROM home" ) or die(mysqli_error($con));
  $n=0;

  while($row=mysqli_fetch_array($rows)){

    $msg2 = $row['msg']; 
    $vidimg = $row['vidimg']; 
    $vid = $row['vid']; 
    $vidpost = $row['vidpost']; 

    }
  ?>


<br>


<hr>

     <div class="widget-container hidden">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="col-md-12">

<br>
                  <center>
                      <img src="../images/<?php echo $vidimg ; ?>" style="height: 600px" class="form-control">
                      <br>
                      <input type="file" style="width: 400px;" name="image1" class="form-control">


          <textarea style="display: none;" name="vid" class="form-control"> <?php echo $vid ?> </textarea>

<br>
        <h3>Post</h3>

          <textarea name="editor2"> <?php echo $vidpost ?> </textarea>

<br>

          
                  </center>
        </div>


        </div>



            <center>
                
    <br>

                <input type="submit" name="submitvid" value="Save" class="btn">
            </center>

    <br>

  </form>

  </div>

  <div class="space">
  </div>




  </div>

  <?php include('include/footer.php') ?>

</body>
</html>