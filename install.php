<?php 
   $servername = 'localhost';
   $username = 'root';
   $password= '';

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS JulietJamesInteriors";
    $conn->exec($sql);
    
    $sql = "USE JulietJamesInteriors";
    $conn->exec($sql);
    echo "DB created successfully";
    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS TblCustomer;
    CREATE TABLE TblCustomer 
    (CustomerID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(20) NOT NULL,
    Password VARCHAR(60) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Surname VARCHAR(20) NOT NULL,
    Postcode VARCHAR(7) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    Phone VARCHAR(11) NOT NULL)");
    $stmt1->execute();
    $stmt1->closeCursor(); 

    $stmt2 = $conn->prepare("DROP TABLE IF EXISTS TblAdmin;
    CREATE TABLE TblAdmin")