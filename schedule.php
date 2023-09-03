<?php

try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    if(isset($_POST["submit"])){
	$stmt = $conn->prepare("INSERT INTO tblbooking(schedule_start_time, schedule_end_time)VALUES 
	(:date , :starttime , :endtime)");
	// inserts the values into the table TblUser
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':starttime', $_POST["starttime"]);
    $stmt->bindParam(':endtime', $_POST["endtime"]);
    $data = [
        ':date' => $_POST["date"],
        ':starttime' => $_POST["starttime"],
        ':endtime' => $_POST["endtime"]

    ];
	$execute = $stmt->execute( $data);
    $lastInsertId = $conn->lastInsertId();
	//sets all of the entries to their corresponding fields in the table
    if($lastInsertId)
    {
    $msg="Your schedule added Scuccessfully";
    header("location:dashboard.php");
    }
    else 
    {
    $error="Something went wrong.Please try again";
    }
}
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>





<!DOCTYPE html>
<html>
<title>Product</title>
    
</head>
<body>
    <?php
        include_once('connection.php');
    ?>

    <form  method="post">	
        DateTime:<input type="datetime-local" name="meetingtime">
        <!-- Makes each form box on the webpage -->
        <input type="submit" value="Submit" name="submit">
	</form>

</body>
</html>