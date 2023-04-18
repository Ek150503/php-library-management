<?php
session_start();

if(!$_SESSION["student"]){
  header("Location: ../index.php");
}

require_once("../config/db.php");

$id = $_SESSION["student"]["id"];

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
  <div class='bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 flex flex-col my-2'>
      <div class='mb-4'>
        <img class='h-24 w-24  rounded-full mx-auto' src='../uploads/students/images/". $row["profile_pic"] ."' alt='User Profile Picture'>
      </div>
      <div class='mb-4 flex flex-col justify-start'>
        <h2 class='text-xl font-bold text-gray-800 text-center'>". $row["first_name"] ." ". $row["last_name"] ."</h2>
        <p class='text-sm text-gray-600 text-center'>Student ID: ". $row["student_id"] ."</p>
        <p class='text-sm text-gray-600 text-center'>Faculty: ". $row["branch_name"] ."</p>
        <p class='text-sm text-gray-600 text-center'>Year: ". $row["year"] ."</p>
        <p class='text-sm text-gray-600 text-center'>Major: ". $row["major"] ."</p>
        <p class='text-sm text-gray-600 text-center'>Email: ". $row["email"] ."</p>
        <p class='text-sm text-gray-600 text-center'>Address: ". $row["address"] ."</p>
      </div>
      <div class='flex justify-center'>
        <button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2 ' id='logout-button' >Logout</button>
      </div>
    </div>
";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
  /* Center the modal */
  #logout-modal {
    display: none;
  }

  /* Set width and height to 100% */
  #logout-modal .bg-black {
    width: 100%;
    height: 100%;
  }
  </style>

</head>

<body class="bg-gray-100">
  <!-- Modal -->
  <div id="logout-modal"
    class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded">
      <p class="mb-4">Are you sure you want to log out?</p>
      <div class="flex justify-end">
        <button id="cancel-button" class="mr-2 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">No</button>
        <button id="confirm-button" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Yes</button>
      </div>
    </div>
  </div>

  <nav class="bg-gray-900 text-white py-4">
    <div class="container mx-auto flex justify-between items-center px-6">
      <a class="font-bold text-xl" href="#">BELTEI INTERNATIONAL UNIVERSITY</a>
      <div class="flex space-x-4">
        <a class="hover:text-gray-400" href="./index.php">Home</a>
        <a class="hover:text-gray-400" href="./issued-book.php">Books Issued</a>
        <a class="hover:text-gray-400" href="./profile.php">Profile</a>
      </div>
    </div>
  </nav>
  <div class="container mx-auto p-8">
    <?php echo $table ?>
  </div>

  <script src="./../scripts/js/student.js" defer></script>
</body>


</html>