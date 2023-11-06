<?php
session_start();
	include_once('Admin/connection.php');
	error_reporting(0);
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
        <!--Javascript for check email availability-->
<script>
function checkEmailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){

$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
 event.preventDefault();
}
});
}
</script>
        <style>

:root{
  --hexColor: #44bcd8;
  --primaryColor:#edb879
}
body {

  background: linear-gradient(to bottom , var(--hexColor) , transparent);
}
form {
  width: 80%;
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
  color: var(--primaryColor);
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
  top: -6em;
}

button {
  display: inline-block;
  padding: 12px 24px;
  background: var(--hexColor);
  font-weight: bold;
  color: white;
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
    <div class="container-fluid mt-5 ">
        <h1 class="text-center my-5">Register</h1>
        <form action='auth.php' method="post">
          <div class="row">
          <!--Error Message-->
  <?php if($error){ ?><div class="errorWrap">
                <strong>Error </strong> : <?php echo htmlentities($error);?></div>
                <?php } ?>
<!--Success Message-->
<?php if($msg){ ?><div class="succWrap">
                <strong>Well Done </strong> : <?php echo htmlentities($msg);?></div>
                <?php } ?> 


                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR EMAIL</p>
                        <input type="email" class="input"  name="email" placeholder="" onBlur="checkEmailAvailability()"  required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR Forename</p>
                        <input type="text" class="input" name="forename"  pattern="[a-zA-Z\s]+" title="Forename must contain letters only" class="input-xlarge" required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR Surname</p>
                        <input type="text" class="input" name="surname" pattern="[a-zA-Z\s]+" title=" Surname must contain letters only" class="input-xlarge" required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR Password</p>
                        <input type="password" class="input" name="password" pattern="^\S{9,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 9 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"  required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR Postcode</p>
                        <input type="number" class="input" name="postcode" required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR AddresL1</p>
                        <input type="text" class="input" name="addressl1" required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR AddresL2</p>
                        <input type="text" class="input" name="addressl2" required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR Town</p>
                        <input type="text" class="input" name="town"  required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR Country</p>
                        <input type="text" class="input" name="county" required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>
                <div class="col-6">
                    <label>
                        <p class="label-txt">ENTER YOUR Phone</p>
                        <input type="text" class="input" name="phone" pattern="[0-9]{10}" maxlength="10"  title="10 numeric digits only" required>
                        <div class="line-box">
                          <div class="line"></div>
                        </div>
                      </label>
                </div>


            </div>
            
            <button type="submit" name="signup">submit</button>
            <a href="login.php" class="d-block my-3 text-white" >Already Registered?</a>
          </form>
    </div>
        <!-- footer section end -->
        <!-- copyright section start -->
        <div class="copyright_section">
            <div class="container">
                <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html
                        Templates</a></p>
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
</body>

</html>