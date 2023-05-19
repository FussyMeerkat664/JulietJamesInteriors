<?php

header('Location: user.php');
// redirects to submit another form
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$stmt = $conn->prepare("INSERT INTO TblUser(UserID,Role,Email,Password,Forename,Surname,Postcode,AddressL1,AddressL2,Town,County,Phone)VALUES 
	(NULL,0,:email,:password,:forename,:surname,:postcode,:addressl1,:addressl2,:town,:county,:phone)");
	// inserts the values into the table TblUser
	$stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':postcode', $_POST["postcode"]);
    $stmt->bindParam(':addressl1', $_POST["addressl1"]);
    $stmt->bindParam(':addressl2', $_POST["addressl2"]);
	$stmt->bindParam(':town', $_POST["town"]);
	$stmt->bindParam(':county', $_POST["county"]);
	$stmt->bindParam(':phone', $_POST["phone"]);
	$stmt->execute();
	//sets all of the entries to their corresponding fields in the table
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>