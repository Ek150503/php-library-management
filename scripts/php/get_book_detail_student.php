<?php

require_once("../../config/db.php");

$id = $_GET['id'];
$detailBook = '';

// SQL query with a WHERE clause
$sql = "SELECT books.*, branches.branch_name, publications.publication_name 
        FROM books 
        LEFT JOIN branches ON books.branch_id = branches.branch_id 
        LEFT JOIN publications ON books.publication_id = publications.publication_id
        WHERE books.book_id = :book_id";

// Prepare and execute the query with a parameter binding
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':book_id', $id);
$stmt->execute();

// Fetch the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Do something with the results
foreach ($results as $row) {
   $detailBook .= "
     <div class='container mx-auto px-4 py-8'>
    <div class='flex flex-col md:flex-row items-center'>
      <div class='md:w-1/3'>
        <img src='../uploads/books/images/". $row["book_cover"]."'
              alt='". $row["book_title"]."'
              id='load' data-key='". $row["book"]. "'
              class='w-full rounded-lg' class='rounded-lg shadow-md'>
      </div>
      <div class='md:w-2/3 md:pl-8'>
        <h1 class='text-3xl font-bold text-gray-900'>". $row["book_title"]."</h1>
        <p class='text-lg text-gray-700 my-4'>Publication: ". $row["publication_name"]."</p>
        <p class='text-lg text-gray-700 my-4'>Branch: ". $row["branch_name"]."</p>
        <p class='text-lg text-gray-700 my-4'>Author: ". $row["author"]."</p>
        <p class='text-lg text-gray-700 my-4'>Quantity: ". $row["quantity"]."</p>
        <p class='text-lg text-gray-700 my-4'>Description: ". $row["description"]."</p>
        <button
          class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 md:mt-0' id='open-form'>Borrow</button>
      </div>
    </div>
  </div>
   ";
}

echo $detailBook;