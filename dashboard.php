<?php  
session_start();
include('connection.php');
if(!isset($_SESSION['admin'])){
  header('location:index.php');
}
?>
<!-- topbar -->
<?php include('topbar.php'); ?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>


      <?php include('footer.php') ?>
   </main> 