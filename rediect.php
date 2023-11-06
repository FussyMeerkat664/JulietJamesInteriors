<?php
// session_start();

// if(isset($_SESSION['msg'])){

//     echo $_SESSION['msg'];

//     unset($_SESSION['msg']);

// }else{
//     echo  " ";
// }

$string = 'I love live in Pakistan.I it too much.And I its masses also.I also money and I want to earn it very much love .';

// if(str($string , 'love') == false){
//     echo strrpos($string , 'love');
// }else{
//     echo strrpos($string , 'love');
// }
// $str1 = "hilla warld " ;
// echo strtr($str1 , 'ia'  , 'eo');
// echo "<pre>";
// print_r(explode(" " ,$string));
echo implode(" " ,array('I' , 'love' , 'Pakistan'));
// echo "</pre>";
?>