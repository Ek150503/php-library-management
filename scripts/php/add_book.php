<?php

require_once("../../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the form data
    $bookTitle = $_POST["book-title"];
    $description = $_POST["description"];
    $author = $_POST["author"];
    $publication = $_POST["publication"];
    $branch = $_POST["branch"];
    $quantity = $_POST["quantity"];
    
    // Process the uploaded book cover image
    $bookCover = "";
    if (isset($_FILES["book-cover"])) {
        $file = $_FILES["book-cover"];
        $fileName = $file["name"];
        $fileTmp = $file["tmp_name"];
        $fileType = $file["type"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        // Check for errors in the uploaded file
        if ($fileError !== UPLOAD_ERR_OK) {
            // Handle the error
            die("Error uploading file.");
        }

        // Generate a unique filename for the uploaded file
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . "." . $fileExt;

        // Move the uploaded file to the uploads directory
        $uploadDir = "../../uploads/books/images/";
        $uploadPath = $uploadDir . $newFileName;
        if (!move_uploaded_file($fileTmp, $uploadPath)) {
            // Handle the error
            die("Error uploading file.");
        }

        $bookCover = $newFileName;
    }

    // Process the uploaded book file
    $bookFile = "";
    if (isset($_FILES["book"])) {
        $file = $_FILES["book"];
        $fileName = $file["name"];
        $fileTmp = $file["tmp_name"];
        $fileType = $file["type"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        // Check for errors in the uploaded file
        if ($fileError !== UPLOAD_ERR_OK) {
            // Handle the error
            die("Error uploading file.");
        }


        // Generate a unique filename for the uploaded file
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . "." . $fileExt;

        // Move the uploaded file to the uploads directory
        $uploadDir = "../../uploads/books/pdf/";
        $uploadPath = $uploadDir . $newFileName;
        if (!move_uploaded_file($fileTmp, $uploadPath)) {
            // Handle the error
            die("Error uploading file.");
        }

        $bookFile = $newFileName;
    }

    $statement = $pdo->prepare("INSERT INTO books (book_title, description, author, publication_id, branch_id, quantity, book_cover, book) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    $statement->execute([$bookTitle, $description, $author, $publication, $branch, $quantity, $bookCover, $bookFile]);


    echo "Inserting book successfully";
   
}

?>