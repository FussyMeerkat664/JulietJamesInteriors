
<!DOCTYPE html>
<html>
<title>user</title>
    
</head>
<body>
   	<form action="adduser.php" method="post">
	<!-- posts the form to page adduser.php -->
	Forename:<input type="text" name="forename"><br>	
  	Surname:<input type="text" name="surname"><br>
  	Password:<input type="password" name="password"><br>
    Email:<input type="text" name="email"><br>
	Phone Number:<input type="text" name="phone" ><br>
    Address Line 1:<input type="text" name="addressl1"><br>
	Address Line 2:<input type="text" name="addressl2"><br>
	Town:<input type="text" name="town"><br>
	County:<input type="text" name="county"><br>
    Postcode:<input type="text" name="postcode"> 
	<!-- Makes each form box on the webpage -->
  	<input type="submit" value="Add User">
	</form>
	<h1>Current User:</h1>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblUser");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Forename"].' '.$row["Surname"].' ,'.$row["Password"].', '.$row["Email"].' '.$row["Phone"].' '.$row["AddressL1"].' '.$row["AddressL2"].' '.$row["Town"].' '.$row["County"].' '.$row["Postcode"]."<br>");
		}
?>   
<!-- shows the current signed in user - currently for testing purposes, may delete later -->
</body>
</html>