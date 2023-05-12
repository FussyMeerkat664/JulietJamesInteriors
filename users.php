
<!DOCTYPE html>
<html>
<title>users</title>
    
</head>
<body>
   	<form action="adduser.php" method="post">
	Forename:<input type="text" name="forename"><br>	
  	Surname:<input type="text" name="surname"><br>
  	Password:<input type="password" name="password"><br>
    Email:<input type="text" name="email"><br>
	Phone Number:<input type="text" name="phone number" ><br>
    Address:<input type="text" name="address"><br>
    Postcode:<input type="text" name="postcode"> 
  	<input type="submit" value="Add User">
	</form>
	<h1>Current User:</h1>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblUser");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Forename"].' '.$row["Surname"].' '.$row["Password"].' '.$row["Email"].' '.$row["Phone Number"].' '.$row["Address"].' '.$row["Postcode"]."<br>");
		}
?>   
</body>
</html>