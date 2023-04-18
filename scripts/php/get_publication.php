<?php

require_once("../../config/db.php");

$sql = "SELECT * FROM publications";

$statement = $pdo->query($sql);
$table = "";
$i = 1;
while($row = $statement -> fetch(PDO::FETCH_ASSOC)){

  $table .= "<tr>
            <td>". $i . "</td>
            <td  data-key='". $row["publication_id"]. "'>". $row["publication_name"]. "</td>
            <td>
              <button id='modal-button' data-key='". $row["publication_id"]. "'><i class='fa-regular fa-pen-to-square'></i></button>
              <button id='delete-button' data-key='". $row["publication_id"]. "'><i class='fa-solid fa-trash-can'></i></button>
            </td>
          </tr>";

  $i++;
}  

echo $table; 

?>