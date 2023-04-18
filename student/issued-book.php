<?php
session_start();
require_once("./../config/db.php");
$card = '';


if(!isset($_SESSION["student"])){
  header('location: ../index.php');
}else{
  $student = $_SESSION["student"];
  $student_id = $student["id"];

  // var_dump($student);

  $statement = $pdo->prepare("SELECT * FROM issued INNER JOIN books ON issued.book_id = books.book_id WHERE issued.student_id = :student_id;");

  $statement->bindValue(":student_id", $student_id);
  $statement->execute();

  $books = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  if($books){
    foreach($books as $book){
      if($book["approved"] == 0){
        $approve = "Not Approved Yet";
      }else{
        $approve = "Approved";
      }
      $card .= "
        <div class='bg-white rounded-lg shadow-lg overflow-hidden relative'>
        <div class='bg-gray-500 text-white absolute right-0 p-1'>". $approve ."</div>
        <img class='w-full h-[300px] md:h-[h-350px] lg:h-[400px]' src='../uploads/books/images/". $book["book_cover"] . "' alt='Book Cover' id='load' data-key='". $book["book"]. "'>
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
    <h1 class="text-center text-3xl font-bold mb-5">Books Issued List</h1>
    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">

      <?php echo $card ?>

    </div>
  </div>
</body>

</html>