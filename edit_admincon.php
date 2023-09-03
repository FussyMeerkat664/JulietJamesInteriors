<?php
session_start();
if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
    header('location:index.php');
  }
include('dbase.php');

 if(isset($_GET['id'])){
    $admin_id = $_GET['id'];
}
if (isset($_POST['update_admincontact'])) {

     $Desc = $_POST['desc'];
     $Phone = $_POST['phone'];
     $Email = $_POST['email'];
     $Address = $_POST['address'];
 

    $query = "UPDATE admin_contact SET description = '".$Desc."', phone = '".$Phone."', email = '".$Email."', address = '".$Address."'";
    $run = mysqli_query($conn, $query);
    if($run){
      $msgs =  ['status'=>'Data Updated Successfully','status_type'=>'alert-success'];
      $_SESSION['msgs'] = $msgs['status'];
      $_SESSION['msgs_type'] = $msgs['status_type'];
      header('location:manage_website.php');
    }else{
      $msgs =  ['status'=>'Data Updated Failed','status_type'=>'alert-danger'];
      $_SESSION['msgs'] = $msgs['status'];
      $_SESSION['msgs_type'] = $msgs['status_type'];
      header('location:manage_website.php');
    }

}



    

?>




<!-- topbar -->
<?php include('topbar.php'); ?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>

    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-6 fs-1">Update Admin Data</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
      </div>
      <div class="row" style="min-height:65vh;">
        <div class="col-md-7 mt-5">
          <form method="post" enctype="multipart/form-data">
            <script src="../assets/ckeditor/ckeditor.js"></script>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"> Discription</label>
                <textarea name="desc" id="privacy" required ></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="tel" class="form-control" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update_admincontact">Submit</button>
            </form>
        </div>

    </div>
    <?php include('footer.php') ?>
    <script>
        CKEDITOR.replace("privacy");
    </script>