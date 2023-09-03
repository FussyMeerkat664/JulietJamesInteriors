<?php
session_start();

include('connection.php');

    if(isset($_POST['update']))
{
    $schedule_id = $_GET['id'];
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    try {

        $query = "UPDATE tblschedule SET schedule_date=:date,schedule_start_time=:starttime,schedule_end_time=:endtime WHERE schedule_id=:schedule_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':date' => $date,
            ':starttime' => $starttime,
            ':endtime' => $endtime,
            ':schedule_id' => $schedule_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: manage_schedule.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: manage_schedule.php');
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
                            $schedule_id = $_GET['id'];

                            $query = "SELECT * FROM tblschedule WHERE schedule_id=:schedule_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':schedule_id' => $schedule_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                       ?>


                        <form  method="post">	
                            Date:<input type="date" name="date" value="<?=$result->schedule_date; ?>">
                            StartTime:<input type="time" name="starttime" value="<?=$result->schedule_start_time; ?>">
                            EndTime:<input type="time" name="endtime" value="<?=$result->schedule_end_time; ?>">
                            <!-- Makes each form box on the webpage -->
                            <input type="submit" value="Submit" name="update">
                        </form>
        </div>

    </div>
    <?php include('footer.php') ?>
    <script>
        CKEDITOR.replace("privacy");
    </script>