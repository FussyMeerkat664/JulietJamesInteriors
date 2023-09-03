<?php 
require_once("connection.php");

// Code for checking email availabilty
if(!empty($_POST["email"])) {
$email= $_POST["email"];
$sql ="SELECT Email FROM TblUser WHERE (Email=:email)";
$query= $conn -> prepare($sql);
$query-> bindParam(':email', $email);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'>Email-id already exists.</span>";
} else{	
echo "<span style='color:green'>Email-id available for Registration.</span>";
}
}

?>
