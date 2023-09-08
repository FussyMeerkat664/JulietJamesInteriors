<!DOCTYPE html>
<html>
<title>Product</title>
    
</head>
<body>
    <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM `tblstock`");
        $stmt->execute();
        $options = '';
        while ($row = $stmt->fetch(PDO::FETCH_NUM))
            {
                $options = $options."<option>$row[1]</option>";
            }
    ?>

    <form action="addproduct.php" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="name"><br>	
        Category:<select name="catagory">
                    <?php echo $options;?>
                 </select><br>
        Description:<input type="text" name="description"><br>
        Image:<input type="file" name="image" accept="image/*"><br>
        Price:<input type="decimal" name="price" ><br>
        Stock:<input type="text" name="stock"><br>
        <!-- Makes each form box on the webpage -->
        <input type="submit" value="Submit">
	</form>

</body>
</html>