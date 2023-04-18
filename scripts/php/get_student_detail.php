<?php

require_once("../../config/db.php");

$id = $_GET["id"];

$sql = "SELECT b.branch_name, s.id, s.first_name, s.last_name, s.student_id, s.faculty_id, s.year, s.major, s.password, s.email, s.address, s.profile_pic
FROM branches b
INNER JOIN students s ON b.branch_id = s.faculty_id
WHERE s.id = :id;
";

$statement = $pdo->prepare($sql);
$statement->execute([
  ":id" => $id,
]);

$table = "";
$i = 1;

$row = $statement -> fetch(PDO::FETCH_ASSOC);

$table .= "
    <div class='card'>
      <img
        src='../uploads/students/images/". $row["profile_pic"] . "'
        alt='Student Picture'
      />
      <div class='card-info'>
        <h2>". $row["last_name"] . " ". $row["first_name"] . "</h2>
        <p>Student ID: ". $row["student_id"] . "</p>
        <p>Email: ". $row["email"] . "</p>
        <p>Faculty: ". $row["branch_name"] . "</p>
        <p>Major: ". $row["major"] . "</p>
        <p>Year: ". $row["year"] . "</p>
        <p>Address: ". $row["address"] . "</p>
        <button class='delete'>delete</button>
        <button class='update'>update</button>
      </div>
    </div>";

echo $table; 

?>