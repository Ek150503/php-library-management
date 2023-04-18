<?php

session_start();

$student = $_SESSION["student"];

// var_dump($student);

echo $student["id"];