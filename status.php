<?php
include('dbase.php');

if(isset($_GET['userid'])){
     $id = $_GET['userid'];
     $status = $_GET['status'];
   $query = "UPDATE user SET status='".$status."' WHERE id = '".$id."'";
   $run = mysqli_query($conn, $query);
   if($run){
    header('location:manage_users.php');
   }
}

?>

