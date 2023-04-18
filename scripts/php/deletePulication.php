<?php 
require_once("../../config/db.php");


$publication_id = $_POST["publication_id"];

$statement = $pdo->prepare("DELETE FROM publications WHERE publication_id = :publication_id;");
$statement->bindValue("publication_id", $publication_id);

$statement->execute();

if($statement->rowCount()>0){
  echo "Publications deleted successfully";
}else {
  echo "Something went wrong, please try again!!";
}