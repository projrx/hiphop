<html>
  <head>

    <?php include('include/head.php') ?>


    <title>
      Contact Details
    </title>

    <?php $link = $_GET['page_name'] ?>
    <?php $page = $_GET['page_name'] ?>



    <?php
      if(isset($_POST['saveinfo'])){
        $msg="Unsuccessful" ;

    

        $post=$_POST['editor1'];

  

        if (!empty($_FILES['image1']['name'])) {
            
          // Get image name
          $image = $_FILES['image1']['name'];
          $image = md5(uniqid())  . "1.png";
          
          // image file directory
          $target = "../images/covers/".basename($image);

          $data=mysqli_query($con,"UPDATE contact SET `cover`='$image' where `id`=1")or die( mysqli_error($con) );

          if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
          }else{
            $msg = "Failed to upload image";
          }


        }


        $sql = "UPDATE contact SET `post` = '$post' WHERE `id` =1";

     


        mysqli_query($con, $sql) ;
        ($msg=mysqli_error($con));
        if(empty($msg))  $msg="Saved";


      }
?>





<?php
  if(isset($_POST['submit'])){
    $msg="Unsuccessful" ;




    $sitename = $_POST['sitename'];  

    $sitephone = $_POST['sitephone'];  
    $sitemail = $_POST['sitemail'];  
    $siteaddress1 = $_POST['siteaddress'];  
    $siteaddress=str_replace("'", "''", $siteaddress1);


    $gmaps = $_POST['gmaps'];  
    $fpost1 = $_POST['fpost'];

    $fpost=str_replace("'", "''", $fpost1);


    $facebook = $_POST['facebook'];  
    $twitter = $_POST['twitter'];  
    $insta = $_POST['insta'];  
    $youtube = $_POST['youtube'];


    if (!empty($_FILES['image1']['name'])) {
        
      // Get image name
      $image = $_FILES['image1']['name'];
      $image = md5(uniqid())  . "1.png";
      
      // image file directory
      $target = "../images/".basename($image);

          $data=mysqli_query($con,"UPDATE contact SET `logo`='$image' where `id`=1")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }


    $sql = "UPDATE contact SET `sitename` = '$sitename',`phone` = '$sitephone',`email` = '$sitemail',`address` = '$siteaddress',`gmaps` = '$gmaps',`fpost` = '$fpost',`facebook` = '$facebook',`twitter` = '$twitter',`insta` = '$insta',`youtube` = '$youtube' WHERE `id` =1";

 


    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Saved";




  }

  ?>

  </head>
  <body  onload="showtoast()"  class="page-header-fixed bg-1 layout-boxed">
    <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
     


    <?php

    $rows =mysqli_query($con,"SELECT * FROM contact where id=1 " ) or die(mysqli_error($con));
    

    while($row=mysqli_fetch_array($rows)){

      $pagepost = $row['post'];
      $pagecover = $row['cover'];

    }

    ?>




        <div class="row hidden  ">

          <div class="col-md-2">
          </div>
          <div class="col-md-8">

            <img id="coverimg" src="../images/covers/<?php echo $pagecover ?>"  class="form-control">

          </div>
        </div>
        <form class="hidden" method="post" action="" enctype="multipart/form-data">
     

<br>
<br>
        
        <div class="row hidden">



            <div class="col-md-4">
            </div>
            <div class="col-md-2">
             <div class="form-group"> <span>CHange Cover :  </span> </div>
            </div>
            <div class="col-md-4">
              <input type="file" name="image1"> 
            </div>
            <div class="col-md-2">
            </div>
          </div>
<br>


          <div class="row hidden">


            <div class="col-md-12">

          
       <textarea name="editor1"><?php echo $pagepost ?></textarea>
                     
          </div>
        </div>
        <br><br>

        <center>
                    <button type="submit" name="saveinfo" class="btn btn-primary" value=""> <i class="fa fa-save"></i> Save</button>

                  </center>

    <br><br>
    <br><br>
  </form>


    <hr>
    <center><h2>Contact Details</center>
  

    <?php

    $rows =mysqli_query($con,"SELECT * FROM contact " ) or die(mysqli_error($con));
    

    while($row=mysqli_fetch_array($rows)){

      $sitename = $row['sitename'];  
      $sitelogo = $row['logo'];  
      $sitephone = $row['phone'];  
      $sitemail = $row['email'];  
      $siteaddress = $row['address'];  
      $gmaps = $row['gmaps'];  
      $fpost = $row['fpost'];  
      $facebook = $row['facebook'];  
      $twitter = $row['twitter'];  
      $insta = $row['insta'];  
      $youtube = $row['youtube'];  

    }

    ?>
  <form method="post" action="" enctype="multipart/form-data">

    <div class="row">
      <div class="col-md-3">

      </div>

      <div class="col-md-6">

        <table>
          <thead>
            
          </thead>
          <tbody>


            <tr>
              <td> Site Name: </td>
              <td> <input type="text" name="sitename" class="form-control" value="<?php echo $sitename ?>"> </td>
            </tr>
            <tr>
              <td> Site Phone: </td>
              <td> <input type="text" name="sitephone" class="form-control" value="<?php echo $sitephone ?>"> </td>
            </tr>
            <tr>
              <td> Site Email: </td>
              <td> <input type="text" name="sitemail" class="form-control" value="<?php echo $sitemail ?>"> </td>
            </tr>

            <tr>
              <td> Site Address: </td>
              <td> <textarea name="siteaddress" class="form-control"><?php echo $siteaddress ?> </textarea> </td>
            </tr>

            <tr class="hidden">
              <td>Map Code: </td>
              <td> <textarea name="gmaps" class="form-control"><?php echo $gmaps ?> </textarea> </td>
            </tr>
            <tr >
              <td>Opening Time : </td>
              <td> <textarea name="fpost" class="form-control"><?php echo $fpost ?> </textarea> </td>
            </tr>
            <tr>
              <td> Facebook: </td>
              <td> <input type="text" name="facebook" class="form-control" value="<?php echo $facebook ?>"> </td>
            </tr>
            <tr class="hidden">
              <td class=""> Twitter: </td>
              <td> <input type="text" name="twitter" class="form-control" value="<?php echo $twitter ?>"> </td>
            </tr>
            <tr>
              <td> Instagram: </td>
              <td> <input type="text" name="insta" class="form-control" value="<?php echo $insta ?>"> </td>
            </tr>
            <tr class="hidden">
              <td> Youtube: </td>
              <td> <input type="text" name="youtube" class="form-control" value="<?php echo $youtube ?>"> </td>
            </tr>





          </tbody>
        </table>

        <br><br>
        Logo:

        <center>
            <img src="../images/<?php echo $sitelogo ; ?>" style="width: 100px">

            <input type="file" style="width: 400px;" name="image1" class="form-control">

<br>
<br>
            <input type="submit" name="submit" class="btn">
        </center>

     </div>


    </div>

  </form>

    <div class="space">
    </div>



    </div>

    <?php include('include/footer.php') ?>

  </body>
</html>