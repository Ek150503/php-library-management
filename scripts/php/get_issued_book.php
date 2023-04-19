<?php


require_once("../../config/db.php");

$table = "";
$branch_id = $_POST['branch_id'];	
$i = 1;

$statement = $pdo->prepare("SELECT issued.*, branches.branch_name, books.book_title, students.first_name, students.last_name
FROM issued
JOIN books ON issued.book_id = books.book_id
JOIN branches ON books.branch_id = branches.branch_id
JOIN students ON issued.student_id = students.id WHERE branches.branch_id = :branch_id");

$statement->bindValue(':branch_id', $branch_id);
$statement->execute();

$issues = $statement->fetchAll(PDO::FETCH_ASSOC);

if($issues){
  foreach($issues as $issue){

    if($issue['approved'] == 1){
      
     $table .= "
    <tr>
              <td class='border px-4 py-2'>". $i ."</td>
              <td class='border px-4 py-2'>". $issue["first_name"]." ". $issue["last_name"]."</td>
              <td class='border px-4 py-2'>". $issue["branch_name"]."</td>
              <td class='border px-4 py-2'>". $issue["book_title"]."</td>

              <td class='border px-4 py-2'>
                <button 
                  class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
                  
                >
                  <a href='./issue_book_details.html?issuedId=". $issue["issued_id"]."'>Details</a>
                </button>
              </td>
            </tr>
          
    ";
    $i ++;
    }
   
   
  }
}

echo $table;