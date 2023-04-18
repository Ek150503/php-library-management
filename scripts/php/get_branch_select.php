<?php

require_once("../../config/db.php");

$sql = "SELECT * FROM branches";

$statement = $pdo->query($sql);
$select = "";

$i = 1;
while($row = $statement -> fetch(PDO::FETCH_ASSOC)){

  $select .= "<option value='". $row["branch_id"] . "'>". $row["branch_name"] . "</option>";

  $i++;
}

echo $select; 

?>