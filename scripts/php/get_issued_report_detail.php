<?php


require_once("../../config/db.php");
$issued_id = $_GET["issued_id"];

$table = "";
$i = 1;

$statement = $pdo->prepare("SELECT
    issued.*,
    branches.branch_name,
    books.book_title,
    books.book_cover,
    books.author,
    DATE_FORMAT(issue_date, '%d-%M-%Y') AS formatted_issue_date,
    students.first_name,
    students.last_name,
    students.profile_pic
FROM
    issued
JOIN books ON issued.book_id = books.book_id
JOIN branches ON books.branch_id = branches.branch_id
JOIN students on issued.student_id = students.id WHERE issued.issued_id = :issued_id;
");

$statement->bindValue(":issued_id", $issued_id);

$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);



if($row){
  $table .= "
   <div class='grid grid-cols-1 lg:grid-cols-2 gap-8'>
        <div class='flex flex-col items-center'>
          <img
            src='../uploads/students/images/".$row["profile_pic"]."'
            alt='Student Image'
            class='w-48 h-48 object-cover rounded-full shadow-lg mb-4'
          />
          <h2 class='text-lg font-medium text-gray-800'>".$row["first_name"]." ".$row["last_name"]."</h2>
        </div>
        <div class='flex flex-col items-center'>
          <img
            src='../uploads/books/images/".$row["book_cover"]."'
            alt='Book Cover'
            class='w-64 h-96 object-cover shadow-lg mb-4'
          />
          <h2 class='text-lg font-medium text-gray-800'>".$row["book_title"]."</h2>
          <p class='text-gray-700'>by ".$row["author"]."</p>
          <div class='mt-4'>
            <p class='text-gray-700'>
              <strong>Issued Date:</strong> ".$row["formatted_issue_date"]."
            </p>
            <p class='text-gray-700'><strong>Days Issued:</strong> ".$row["issued_day"]." days</p>
          </div>
          <div class='flex mt-4'>
            <button
              class='px-4 py-2 bg-green-500 text-white rounded-lg shadow-md mr-4 hover:bg-green-600'
            >
              Approve
            </button>
            <button
              class='px-4 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600'
            >
              Decline
            </button>
          </div>
        </div>
      </div>";
}

echo $table;