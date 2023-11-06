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
                    header('location:dashboard.php');
                    
             }else{
                header('location:allprducts.php');
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
    <meta charset="utf-8">
    <title>Login form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        .container{
            display:flex;
            gap:10px
        }
        .card1{
            width:30%;
            border:1px solid grey;
            display:flex;
            flex-direction:column;
            height:340px;
            justify-content:space-between;
            
        }
        .card1 .card-head{
            width:100%;
            height:150px;

        }
        .card1 .card-head img{
            width:100%;
            /* height:100%; */

        }
        .card1 .card-body{
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            align-items:center;
            padding:20px;
        }
    </style>
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
               
</body>
</html>


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