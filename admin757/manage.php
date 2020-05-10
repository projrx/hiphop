<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Manage
  </title>

  <?php $link = $_GET['page_name'] ?>

  <?php

  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['saveres'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['saveres'.$i];
      $name=$_POST['name'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];
      $ordr=$_POST['ordr'.$i];


      $sql = "UPDATE pages SET `name` = '$name',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Saved";


    }

  }



  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['savecus'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecus'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];
      $ordr=$_POST['ordr'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);


      $sql = "UPDATE pages SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Saved";


    }

  }



  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['delcus'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcus'.$i];
  
      $sql = "DELETE FROM pages WHERE id=$id AND res=0 ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Page Deleted";

    }

  }




  
  ?>



  <?php
  if(isset($_POST['addcus'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $slug1=$_POST['newslug'];
       $metak=$_POST['newmetak'];
       $metad=$_POST['newmetad'];
       $ordr=$_POST['newordr'];


       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


  $data=mysqli_query($con,"INSERT INTO pages (name,slug,metak,metad,ordr)VALUES ('$name','$slug','$metak','$metad','$ordr')")or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Page Added";
      
  }

  ?>
  
  <?php
  if(isset($_POST['admin'])){

      $msg="Unsuccessful" ;
      
       $user=$_POST['user'];
       $pass=$_POST['pass'];
       
  $sql = "UPDATE users SET `username` = '$user',`password` = '$pass' ";





  $data=mysqli_query($con,$sql)or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Admin Updated";
      
  }

  ?>
  




</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 layout-boxed">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>


    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->

        <div class="col-md-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-cogs"></i>Manage Website
            </div>
            <div class="widget-content padded clearfix">
              <div class="row">
                <div class="col-md-4">
                   <a class="ordera" href="index">
                    <div class="card" style="background: #fff">
                    <i class="fa fa-home"></i> Manage Homepage Sliders<span class="or"><i class="fa fa-arrow-right"></i></span>

                  </div>
                    </a>
                </div>

                <div class="col-md-4">
                   <a class="ordera" href="products">
                    <div class="card" style="background: #fff">
                    <i class="fa fa-list"></i> Manage Products Category<span class="or"><i class="fa fa-arrow-right"></i></span>

                  </div>
                    </a>
                </div>

                <div class="col-md-4">
                   <a class="ordera" href="contacts">
                    <div class="card" style="background: #fff">
                    <i class="fa fa-envelope"></i> Manage Contacts Details<span class="or"><i class="fa fa-arrow-right"></i></span>

                  </div>
                    </a>
                </div>

            </div>
          </div>

<br>

        </div>
      </div>
    </div>

<br>



    <div class="container-fluid main-content hidden">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-bookmark"></i>Reserved Pages
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Name 
                 </th>

                 <th>
                  Meta Keywords
                </th>
                <th>
                  Meta Description
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

                $rows =mysqli_query($con,"SELECT * FROM pages where res=1  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $name = $row['name']; 
                  $metak = $row['metak']; 
                  $metad = $row['metad']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 

                  ?>
                  <form method="post" action="">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
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



                      <td>

                        <button type="submit" name="saveres<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>







    <div class="container-fluid main-content ">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix hidden">
            <div class="heading">
              <i class="fa fa-edit"></i>Custom Pages
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
                  Meta Description
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

                $rows =mysqli_query($con,"SELECT * FROM pages where res=0  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $name = $row['name']; 
                  $metak = $row['metak']; 
                  $metad = $row['metad']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 

                  ?>
                  <form method="post" action="">

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



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecus<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="cpages-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> <i class="fa fa-pencil"></i></a>

                          <button type="submit" name="delcus<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>

                  <form method="post" action="">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="newname" value="">
                      </td>

                      <td>
                        <input type="text" class="form-control" name="newslug" value="">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="newmetak" >
                      </td>
                      <td>
                        <input type="text" class="form-control" name="newmetad">
                      </td>

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="newordr" value="">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="addcus" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
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
      
      
      
        <br>
      
       <div class="widget-content padded clearfix">
        <center><h4> Current Limits: </h4></center>
              <table class="table table-bordered">
                <tr>
                  <td> Orders Limit Asc : <?php echo $glimit ?></td>
                  <td> Products /SubCat: <?php echo $plimit ?></td>
                  <td> Product Category: <?php echo $pslimit ?></td>
                  <td> Product SubCategory: <?php echo $pslimit ?></td>
                  <td> (Functional): <?php echo $ilimit ?></td>

              </table>
            </div>
        <br>
      
       <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Username 
                 </th>

                 <th>
                     Password
                </th>
                

              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM users " ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $name = $row['username']; 
                  $pass = $row['password']; 
                  

                  ?>
                  <form method="post" action="">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="user" value="<?php echo $name ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pass" value="<?php echo $pass ?>">
                      </td>
                 
                 


                      <td>

                        <button type="submit" name="admin" class="btn btn-success-outline"> <i class="fa fa-save"></i></button>

                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>



                </tbody>
              </table>
            </div>
            
            <center><a class="btn btn-danger" href="logout.php">Logout</a></center>
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
  </div>
</div>

<?php include('include/footer.php') ?>

</body>
</html>