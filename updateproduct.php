<?php
session_start();

include('connection.php');

    if(isset($_POST['update']))
{
    $product_id = $_GET['id'];
    $name = $_POST['name'];
    $category = $_POST['catagory'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    try {

        $query = "UPDATE tblstock SET ItemName=:name,ItemCategory=:catagory,ItemDescription=:description,ItemImage=:image,ItemPrice=:price, ItemStock=:stock WHERE ItemID=:product_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':name' => $name,
            ':catagory' => $category,
            ':description' => $description,
            ':image' => $image,
            ':price' => $price,
            ':stock' => $stock,
            ':product_id' => $product_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: manage_product.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: manage_product.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>







<!-- topbar -->
<?php include('topbar.php'); ?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>

    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-6 fs-1">Update Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
      </div>
      <div class="row" style="min-height:65vh;">
        <div class="col-md-7 mt-5">

        <?php
                        if(isset($_GET['id']))
                        {
                            $product_id = $_GET['id'];

                            $query = "SELECT * FROM tblstock WHERE ItemID=:product_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':product_id' => $product_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                       ?>

                        <?php
                                include_once('connection.php');
                                $stmt = $conn->prepare("SELECT * FROM `tblcategory`");
                                $stmt->execute();
                                $options = '';
                                while ($row = $stmt->fetch(PDO::FETCH_NUM))
                                    {
                                        $options = $options."<option>$row[1]</option>";
                                    }
                            ?>

                <form  method="post" enctype="multipart/form-data">
                    Name:<input type="text" name="name" value="<?=$result->ItemName; ?>" ><br>	
                    Category:<select name="catagory">
                                <?php echo $options;?>
                            </select><br>
                    Description:<input type="text" name="description" value="<?=$result->ItemDescription; ?>"><br>
                    Image:<input type="file" name="image" accept="image/*" value="<?=$result->ItemImage; ?>"><br>
                    Price:<input type="text" name="price" value="<?=$result->ItemPrice; ?>" ><br>
                    Stock:<input type="text" name="stock" value="<?=$result->ItemStock; ?>"><br>
                    <!-- Makes each form box on the webpage -->
                    <input type="submit" name="update" value="Submit">
                </form>
        </div>

    </div>
    <?php include('footer.php') ?>
    <script>
        CKEDITOR.replace("privacy");
    </script>