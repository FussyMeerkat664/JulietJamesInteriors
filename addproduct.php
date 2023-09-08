<?php
header('Location: product.php');
// redirects to submit another form
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    // if(!empty($_FILES["image"]['temp_name'])) {
       $upload = 'uploadsImg/';//Create this directory if it doesn't exist
       $fileName = basename($_FILES['image']['name']);
       $targetPath = $upload . $fileName;
       $move_file = move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
	$stmt = $conn->prepare("INSERT INTO tblstock(ItemName, ItemCategory, ItemDescription, ItemImage, ItemPrice, ItemStock)VALUES 
	(:name,:category,:description,:image,:price,:stock)");
	// inserts the values into the table TblUser
    
	$stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':category', $_POST["category"]);
    $stmt->bindParam(':description', $_POST["description"]);
    $stmt->bindParam(':image', $targetPath, PDO::PARAM_STR);
    $stmt->bindParam(':price', $_POST["price"]);
    $stmt->bindParam(':stock', $_POST["stock"]);
    $data = [
        ':name' => $_POST["name"],
        ':category' => $_POST["category"],
        ':description' => $_POST["description"],
        ':image' => $targetPath,
        ':price' =>  $_POST["price"],
        ':stock' => $_POST["stock"],
    ];
	$execute = $stmt->execute( $data);
    $lastInsertId = $conn->lastInsertId();
	//sets all of the entries to their corresponding fields in the table
    if($lastInsertId)
    {
    $msg="Product Added Successfully";
    header("location:dashboard.php");
    }
    else 
    {
    $error="Something went wrong.Please try again";
    }
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>
