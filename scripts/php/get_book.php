<?php 

require_once("../../config/db.php");
$branch_id = intval($_POST["branch_id"]);

if($branch_id== 0){
  
  $sql = "SELECT * FROM books";
  $statement = $pdo->query($sql);

}else{
  $sql = "SELECT * FROM books WHERE branch_id = :branch_id";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(':branch_id',$branch_id);
  $statement->execute();
}

$books = "";
$i = 1;
while($row = $statement -> fetch(PDO::FETCH_ASSOC)){

  $books .= "  <div class='book'>
          <img
            src='../uploads/books/images/". $row["book_cover"] . "'
            alt='". $row["book_title"] . "' id='load' data-key='". $row["book"]. "' />
          <div class='book-info'>
            <h3>". $row["book_title"] . "</h3>
            <p>". $row["author"] . "</p>
          </div>
          <div class='book-buttons'>
            <button class='details-button'>
            <a href='./book-details?id=". $row["book_id"] . "'>Details</a>
            </button>
          </div>
        </div>";

  $i++;
}

echo $books; 

?>