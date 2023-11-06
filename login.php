
<?php   
  session_start();
//Database Configuration File
include('Admin/connection.php');
error_reporting(0);

  if(isset($_POST['login']))
  {
    // Getting username/ email and password
     $email=$_POST['email'];
    //  $password=hash('sha256',$_POST['password']);
    $password=$_POST['password'];
     // Hashing with Random Number
    //  $saltedpasswrd=hash('sha256',$password.$_SESSION['randnum']);
    // Fetch stored password  from database on the basis of username/email 
    $sql ="SELECT Email,Password,Role FROM TblUser WHERE Email=:email";
    $query= $conn -> prepare($sql);
    $query-> bindParam(':email',$email);
    $query-> execute();
    $results=$query->fetch(PDO::FETCH_ASSOC);
    if ($results) {
     $password1 = $results['Password'];
        // echo $password1;
        if(password_verify($password , $password1)){
           $_SESSION['loggedim'] = "<h1>You have signed in Scuccessfully</h1>";
             if($results['Role'] == 1){
                $_SESSION['admin'] = true;
                    header('location:registration.php');
                    
             }else{
                header('location:index.php');
             };
       

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
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>James And Juliet</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="assets/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesoeet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
        <style>


body {
  background: linear-gradient(to bottom , rgb(245, 245, 24) , transparent);
}
form {
  width: 60%;
  margin: 60px auto;
  background: #000000c7;
  padding: 60px 120px 80px 120px;
  text-align: center;
  -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
  box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}
label {
  display: block;
  position: relative;
  margin: 40px 0px;
}
.label-txt {
  position: absolute;
  top: -1.6em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: rgb(120,120,120);
  transition: ease .3s;
}
.input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
  color: white;
}

.line-box {
  position: relative;
  width: 100%;
  height: 2px;
  background: #BCBCBC;
}

.line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: #8BC34A;
  transition: ease .6s;
}

.input:focus + .line-box .line {
  width: 100%;
}

.label-active {
  top: -5em;
}

button {
  display: inline-block;
  padding: 12px 24px;
  background: rgb(220,220,220);
  font-weight: bold;
  color: rgb(120,120,120);
  border: none;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
  transition: ease .3s;
}

button:hover {
  background: #8BC34A;
  color: #ffffff;
}

        </style>
</head>

<body>
    <div class="container mt-5 ">
      <?php
      if(isset($_SESSION['register']) && $_SESSION['register'] === true){

    
     echo 
     "<h2 class='alert alert-success register-alert'>Registered Successfully</h2>
        <h1 class='text-center my-5'>Login</h1>";
        unset($_SESSION['register']);
    }else{

  ?>
   <h1 class="text-center my-5">Login</h1>
  <?php
  }
  ?>
        <form method="post">
            <label>
              <p class="label-txt">ENTER YOUR EMAIL</p>
              <input type="text" class="input" name="email"  required="" >
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
       
            <label>
              <p class="label-txt">ENTER YOUR PASSWORD</p>
              <input type="password" class="input" name="password" value="" required="" >
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <button type="submit" name="login">submit</button>
            <a href="registration.php" class="text-white d-block  my-3">Not Registered?</a>
          </form>
    </div>
        <!-- footer section end -->
        <!-- copyright section start -->
        <div class="copyright_section">
            <div class="container">
                <p class="copyright_text">Copyright Hector James <a href="https://html.design"></a></p>
            </div>
        </div>
        <!-- copyright section end -->
        <!-- Javascript files-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery-3.0.0.min.js"></script>
        <script src="assets/js/plugin.js"></script>
        <!-- sidebar -->
        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }

            // 
            $(document).ready(function(){

$('.input').focus(function(){
  $(this).parent().find(".label-txt").addClass('label-active');
});

$(".input").focusout(function(){
  if ($(this).val() == '') {
    $(this).parent().find(".label-txt").removeClass('label-active');
  };
});

});
        </script>
        <script src="https://kit.fontawesome.com/b0cf361ea8.js" crossorigin="anonymous"></script>
        <script>
          let alert = document.querySelector('.register-alert');
          setTimeout(() => {
            alert.remove();
          }, 2000);


        </script>
</body>

</html>