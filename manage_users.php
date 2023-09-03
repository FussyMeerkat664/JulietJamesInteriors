<?php
// session_start();
include('connection.php');
error_reporting(0);
// if(!isset($_SESSION['a_id']) && !isset($_SESSION['a_name'])){
//   header('location:index.php');
// }

  // $stmt = $conn->prepare("SELECT * FROM TblUser");
	// $stmt->execute();
	// while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	// 	{
	// 		echo($row["Forename"].' '.$row["Surname"].' ,'.$row["Password"].', '.$row["Email"].' '.$row["Phone"].' '.$row["AddressL1"].' '.$row["AddressL2"].' '.$row["Town"].' '.$row["County"].' '.$row["Postcode"]."<br>");
	// 	}

  // $query  = "SELECT * FROM user";
  // $data   = mysqli_query($conn, $query);
  // $html = '';
  // $serial = 0;
  // while($row = mysqli_fetch_array($data)){
  //   $serial = $serial + 1;
  //   $id = $row['user_id'];
  //   $status = $row['status'];
  //   if($status == 'Active'){
  //     $status = '<a href="status.php?userid='.$id.'&status=In-Active"><span class="badge bg-success p-2" style="width:60px;">Active</span></a>';
  //   }else{
  //     $status = '<a href="status.php?userid='.$id.'&status=Active"><span class="badge bg-danger p-2" style="width:60px;">Deactive</span></a>';
  //   }
  //   $user_id = $row['user_id'];
  //   $query1  = "SELECT * FROM user_reg where id = '".$user_id."'";
  //   $data1   = mysqli_query($conn, $query1);
  //   $result = mysqli_fetch_array($data1);
    
    
    // $html .='<tr>
    //               <td>'.$serial.'</td>
    //               <td>'.$result['name'].'</td>
    //               <td>'.$result['email'].'</td>
    //               <td>'.$result['phone'].'</td>
    //               <td><img src="../Assets/Upload_Images/'.$result['img'].'" width="70px" height="50px"></td>
    //               <td><a href="../User/Cv.php?resume_id='.$id.'" class="btn btn-info text-white">Resume</a></td>
    //               <td>'.$status.'</td>
    //              <td>
    //                 <div class="btn-group">
    //                   <a href="update.php?edit_id='.$id.'" class="btn btn-sm btn-outline-success ms-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
    //                   <a href="delete.php?del_id='.$id.'" class="btn btn-sm btn-outline-danger ms-1"><i class="fa-solid fa-pen-to-square"></i> Delete</a>
    //                 </div>
    //               </td>
    //             </tr>';
  // }
?>

<!-- topbar -->
<?php include('topbar.php'); ?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>
               
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between mt-3 flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="display-6 fs-1">Manage Users</h1>
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
                <a href="register.php" class="mb-3 btn btn-outline-success" style="width: 150px;">Add Users</a>
              </div>
              <table id="category_list" class="table table-bordered text-center mt-3">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">UserID</th>
                    <th scope="col" class="text-center">Role</th>
                    <th scope="col" class="text-center">Forename</th>
                    <th scope="col" class="text-center">Surname</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Phone</th>
                    <th scope="col" class="text-center">AddressL1</th>
                    <th scope="col" class="text-center">AddressL2</th>
                    <th scope="col" class="text-center">Town</th>
                    <th scope="col" class="text-center">Country</th>
                    <th scope="col" class="text-center">Postcode</th>
                    <th scope="col" class="text-center">Update</th>
                    <th scope="col" class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  
                  $stmt = $conn->prepare("SELECT * FROM TblUser");
                  $stmt->execute();
                  $result = $stmt->fetchall();
                  if($result)
                  {
                    foreach($result as $row)
                    {
                      ?>
                        <tr> 
                          <td> <?= $row['UserID'] ?> </td>
                          <td> <?= $row['Role'] ?> </td>
                          <td> <?= $row['Forename'] ?> </td>
                          <td> <?= $row['Surname'] ?> </td>
                          <td> <?= $row['Email'] ?> </td>
                          <td> <?= $row['Phone'] ?> </td>
                          <td> <?= $row['AddressL1'] ?> </td>
                          <td> <?= $row['AddressL2'] ?> </td>
                          <td> <?= $row['Town'] ?> </td>
                          <td> <?= $row['County'] ?> </td>
                          <td> <?= $row['Postcode'] ?> </td>
                          <td> <a href="update.php?id=<?=$row['UserID']?>" class="btn btn-sm btn-outline-success ms-1"><i class="fa-solid fa-pen-to-square"></i> Update</a> </td>
                          <td> <a href="delete.php?id=<?=$row['UserID']?>" class="btn btn-sm btn-outline-danger ms-1"><i class="fa-solid fa-pen-to-square"></i> Delete</a> </td>
                        </tr>

                      <?php
                    }
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          
        <?php include('footer.php') ?>