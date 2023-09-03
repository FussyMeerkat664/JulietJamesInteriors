<?php
 include_once('connection.php');
if (isset($_POST['update']) && isset($_GET['id'])) {

    // echo $_GET['id'];

    $id = $_GET['id'];
    $newProductName = $_POST['product_name'];
    $newProductDescription = $_POST['product_description'];
    $newProductCategory = $_POST['product_catagory'];
    $newProductPrice = $_POST['price'];
    $newProductStock = $_POST['stock'];
    $upload = 'uploadsImg/';//Create this directory if it doesn't exist
    $fileName = basename($_FILES['image']['name']);
    $targetPath = $upload . $fileName;
    $move_file = move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

    // Update the product details in the database
    $updateQuery = "UPDATE tblstock SET ItemName = :product_name, ItemCategory = :product_catagory, ItemDescription = :product_description, ItemImage = :image, ItemPrice = :price, ItemStock= :stock WHERE ItemID = :id";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bindParam(':product_name', $newProductName);
    $updateStmt->bindParam(':product_description', $newProductDescription);
    $updateStmt->bindParam(':product_catagory', $newProductCategory);
    $updateStmt->bindParam(':image', $targetPath);
    $updateStmt->bindParam(':price', $newProductPrice);
    $updateStmt->bindParam(':stock', $newProductStock);
    $updateStmt->bindParam(':id' , $id);

    try {
        if ($updateStmt->execute()) {
            echo "Product updated successfully.";
            // You can also redirect the user to a different page after the update.
            header('location:manage_product.php');
        } else {
            echo "Error updating product.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html>
<title>Update Product</title>
</head>
<body>
    <?php
       
        $stmt = $conn->prepare("SELECT * FROM `tblcategory`");
        $stmt->execute();
        $options = '';
        while ($row = $stmt->fetch(PDO::FETCH_NUM))
            {
                $options = $options."<option>$row[1]</option>";
            }
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT * FROM tblstock WHERE ItemID=:id");
            $stmt->bindParam(':id',   $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo $result['ItemName'];
      
?>
    <form action="" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="product_name" value="<?= $result['ItemName'] ?>"><br>	
        Category:<select name="product_catagory">
                    <?php echo $options ?>
                 </select><br>
        Description:<input type="text" name="product_description" value="<?= $result['ItemDescription'] ?>"><br>
        <label for="">Current Image
            <img src="<?= $result['ItemImage'] ?>" width=50 alt="">
        </label><br>
        Image:<input type="file" name="image" accept="image/*" ><br>
        Price:<input type="text" name="price" value="<?= $result['ItemPrice'] ?>"><br>
        Stock:<input type="text" name="stock" value="<?= $result['ItemStock'] ?>"><br>
        <!-- Makes each form box on the webpage -->
        <input type="submit" value="Submit" name='update'>
	</form>
    <?php
} else {
    echo "No product ID provided.";
}

?>
</body>
</html>


