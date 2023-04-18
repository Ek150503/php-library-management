<?php

require_once("./../../config/db.php");
$data = "";


$statement = $pdo->query("SELECT b.*, IFNULL(COUNT(bk.branch_id), 0) AS total_books
FROM branches b
LEFT JOIN books bk ON b.branch_id = bk.branch_id
GROUP BY b.branch_id;");

// $statement->execute();

$faculties = $statement->fetchAll(PDO::FETCH_ASSOC);

if($faculties){
  foreach($faculties as $faculty){
    $data .= "<div class='card-container'>
        <div class='card-image' id='img'
            data-key='".$faculty["branch_id"]."'>
          <img
            src='../uploads/branches/images/".$faculty["branch_image"]."'
            
          />
        </div>
        <div class='card-title'>
          <h2>Faculty of ".$faculty["branch_name"]."</h2>
        </div>
        <div class='card-content'>
          <p>Number of Books: ".$faculty["total_books"]."</p>
        </div>
      </div>";
  }
}

echo $data;