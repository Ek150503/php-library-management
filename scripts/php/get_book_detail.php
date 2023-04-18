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
    <div class='container mx-auto'>
        <div class='flex flex-col md:flex-row items-center my-8 md:my-16'>
          <div class='md:w-1/2 lg:w-1/3'>
            <img
              src='../uploads/books/images/". $row["book_cover"]."'
              alt='". $row["book_title"]."'
              id='load' data-key='". $row["book"]. "'
              class='w-full rounded-lg'
            />
          </div>
          <div class='md:w-1/2 lg:w-2/3 mx-auto md:mx-8 mt-8 md:mt-0'>
            <h1 class='text-3xl md:text-4xl font-bold mb-4'>". $row["book_title"]."</h1>
            <p class='text-xl font-semibold mb-4'>". $row["branch_name"]."</p>
            <p class='text-xl font-semibold mb-4'>". $row["publication_name"]."</p>
            <p class='text-lg mb-4'>Description:</p>
            <p class='text-xl mb-4'>
              ". $row["description"]."
            </p>
            <p class='text-lg font-semibold mb-4'>Author:</p>
            <p class='text-xl mb-4'>". $row["author"]."</p>
            <p class='text-lg font-semibold mb-4'>Quantity:</p>
            <p class='text-xl mb-4'>". $row["quantity"]."</p>
            <div class='flex justify-center md:justify-start'>
              <button
                class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-4'
              >
                Delete
              </button>
              <button
                class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
              >
                Edit
              </button>
            </div>
          </div>
        </div>
      </div>
   ";
}

echo $detailBook;