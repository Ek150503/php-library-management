<?php

require_once("../../config/db.php");

$issued_id = $_GET["issued_id"];

$statement = $pdo->prepare("UPDATE issued SET approved = 1 WHERE issued_id = :issued_id");
$statement->bindValue(":issued_id", $issued_id);

if ($statement->execute()) {
	echo 'The Issued have been approved';
}