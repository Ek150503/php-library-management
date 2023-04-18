<?php

require_once("../../config/db.php");

$sql = "SELECT * FROM publications";

$statement = $pdo->query($sql);
$select = "";

$i = 1;
while($row = $statement -> fetch(PDO::FETCH_ASSOC)){

  $select .= "<option value='". $row["publication_id"] . "'>". $row["publication_name"] . "</option>";

  $i++;
}

echo $select; 

?>