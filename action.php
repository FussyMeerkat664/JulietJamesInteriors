<?php
session_start();
try{
	include_once('Admin/connection.php');
	error_reporting(0);

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
    echo '<a href="allprducts.php">Conitune Shopping</a>';
}else{
    $execute = $stmt->execute();

    // //sets all of the entries to their corresponding fields in the table
    if($execute)
    {
    // echo "Added to Cart<br>";
    $_SESSION['added'] = true;
    echo '<a href="allprducts.php">Conitune Shopping</a>';
    // header("location:index.php");
    }else 
    {
    echo "Something went wrong.Please try again";
    }
}

}
    }
    
}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>