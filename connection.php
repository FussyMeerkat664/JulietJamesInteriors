<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "JulietJamesInteriors";
#creates connection to database

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage()."<br>";
    #displays error message if unable to connect to the database
    }
?>
