<?php

require_once("../../config/db.php");

$sql = "SELECT * FROM students";

$statement = $pdo->query($sql);
$table = "";
$i = 1;
while($row = $statement -> fetch(PDO::FETCH_ASSOC)){

  $table .= " <tr>
            <td>". $i . "</td>
            <td>". $row["student_id"] . "</td>
            <td>". $row["last_name"] . " ". $row["first_name"] . "</td>
            <td>". $row["email"] . "</td>
            <td class='details'>
              <button class='details-button'>
                <a href='./student_details.html?id=". $row["id"] . "'>Details</a>
              </button>
            </td>
          </tr>";

  $i++;
}

echo $table; 

?>