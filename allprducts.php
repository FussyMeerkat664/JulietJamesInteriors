<?php

	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    // Query to fetch all data from the database table
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ItemID</th>
      <th scope="col">ItemName</th>
      <th scope="col">ItemCategory</th>
      <th scope="col">ItemDescription</th>
      <th scope='col'>ItemImage</th>
      <th scope='col'>ItemPrice</th>
      <th scope='col'>ItemStock</th>
      <th scope=col>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
                  
                  $stmt = $conn->prepare("SELECT * FROM tblstock");
                  $stmt->execute();
                  $result = $stmt->fetchall();
                  if($result)
                  {
                    foreach($result as $row)
                    {
                      ?>
                        <tr> 
                          <td> <?= $row['ItemID'] ?> </td>
                          <td> <?= $row['ItemName'] ?> </td>
                          <td> <?= $row['ItemCategory'] ?> </td>
                          <td> <?= $row['ItemDescription'] ?> </td>
                          <td><img src="<?= $row['ItemImage'] ?>" width=80 alt="" > </td>
                          <td> <?= $row['ItemPrice'] ?> </td>
                          <td> <?= $row['ItemStock'] ?> </td>
                          <td> <a href="updatePr.php?id=<?=$row['ItemID']?>" class="btn btn-sm btn-outline-success ms-1"><i class="fa-solid fa-pen-to-square"></i> Update</a> </td>
                          <td> <a href="deletePr.php?id=<?=$row['ItemID']?>" class="btn btn-sm btn-outline-danger ms-1"><i class="fa-solid fa-pen-to-square"></i> Delete</a> </td>
                        </tr>

                      <?php
                    }
                  }
                ?>
 
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>