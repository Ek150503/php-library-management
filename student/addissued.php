<?php

require_once("../config/db.php");

// check if the required parameters are set
if (isset($_GET["studentId"]) && isset($_GET["bookId"]) && isset($_GET["day"])) {
  $studentId = $_GET["studentId"];
  $bookId = $_GET["bookId"];
  $day = $_GET["day"];

  $statement = $pdo->prepare("INSERT INTO issued (student_id, book_id, issued_day) Values (:studentId, :bookId, :day);");

  $statement->bindValue(":studentId", $studentId);
  $statement->bindValue(":bookId", $bookId);
  $statement->bindValue(":day", $day);

  if($statement->execute()){
    echo "Issue successful. Please go to the library to get approval from the librarian.";
  }
} else {
  echo "Missing required parameters!";
}