<?php
session_start();

include('connection.php');

    if(isset($_POST['Update']))
{
    $user_id = $_GET['id'];
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address1 = $_POST['addressl1'];
    $address2 = $_POST['addressl2'];
    $town = $_POST['town'];
    $country = $_POST['county'];
    $postcode = $_POST['postcode'];

    try {

        $query = "UPDATE TblUser SET Forename=:forename,Surname=:surname, Email=:email, Password=:password, Phone=:phone, AddressL1=:addressl1,AddressL2=:addressl2, Town=:town,County=:county,Postcode=:postcode WHERE UserID=:user_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':forename' => $forename,
            ':surname' => $surname,
            ':email' => $email,
            ':password' => $password,
            ':phone' => $phone,
            ':addressl1' => $address1,
            ':addressl2' => $address2,
            ':town' => $town,
            ':county' => $country,
            ':postcode' => $postcode,
            ':user_id' => $user_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: manage_users.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: manage_users.php');
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
        <h1 class="display-6 fs-1">Update User Data</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
      </div>
      <div class="row" style="min-height:65vh;">
        <div class="col-md-7 mt-5">

        <?php
                        if(isset($_GET['id']))
                        {
                            $user_id = $_GET['id'];

                            $query = "SELECT * FROM TblUser WHERE UserID=:user_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':user_id' => $user_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                        ?>
        <form class="form-horizontal"  method="post">
  <fieldset>




 	<div class="control-group">
      <!-- First name -->
      <label class="control-label"  for="forename">Forename</label>
      <div class="controls">
        <input type="text" id="forename" name="forename" value="<?=$result->Forename; ?>" pattern="[a-zA-Z\s]+" title="Forename must contain letters only" class="input-xlarge" required>
        <p class="help-block">Forename can contain any letters only</p>
      </div>
    </div>


    <div class="control-group">
      <!-- Last name -->
      <label class="control-label"  for="surname">Surname</label>
      <div class="controls">
        <input type="text" id="surname" name="surname" value="<?=$result->Surname; ?>" pattern="[a-zA-Z\s]+" title=" Surname must contain letters only" class="input-xlarge" required>
        <p class="help-block">Surname can contain any letters only</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" value="<?=$result->Email; ?>" placeholder="" onBlur="checkEmailAvailability()" class="input-xlarge" required>
             <span id="email-availability-status" style="font-size:12px;"></span> 
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>

 


    <div class="control-group">
      <!--Phone Number -->
      <label class="control-label" for="phone">Phone Number</label>
      <div class="controls">
        <input type="text" id="phone" name="phone" value="<?=$result->Phone; ?>" pattern="[0-9]{10}" maxlength="10"  title="10 numeric digits only"   class="input-xlarge" required>
        <p class="help-block">Phone Number Contain only 10 digit numeric values</p>
      </div>
    </div>

	<div class="control-group">
      <!-- Address Line First -->
      <label class="control-label"  for="addressl1">Address Line 1</label>
      <div class="controls">
        <input type="text" id="addressl1" name="addressl1" value="<?=$result->AddressL1; ?>" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Address Line 1</p>
      </div>
    </div>

	<div class="control-group">
      <!-- Address Line Second -->
      <label class="control-label"  for="addressl2">Address Line 2</label>
      <div class="controls">
        <input type="text" id="addressl2" name="addressl2" value="<?=$result->AddressL2; ?>" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Address Line 2</p>
      </div>
    </div>

	<div class="control-group">
      <!-- Town -->
      <label class="control-label"  for="town">Town</label>
      <div class="controls">
        <input type="text" id="town" name="town" value="<?=$result->Town; ?>" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Town</p>
      </div>
    </div>
	
	<div class="control-group">
      <!-- Country -->
      <label class="control-label"  for="county">Country</label>
      <div class="controls">
        <input type="text" id="county" name="county" value="<?=$result->County; ?>" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Country</p>
      </div>
    </div>
	<div class="control-group">
      <!-- Postcode -->
      <label class="control-label"  for="postcode">Postcode</label>
      <div class="controls">
        <input type="text" id="postcode" name="postcode" value="<?=$result->Postcode; ?>" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Postcode</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" name="Update">Update</button>

      </div>
    </div>
  </fieldset>
</form>
        </div>

    </div>
    <?php include('footer.php') ?>
    <script>
        CKEDITOR.replace("privacy");
    </script>