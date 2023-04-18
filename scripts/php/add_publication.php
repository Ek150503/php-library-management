<?php

require_once("../../config/db.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['publication-name'])) {
    $publication_name = $_POST['publication-name'];

    if (!empty($publication_name)) {

      if (!$pdo) {
          die('Connection failed: ' . mysqli_connect_error());
      }

        $sql = "INSERT INTO publications (publication_name) VALUES (:publication_name)";

        
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":publication_name", $publication_name);

        $result = $statement->execute();
        
        if ($result) {
          echo 'Publication inserted successfully.';
        }

        $pdo = null;
    

    } else {
      echo 'publication name cannot be empty.';
    }
  } else {
    echo 'Publication name must be required!.';
  }
}
?>