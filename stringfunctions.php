<?php
session_start();

if(isset($_POST['submit'])){

$username = $_POST['username'];
$password = $_POST['password'];

$usernameinDB = "furqan";
$passwordinDB = "furqan123";

if( $username == $usernameinDB && $password == $passwordinDB){
    $_SESSION['msg'] = "You have loggin successfully";
    header('location:rediect.php');
}else{
    $_SESSION['msg'] = "wrong credentials";
    header('location:rediect.php');
}


}

?>


<form action="stringfunctions.php" method="post">

<input type="text" name="username">
<input type="password" name="password">
<input type="submit" name="submit">


</form>