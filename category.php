<?php  


try{
	include_once('Admin/connection.php');
    if(isset($_POST['add_cat'])){
	array_map("htmlspecialchars", $_POST);
	$stmt = $conn->prepare("INSERT INTO Tblcategory(cat_name	
    )VALUES(:category)");
	// inserts the values into the table TblUser
	$stmt->bindParam(':category', $_POST["category"]);
	$stmt->execute();
	//sets all of the entries to their corresponding fields in the table
}else{
    echo "";
}
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Catagory</title>
</head>
<body>

          <form method="post">
            <div class="mb-3">
                <label>Category Name</label>
                <input type="text" name="category" required>
            </div>
            <button type="submit" name="add_cat">Add Catagory</button>
            </form>

</body>
</html>     