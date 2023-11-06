<?php
	include_once('connection.php');
	error_reporting(0);
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
	.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>

<!--Javascript for check email availability-->
<script>
function checkEmailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){

$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
 event.preventDefault();
}
});
}
</script>
</head>
<body>
<form class="form-horizontal" action='auth.php' method="post">
  <fieldset>
    <div id="legend" style="padding-left:4%">
      <legend class="">Register | <a href="index.php">Sign in</a></legend>
    </div>
<!--Error Message-->
  <?php if($error){ ?><div class="errorWrap">
                <strong>Error </strong> : <?php echo htmlentities($error);?></div>
                <?php } ?>
<!--Success Message-->
<?php if($msg){ ?><div class="succWrap">
                <strong>Well Done </strong> : <?php echo htmlentities($msg);?></div>
                <?php } ?> 




 	<div class="control-group">
      <!-- First name -->
      <label class="control-label"  for="forename">Forename</label>
      <div class="controls">
        <input type="text" id="forename" name="forename"  pattern="[a-zA-Z\s]+" title="Forename must contain letters only" class="input-xlarge" required>
        <p class="help-block">Forename can contain any letters only</p>
      </div>
    </div>


    <div class="control-group">
      <!-- Last name -->
      <label class="control-label"  for="surname">Surname</label>
      <div class="controls">
        <input type="text" id="surname" name="surname" pattern="[a-zA-Z\s]+" title=" Surname must contain letters only" class="input-xlarge" required>
        <p class="help-block">Surname can contain any letters only</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" onBlur="checkEmailAvailability()" class="input-xlarge" required>
             <span id="email-availability-status" style="font-size:12px;"></span> 
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
	<div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" pattern="^\S{9,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 9 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"  required class="input-xlarge">
        <p class="help-block">Password should be at least 9 characters</p>
      </div>
    </div>
 


    <div class="control-group">
      <!--Phone Number -->
      <label class="control-label" for="phone">Phone Number</label>
      <div class="controls">
        <input type="text" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10"  title="10 numeric digits only"   class="input-xlarge" required>
        <p class="help-block">Phone Number Contain only 10 digit numeric values</p>
      </div>
    </div>

	<div class="control-group">
      <!-- Address Line First -->
      <label class="control-label"  for="addressl1">Address Line 1</label>
      <div class="controls">
        <input type="text" id="addressl1" name="addressl1" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Address Line 1</p>
      </div>
    </div>

	<div class="control-group">
      <!-- Address Line Second -->
      <label class="control-label"  for="addressl2">Address Line 2</label>
      <div class="controls">
        <input type="text" id="addressl2" name="addressl2" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Address Line 2</p>
      </div>
    </div>

	<div class="control-group">
      <!-- Town -->
      <label class="control-label"  for="town">Town</label>
      <div class="controls">
        <input type="text" id="town" name="town" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Town</p>
      </div>
    </div>
	
	<div class="control-group">
      <!-- Country -->
      <label class="control-label"  for="county">Country</label>
      <div class="controls">
        <input type="text" id="county" name="county" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Country</p>
      </div>
    </div>
	<div class="control-group">
      <!-- Postcode -->
      <label class="control-label"  for="postcode">Postcode</label>
      <div class="controls">
        <input type="text" id="postcode" name="postcode" class="input-xlarge" required>
        <p class="help-block">Please Enter Your Postcode</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" name="signup">Signup </button>

      </div>
    </div>
  </fieldset>
</form>
<a href="index.php" style="display:block;margin-left:200px">or Login</a>
</body>
</html>

