<?php

try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	if(isset($_POST['signup']))
	{
		//Getting Post Values
		$forename=$_POST['forename'];  
		$surname=$_POST['surname']; 
		$email=$_POST['email']; 
		$password=$_POST['password'];
		$phone=$_POST['phone'];
		$address1=$_POST['addressl1'];  
		$address2=$_POST['addressl2']; 
		$town=$_POST['town']; 
		$country=$_POST['county'];
		$postcode=$_POST['postcode'];

		$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		// Query for validation of username and email-id
		$ret="SELECT * FROM TblUser where Email=:email";
		$queryt = $conn -> prepare($ret);
		$queryt->bindParam(':email',$email);
		$queryt -> execute();
		$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
		if($queryt -> rowCount() == 0)
		{
		// Query for Insertion
		$sql="INSERT INTO TblUser(UserID,Role,Email,Password,Forename,Surname,Postcode,AddressL1,AddressL2,Town,County,Phone)VALUES 
		(NULL,0,:email,:password,:forename,:surname,:postcode,:addressl1,:addressl2,:town,:county,:phone)";
		$query = $conn->prepare($sql);
		$query->bindParam(':email', $_POST["email"]);
		$query->bindParam(':surname', $_POST["surname"]);
		$query->bindParam(':forename', $_POST["forename"]);
		$query->bindParam(':password', $hashed_password);
		$query->bindParam(':postcode', $_POST["postcode"]);
		$query->bindParam(':addressl1', $_POST["addressl1"]);
		$query->bindParam(':addressl2', $_POST["addressl2"]);
		$query->bindParam(':town', $_POST["town"]);
		$query->bindParam(':county', $_POST["county"]);
		$query->bindParam(':phone', $_POST["phone"]);
		$query->execute();
		$lastInsertId = $conn->lastInsertId();
		if($lastInsertId)
		{
		echo "You have signed in Scuccessfully";
		}
		else 
		{
		$error="Something went wrong.Please try again";
		}
		}
		 else
		{
		$error="Username or Email-id already exist. Please try again";
		}
		}
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>