<?php

require_once("../../config/db.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['branch-name']) && isset($_FILES['branch-image'])) {
    $branchName = $_POST['branch-name'];
    $branchImage = $_FILES['branch-image']['name'];
    $branchImageTmp = $_FILES['branch-image']['tmp_name'];

    if (!empty($branchName)) {

      $uploadsDir = '../../uploads/branches/images/'; 
      $targetFile = $uploadsDir . basename($branchImage);
      $uploadStatus = move_uploaded_file($branchImageTmp, $targetFile);

      if ($uploadStatus) {

        if (!$pdo) {
          die('Connection failed: ' . mysqli_connect_error());
        }

        $sql = "INSERT INTO branches (branch_name, branch_image) VALUES (:name, :image)";

        
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":name", $branchName);
        $statement->bindValue(":image", $branchImage);

        $result = $statement->execute();
        
        if ($result) {
          echo 'Branch data inserted successfully.';
        }

        $pdo = null;
      } else {
        echo 'Error uploading branch image.';
      }
    } else {
      echo 'Branch name cannot be empty.';
    }
  } else {
    echo 'Branch name and branch image are required.';
  }
}
?>