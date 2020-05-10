<?php 
session_start();
if(isset($_SESSION['name'])){
  header("location:admin757/index.php");
}
?>
 <?php include"include/connect.php";?>


<html>
  <head>

<link href="css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
<link href="custom.css" media="all" rel="stylesheet" type="text/css" />

    <title>
      Login
    </title>
    
  </head>
  <body class="login1">
    <!-- Login Screen -->
    <div class="container">
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4 text-center">
        <br><br>
        <h1>
          <a href="#" class="textcolor">Admin Login</a>
        </h1>
        <form action="" method="post">
          <div class="form-group">
            <input class="form-control" name="username" placeholder="Username" type="text">
          </div>
          <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password">
          </div>
          <div class="form-group">

            <input type="submit" name="login" class="btn bgcolor" value="Submit >">
          </div>
          
        </form>
        

        <?php
                       
           if (isset($_POST['login'])) {
                       if (empty($_POST['username']) || empty($_POST['password'])) {
                       echo "Username or Password is empty";
                       }
                       else
                       {
                       $username=$_POST['username'];
                       $password=$_POST['password'];
                       $username3 = stripslashes($username);
                       $username2 = str_replace("<", "", $username3);
                       $username1 = str_replace(">", "", $username2);
                       $username = str_replace("'", "", $username1);
                       $password3 = stripslashes($password);
                       $password2 = str_replace("<", "", $password3);
                       $password1 = str_replace(">", "", $password2);
                       $password = str_replace("'", "", $password1);



                       $query = mysqli_query($con,"SELECT * from users where password='$password' AND username='$username'")or die(mysqli_error($con));
                       $rows = mysqli_num_rows($query);
                       if ($rows == 1) {



                       $_SESSION['name']=$username; // Initializing Session
                      
                  
                       header("location:admin757/home"); // Redirecting To Other Page
                       } else {
                        echo "Username or Password is Invalid";

                       }
                       }
                       }

                       ?>





     </div>
    </div>
    <!-- End Login Screen -->
  </body>
</html>