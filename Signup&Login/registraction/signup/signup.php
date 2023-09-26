<?php
$success=0;
$user=0;
if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    // $sql="insert into `registration` (username,password)
    // values('$username','$password')";
    // $result=mysqli_query($con,$sql);

    // if ($result){
    //     echo "Data inserted Succefully";
    // }
    // else{
    //     die(mysqli_error($con));
    // }
    $sql="Select *from `registration` where username='$username'";
    $result=mysqli_query($con,$sql);
    if ($result){
        $num=mysqli_num_rows($result);
        if ($num>0){
            // echo "User already exist";
            $user=1;
        }
        else{
            $sql="insert into `registration` (username,password)
            values('$username','$password')";
            $result=mysqli_query($con,$sql);
            if ($result){
                // echo "Signup Succefully";
                $success=1;
            }
            else{
                die(mysqli_error($con));
            }


        }
    }
 


}
?>









<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Signup</title>
  </head>
  <body>
    <?php
    if ($user){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry! Please Login </strong> User already exist .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <?php
    if ($success){
        echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done! Success</h4>
        <p>Huury !Sign up succesful</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>';
    }
    ?>
<h1 class="text-center" >Signup page </h1>
    <div class="container-fluid" mt-5 >
    <form action="signup.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="username">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  placeholder="Enter your Password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>