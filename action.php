<?php
try{
	include_once('connection.php');
	error_reporting(0);

if(isset($_POST['addItem'])){
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
    echo "Already Exists";
}else{
    $execute = $stmt->execute();

    // //sets all of the entries to their corresponding fields in the table
    if($execute)
    {
    echo "Add to Cart";
    // header("location:index.php");
    }else 
    {
    echo "Something went wrong.Please try again";
    }
}



// $stmt = $conn->prepare("SELECT ItemID FROM tblbasket WHERE ItemID = ?");
// $stmt->bind_param('s' , $pid);
// $stmt->execute();
// $res = $stml->fetch(PDO::FETCH_ASSOC);
// $r = $res->fetch_assoc();
// $code =$res['ItemID'];
// if(!$code){
//     // echo "inserted";

//     header("location:allprducts.php");
// }else{
//     echo "not";
// }
}
    }
    
}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>