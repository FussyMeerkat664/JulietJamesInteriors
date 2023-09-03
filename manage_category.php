<?php
include('connection.php');
error_reporting(0);

?>

<!-- topbar -->
<?php include('topbar.php'); ?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>
               
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between mt-3 flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="display-6 fs-1">Manage Category</h1>
              <div class="btn mb-2 me-2 mb-md-0">
                    <a href="dashboard.php" class="btn btn-outline-success"> <span class="">Back</span> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
          <div class="row" style="min-height:65vh;">
          <?php   
                if(isset($_SESSION['msgs'])){
                 ?>
                 <div class="alert <?php echo $_SESSION['msgs_type'];?>" role="alert">
                 <?php echo $_SESSION['msgs']?>
                </div>
                 <?php
                    unset($_SESSION['msgs']);
                }
                ?>
            <div class="table-responsive">
              <div class="col-2 ms-auto">
                <a href="category.php" class="mb-3 btn btn-outline-success" style="width: 150px;">Add Product</a>
              </div>
              <table id="category_list" class="table table-bordered text-center mt-3">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">CatID</th>
                    <th scope="col" class="text-center">CatName</th>
                    <th scope="col" class="text-center">Update</th>
                    <th scope="col" class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  
                  $stmt = $conn->prepare("SELECT * FROM tblcategory");
                  $stmt->execute();
                  $result = $stmt->fetchall();
                  if($result)
                  {
                    foreach($result as $row)
                    { 
                      ?>
                
                        <tr>
                        <td> <?= $row['catID'] ?></td>
                        <td> <?= $row['cat_name']?></td>
                        <td><a href="updatePr.php?id=<?=$row['ItemID']?>" class="btn btn-sm btn-outline-success ms-1"> <i class="fa-solid fa-pen-to-square"></i>Update</a></td>
                        <td><a href="deletePr.php?id=<?=$row['ItemID']?>" class="btn btn-sm btn-outline-danger ms-1"><i class="fa-solid fa-trash"></i>Delete</a></td>
                      
                        </tr>
                    <?php

                    }
                  }else{
                    echo '<h1>No Records</h1>';
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          
        <?php include('footer.php') ?>