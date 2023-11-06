<?php

// $color  = ['red','green','blue','yellow','purple'];

 

// print_r(array_slice($color , 1  ));

// $data = ['name' , 'age' , 'qualification'];
// $answers = ['usman' , '20' , 'BSIT'];

// print_r(array_combine($data , $answers));

    // $data = ['name' , 'age' , 'qualification'];
    // $answers = ['usman' , '20' , 'BSIT'];

    // print_r(array_merge($data , $answers));

// $array = ['a' => 'red' , 'b' =>'green' , 'c' => 'blue'];
// $remove = array_shift($array) . "<br>";
// print_r($remove) ;
// print_r($array);

// $array1 = array('pets'=>array('cats') , 'wilds'=>array('wolf' , 'fox'));
// echo "<pre>";
// print_r($array1);
// $array2 = array('pets'=>array('dogs' , 'horse') , 'wilds'=>array('tigers'));
// print_r($array2);
// $result = array_replace_recursive($array1  , $array2);

// print_r($result);
// echo "</pre>";


// $a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
// if(array_key_exists('Volvo' , $a)){
//     echo "Key is Available";
// }else{
//     echo "key is not available. " ;
// };
$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
print_r(array_values($a));


?>
