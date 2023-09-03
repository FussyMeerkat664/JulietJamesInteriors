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
              <h1 class="display-6 fs-1">Manage Schedule</h1>
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
                <a href="schedule.php" class="mb-3 btn btn-outline-success" style="width: 150px;">Add Schedule</a>
              </div>
              <table id="category_list" class="table table-bordered text-center mt-3">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">ScheduleID</th>
                    <th scope="col" class="text-center">ScheduleDate</th>
                    <th scope="col" class="text-center">ScheduleStartTime</th>
                    <th scope="col" class="text-center">ScheduleEndTime</th>
                    <th scope="col" class="text-center">Update</th>
                    <th scope="col" class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  
                  
                  
                  $stmt = $conn->prepare("SELECT * FROM tblschedule");
                  $stmt->execute();
                  $result = $stmt->fetchall();
                  if($result)
                  {
                    foreach($result as $row)
                    {
                      ?>
                        <tr> 
                          <td> <?= $row['schedule_id'] ?> </td>
                          <td> <?= $row['schedule_date'] ?> </td>
                          <td> <?= $row['schedule_start_time'] ?> </td>
                          <td> <?= $row['schedule_end_time'] ?> </td>
                          <td> <a href="updateschedule.php?id=<?=$row['schedule_id']?>" class="btn btn-sm btn-outline-success ms-1"><i class="fa-solid fa-pen-to-square"></i> Update</a> </td>
                          <td> <a href="deleteschedule.php?id=<?=$row['schedule_id']?>" class="btn btn-sm btn-outline-danger ms-1"><i class="fa-solid fa-pen-to-square"></i> Delete</a> </td>
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