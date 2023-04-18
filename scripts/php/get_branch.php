 <?php

require_once("../../config/db.php");

$sql = "SELECT * FROM branches";

$statement = $pdo->query($sql);
$table = "";
$i = 1;
while($row = $statement -> fetch(PDO::FETCH_ASSOC)){

  $table .= "<tr>
          <td>". $i . "</td>
          <td>". $row["branch_name"] . "</td>
          <td><img src='../uploads/branches/images/". $row["branch_image"] . "' alt='". $row["branch_name"] . "'></td>
          <td>
            <button class='edit'>Edit</button>
            <button class='delete'>Delete</button>
          </td>
        </tr>";

  $i++;
}

echo $table; 

?>