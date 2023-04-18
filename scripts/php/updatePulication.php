<?php

require_once("../../config/db.php");

// get the name and age parameters from the POST data
$publication_name = $_POST['publication_name'];
$publication_id = $_POST['publication_id'];


$statement = $pdo->prepare("UPDATE publications SET publication_name = :publication_name WHERE publication_id = :publication_id;");
$statement->bindValue(':publication_name',$publication_name);
$statement->bindValue(':publication_id',$publication_id);

$statement->execute();

if($statement->rowCount()> 0){
  echo "Updated publication successfully";
}else {
  echo "Update failed";
}


// do something with the data