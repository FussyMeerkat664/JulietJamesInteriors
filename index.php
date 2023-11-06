<?php
session_start();
include('Admin/connection.php');
?>
<?php
        include_once('Admin/connection.php');
        $stmt = $conn->prepare("SELECT * FROM `tblcategory`");
        $stmt->execute();
        $options = '';
        while ($row = $stmt->fetch(PDO::FETCH_NUM))
            {
               // <option>$row[1]</option>
                $options = $options."<a class='dropdown-item' href=''>$row[1]</a>";
            }
      
            
// for add to cart
if(isset($_POST['addtoCart'])){
   $pid = $_POST['pid'];
   // $pprice =$_POST['pprice'];
   // $pimage = $_POST['pimage'];
   $pqty = $_POST['pqty'];
   if($pqty <= 0){
       echo "Plz Select the logical quantity";
   }else{
// echo $pid;
$stmt = $conn->prepare("INSERT INTO tblbasket (`ItemID`, `ItemQuantity`) VALUES (:pid,:pqty)");
$stmt->bindParam(":pid" , $pid);
$stmt->bindParam(":pqty" , $pqty);

// $data = [
//     ':pid' =>  $_POST['pid'],
//     ':pqty' => $_POST["pqty"],
// ];
$stmts = $conn->prepare("SELECT COUNT(*) FROM tblbasket WHERE ItemID = :pid");
$stmts->bindParam(":pid" , $pid);
$stmts->execute();
$rowCount = $stmts->fetchColumn();  
if($rowCount > 0){
   // echo "Already Exists<br>";
   $_SESSION['exists'] = true;
}else{
   $execute = $stmt->execute();

   // //sets all of the entries to their corresponding fields in the table
   if($execute)
   {
   // echo "Added to Cart<br>";
   $_SESSION['added'] = true;

   // header("location:index.php");
   }else 
   {
   echo "Something went wrong.Please try again";
   }
}

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
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesoeet" href="assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
      <?php
      if(isset($_SESSION['exists']) && $_SESSION['exists'] === true){

    
     echo 
     "<h2 class='alert alert-warning register-alert'>Item Already Exists
      <a href='index.php' class='text-decoration-line'>Conitune Shopping</a>
     </h2>";

        unset($_SESSION['exists']);
    }
    if(isset($_SESSION['added']) && $_SESSION['added'] === true){
      "<h2 class='alert alert-success'>Item Added Successfully
      <a href='index.php' class='text-decoration-line'>Conitune Shopping</a>
     </h2>";
     unset($_SESSION['added']);
    }
  ?>
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#"><i class="fab fa-facebook fa-2x"></i></a></li>
                           <li><a href="#"><i class="fab fa-instagram-square fa-2x"></i></a></li>
                           <li><a href="#"><i class="fab fa-pinterest-square fa-2x"></i></a></li>
                           <li><a href="#"><i class="fab fa-youtube fa-2x"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><img src="assets/images/logo.png"></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     <a href="fashion.html">Department</a>
                     <a href="electronic.html">Fabric</a>
                     <a href="jewellery.html">General</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="assets/images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                        <?php
                        echo $options;
                        ?>
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search a product">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" name="search"  type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="login_menu">
                        <ul>  
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"><span class="badge badge-danger" style="position: relative;left: -5px;top: -15px;">0</span></i>
                              <span class="padding_10">Cart </span></a>
                           </li>
                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Logout</span></a>
                           </li>
                           <li><a href="login.php">
                              <i class="fa fa-sign-in" aria-hidden="true"></i>
                              <span class="padding_10">Login</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Man & Woman Fashion</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                        <?php
                  
                  $stmt = $conn->prepare("SELECT * FROM tblstock limit 3");
                  $stmt->execute();
                  $result = $stmt->fetchall();
                  if($result)
                  {
                    foreach($result as $row)
                    {
                      ?>
                             <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text"><?= $row['ItemName'] ?></h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ <?= $row['ItemPrice'] ?>/meter</span></p>
                                 
                                 <div class="tshirt_img"><img style="height:300px;width:100%" src="<?= $row['ItemImage'] ?>"></div>
                                 <p class="card-text"><?= $row['ItemDescription'] ?></p>
                                 <div class="btn_main">
                                    <!-- <div class="buy_bt"><a href="#">Buy Now</a></div> -->
                                    <form action="index.php" method="post" enctype="multipart/form-data" class="form-submit">
                                          <input type="hidden" class="pid" name="pid" value="<?= $row['ItemID'] ?>">
                                          <input type="hidden" class="pprice" name="pprice" value="<?= $row['ItemPrice']?>">
                                          <input type="hidden" class="pimage" name="pimage" value="<?= $row['ItemImage']?>">
                                          <input type="hidden" name="pqty" value="1" class="pqty">
                                          <input type="submit" name="addtoCart" class="btn btn-success" value="Add to Cart">
                                     </form>
                                    <div class="seemore_bt"><a href="#">View</a></div>
                                 </div>
                                </div>
                              </div>

                      <!-- <div class="card col-4" style="width: 18rem;">
  <img src="<?= $row['ItemImage'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $row['ItemName'] ?> </h5>
    <p class="card-text"><?= $row['ItemDescription'] ?></p>
    <p class="card-text"><?= $row['ItemPrice'] ?></p>
    <form action="action.php" method="post" enctype="multipart/form-data" class="form-submit">
    <input type="hidden" class="pid" name="pid" value="<?= $row['ItemID'] ?>">
    <input type="hidden" class="pprice" name="pprice" value="<?= $row['ItemPrice']?>">
    <input type="hidden" class="pimage" name="pimage" value="<?= $row['ItemImage']?>">
    <input type="hidden" name="pqty" value="1" class="pqty">
    <input type="submit" name="addtoCart" value="Add to Cart">
    </form>
  </div>
</div> -->
                        <!-- <tr> 
                          <td> <?= $row['ItemID'] ?> </td>
                          <td> <?= $row['ItemName'] ?> </td>
                          <td> <?= $row['ItemCategory'] ?> </td>
                          <td> <?= $row['ItemDescription'] ?> </td>
                          <td><img src="<?= $row['ItemImage'] ?>" width=80 alt="" > </td>
                          <td> <?= $row['ItemPrice'] ?> </td>
                          <td> <?= $row['ItemStock'] ?> </td>
                          <td> <a href="updatePr.php?id=<?=$row['ItemID']?>" class="btn btn-sm btn-outline-success ms-1"><i class="fa-solid fa-pen-to-square"></i> Update</a> </td>
                          <td> <a href="deletePr.php?id=<?=$row['ItemID']?>" class="btn btn-sm btn-outline-danger ms-1"><i class="fa-solid fa-pen-to-square"></i> Delete</a> </td>
                        </tr> -->

                      <?php
                    }
                  }
                ?>
 
                           
                           
                           
                     
                        </div>
                     </div>
                  </div>
               </div>
               
              
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- fashion section end -->
     
     
      <!-- footer section start -->
      
      <div class="footer_section layout_padding">
         <div class="container">
            <!-- <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div> -->
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <hr>
      <div class="footer_section">
      <div class="nav-footer text-center mt-5">

<div class="row text-white  border-top border-bottom">
   
   <div class="col-lg-4 col-sm-6 col-12">
      <h2 class="text-white">Fabric Land</h2>
      <ul>
         <li>About Us</li>
         <li>Our Blog</li>
         <li>Privacy Policy</li>
         <li>Terms and Conditions</li>
         <li>Secure Shopping</li>
      </ul>
   </div>

   <div class="col-lg-4 col-sm-6 col-12">
      <h2 class="text-white">Account</h2>
      <ul>
         <li>Login/Register</li>
         <li>Request a Sample</li>
         <li>Delivery Information</li>
         <li>Order and Returns</li>
         <li>Testimonials</li>
      </ul>
   </div>
   <div class="col-lg-4 col-sm-6 col-12">
      <h2 class="text-white">Information</h2>
      <ul>
         <li>Custom Gallery</li>
         <li>Coupons</li>
         <li>Privacy Policy</li>
         <li>Help Center</li>
         <li>Newsletter</li>
         <li>Earn Points as you Buy</li>
      </ul>
   </div>
</div>
</div>
      </div>
      <div class="footer_section p-5 w-100" >
         
         <div class="custom_menu">
            <h1 class="text-white">Follow Us</h1>
            <ul>
               <li><a href="#"><i class="fab fa-facebook fa-3x text-white"style="color:black;margin-top:50px ;"></i></a></li>
               <li><a href="#"><i class="fab fa-instagram-square fa-3x text-white"style="color:black;margin-top:50px ;"></i></a></li>
               <li><a href="#"><i class="fab fa-pinterest-square fa-3x text-white"style="color:black;margin-top:50px ;"></i></a></li>
               <li><a href="#"><i class="fab fa-youtube fa-3x text-white"style="color:black;margin-top:50px ;"></i></a></li>
            </ul>
         </div>
         <hr>
         <h2 class="text-center mt-5 text-info h1">Juliet James Interiors</h2>
         <div class="row text-center mt-5 text-white">
            <div class="col-lg-3 col-sm-6 col-12">
               <h4  class="text-warning">ABOUT US </h4>
               <p>Juliet James Interiors are a family company established forover 34 years,selling all types of haberdashy and fabric,from lycra for swimmers and aerobics to the finest wedding fabrics.We specialize in the fabric for cruise ship entertainers,dancing schools,Irish dance costume fabircs,and theatre use. </p>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <h4 class="text-warning"> HEAD OFFICE</h4>
              <p>Fabric Town,Kingfisher Park,Headlands,Salisbury Road,Ringwood,Hampshire,BH24 3NX</p>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
               <h4 class="text-warning">GET IN TOUCH</h4>
               <a href="" class="text-white">Click here for the contact form</a>
               or
               <p>
                  Phone Us:01425 461 444
               </p>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
               <h4 class="text-warning">FABRIC SHOPS</h4> 
               <ul>
                  <li>Bournemouth</li>
                  <li>Bristol</li>
                  <li>London(Kingston)</li>
                  <li>Southampton</li>
                  
               </ul>

            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
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
      </script>
      
            <script>
          let alert = document.querySelector('.register-alert');
          setTimeout(() => {
            alert.remove();
          }, 2000);


        </script>
      
      <script src="https://kit.fontawesome.com/b0cf361ea8.js" crossorigin="anonymous"></script>
   </body>
</html>

  
  