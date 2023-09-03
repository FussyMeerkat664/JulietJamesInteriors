<?php
session_start();
include('connection.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    try {

        $query = "DELETE FROM TblUser WHERE UserID=:id";
        $statement = $conn->prepare($query);
        $data = [
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: manage_users.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: manage_users.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>