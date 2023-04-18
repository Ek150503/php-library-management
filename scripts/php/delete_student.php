<?php
require_once("../../config/db.php");

$id = $_GET["id"];

$sql = "DELETE FROM students WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute([
  ":id" => $id,
]);

if($statement->rowCount() == 1){
  echo "Deleted students with id ".$id . " successfully!";
}else{
  echo $pdo->errorInfo()[2];
}


?>