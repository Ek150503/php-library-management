<?php
session_start();
require_once("./../config/db.php");
$card = '';


if(!isset($_SESSION["student"])){
  header('location: ../index.php');
}else{
  $student = $_SESSION["student"];
  $branch_id = $student["faculty_id"];

  $statement = $pdo->prepare("SELECT * FROM books WHERE branch_id = :branch_id");
  $statement->bindValue(":branch_id", $branch_id);
  $statement->execute();

  $books = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  if($books){
    foreach($books as $book){
      $card .= "
        <div class='bg-white rounded-lg shadow-lg overflow-hidden'>
        <img class='w-full h-[450px]' src='../uploads/books/images/". $book["book_cover"] . "' alt='Book Cover' id='load' data-key='". $book["book"]. "'>
        <div class='p-4'>
          <h2 class='font-bold text-lg mb-2'>". $book["book_title"] . "</h2>
          <p class='text-gray-700 mb-2'>". $book["author"] . "</p>
          <a class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block' href='./detailBook.php?id=". $book["book_id"]. "'>More</a>
        </div>
      </div>
      ";
    }
  }

  // var_dump($student);
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
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
  <div class="container mx-auto py-10">
    <h1 class="text-center text-3xl font-bold mb-5">Books List</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      <?php echo $card ?>
    </div>
  </div>

  <footer class="bg-gray-900 text-white py-4">
    <div class="container mx-auto flex justify-center items-center px-6">
      <p>copyright©️20323</p>
    </div>
  </footer>

  <script src="./../scripts/js/admin/loadpdf.js" defer></script>

</body>

</html>