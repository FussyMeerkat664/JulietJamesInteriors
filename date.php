<?php
// date function
// echo "Today Date is " .  date('jS F y') . " and Day is " . date('N') . " and the week is " . date('W') . "<br> The time is " . date('h:i:sA') ;


// Query String

$id  = ['1' , '2' , '3' , '4' , '5' , '6'] ;

foreach($id as $sid){

?>

<a href="tut1.php?id=<?php echo $sid ?>">Update user <?php echo $sid ?></a>


<?php

}
?>