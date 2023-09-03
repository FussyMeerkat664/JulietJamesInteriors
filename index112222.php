<?php
  session_start();
//Database Configuration File
include('connection.php');
error_reporting(0);

  if(isset($_POST['login']))
  {

//Genrating random number for salt

    // Getting username/ email and password
     $email=$_POST['email'];
    //  $password=hash('sha256',$_POST['password']);
    $password=$_POST['password'];
     // Hashing with Random Number
    //  $saltedpasswrd=hash('sha256',$password.$_SESSION['randnum']);
    // Fetch stored password  from database on the basis of username/email 
    $sql ="SELECT Email,Password FROM TblUser WHERE Email=:email";
    $query= $conn -> prepare($sql);
    $query-> bindParam(':email',$email);
    $query-> execute();
    $results=$query->fetch(PDO::FETCH_ASSOC);
    if ($results) {
     $password1 = $results['Password'];
        // echo $password1;
        if(password_verify($password , $password1)){
            echo "<h1>Password Matched</h1>";
            header("location:dashboard.php");
        }else{
            echo "<h1>Password not Matched</h1>";
        };
        // Now you can use $password as needed
    } else {
        // Email not found
        echo "<h1>Email not found</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Login Form</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="post">
                              <div class="form-group">
                                  <label for="email" class="control-label">Email id</label>
                                  <input type="text" class="form-control" id="email" name="email"  required="" title="Please enter you Email-id" placeholder="email" >
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                           
                              <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Lorem ipsum dolor sit amet</li>
                          <li><span class="fa fa-check text-success"></span>Lorem ipsum dolor sit amet</li>
                          <li><span class="fa fa-check text-success"></span>Lorem ipsum dolor sit amet</li>
                          <li><span class="fa fa-check text-success"></span>Lorem ipsum dolor sit amet</li>
                          <li><span class="fa fa-check text-success"></span> Lorem ipsum dolor sit amet</li>

                      </ul>
                      <p><a href="register.php" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
<script type="text/javascript">

</script>
</body>
</html>


