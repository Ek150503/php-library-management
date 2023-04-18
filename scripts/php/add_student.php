<?php

require_once("../../config/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $student_id = $_POST['student-id'];
    $faculty = $_POST['faculty'];
    $year = $_POST['year'];
    $major = $_POST['major'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = password_hash($student_id, PASSWORD_DEFAULT);

    $target_dir = '../../uploads/students/images/';
    $target_file = $target_dir . basename($_FILES["profile-pic"]["name"]);
    move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $target_file);

    $profile_pic = $_FILES["profile-pic"]["name"];
    $statement = $pdo->prepare("INSERT INTO students (first_name, last_name, student_id, faculty_id, year, major, email, address, profile_pic, password) 
                            VALUES (:first_name, :last_name, :student_id, :faculty_id, :year, :major, :email, :address, :profile_pic, :password)");
    $statement->execute([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'student_id' => $student_id,
        'faculty_id' => $faculty,
        'year' => $year,
        'major' => $major,
        'email' => $email,
        'address' => $address,
        'profile_pic' => $profile_pic,
        'password' => $password
    ]);

    if ($statement->rowCount() > 0) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data!";
    }

    $pdo = null;
}
?>