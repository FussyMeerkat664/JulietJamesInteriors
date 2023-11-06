<?php 
   $servername = 'localhost';
   $username = 'root';
   $password= '';
   #accessing server

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS JulietJamesInteriors";
    $conn->exec($sql);
    #creating database
    
    $sql = "USE JulietJamesInteriors";
    $conn->exec($sql);
    echo "DB created successfully";
    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS TblUser;
    CREATE TABLE TblUser 
    (UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Role TINYINT(1) NOT NULL DEFAULT 0,
    Email VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Surname VARCHAR(30) NOT NULL,
    Postcode VARCHAR(7) NOT NULL,
    AddressL1 VARCHAR(50) NOT NULL,
    AddressL2 VARCHAR(50) NOT NULL,
    Town VARCHAR(20) NOT NULL,
    County VARCHAR(30) NOT NULL,
    Phone VARCHAR(11) NOT NULL)");
    #Creates a table, adds in the necessary fields and their data types
    $stmt1->execute();
    $stmt1->closeCursor(); 

    $stmt2 = $conn->prepare("DROP TABLE IF EXISTS TblStock;
    CREATE TABLE TblStock 
    (ItemID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ItemName VARCHAR(30) NOT NULL,
    ItemCategory VARCHAR(20) NOT NULL,
    ItemDescription VARCHAR(200) NOT NULL,
    ItemImage VARCHAR(100) NOT NULL,
    ItemPrice DECIMAL(5,2) NOT NULL,
    ItemStock INT(4) NOT NULL)");
    $stmt2->execute();
    $stmt2->closeCursor();
    #Executes statement

    $stmt3 = $conn->prepare("DROP TABLE IF EXISTS TblBasket;
    CREATE TABLE TblBasket
    (OrderID INT(7) NOT NULL,
    ItemID INT(4) NOT NULL,
    UserID INT(4) NOT NULL,
    ItemQuantity INT(2) NOT NULL,
    PRIMARY KEY(OrderID,ItemID))");
    $stmt3->execute();
    $stmt3->closeCursor();

    $stmt4 = $conn->prepare("DROP TABLE IF EXISTS TblOrder;
    CREATE TABLE TblOrder 
    (OrderID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserID INT(6) NOT NULL,
    OrderDateTime DATETIME NOT NULL,
    Dispatched BOOLEAN NOT NULL,
    Payment BOOLEAN NOT NULL)");
    $stmt4->execute();
    $stmt4->closeCursor();

    $stmt5 = $conn->prepare("DROP TABLE IF EXISTS TblBooking;
    CREATE TABLE TblBooking 
    (BookingID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserID INT(6) NOT NULL,
    BookingDateTime DATETIME NOT NULL,
    Price DECIMAL(5,2) NOT NULL,
    Payment BOOLEAN NOT NULL)");
    #Setting variable as boolean to see if client has paid or not
    $stmt5->execute();
    $stmt5->closeCursor();


    $stmt6 = $conn->prepare("DROP TABLE IF EXISTS Tblcategory;
    CREATE TABLE Tblcategory 
    (catID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cat_name VARCHAR(200) NOT NULL)");
    #Setting variable as boolean to see if client has paid or not
    $stmt6->execute();
    $stmt6->closeCursor();

     // Create tblschedule table (Corrected the syntax error)
     $stmt7 = $conn->prepare("CREATE TABLE IF NOT EXISTS tblschedule (
        schedule_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Date DATE NOT NULL,
        start_time VARCHAR(255) NOT NULL,
        end_time VARCHAR(20) NOT NULL,
        price VARCHAR(20) NOT NULL  
    )");


}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>