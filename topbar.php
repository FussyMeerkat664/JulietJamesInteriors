<?php  
include('connection.php');
$name = '';
// if(isset($_SESSION['a_id'])){
//   $id  =  $_SESSION['a_id'];
//   $query ="SELECT * FROM register WHERE id = '$id'";
//             $data       = mysqli_query($conn,$query);
//             $result     = mysqli_fetch_array($data);

//             $profile  = $result['img'];
//             $name  = $result['name'];
// }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- Font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- datatables  File-->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <title>Dashboard</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    
<header class="navbar navbar-light sticky-top flex-md-nowrap p-0" style="background-color: #282B4A;">
  <a class="navbar-brand col-md-3 fs-5 col-lg-2 me-0 px-5  text-white" href="#" style="background-color: #282B4A;"> <img src="assets\images\grooveshark_121535.png" style="backdrop-filter:inverse(1)" width="40px" height="40px" class="rounded-circle"> <?php echo $name; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="navbar-nav">
    <div class="nav-item">
      <a class="btn me-2  btn-outline-danger align-items-center rounded text-white" href="logout.php">
          SignOut
      </a>
    </div>
  </div>
</header>