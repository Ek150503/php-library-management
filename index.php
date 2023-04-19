<?php 

session_start();
require_once("./config/db.php");



if(isset($_POST["submit"])){

  if(isset($_POST["email"]) && isset($_POST["password"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    $kuser = substr($email, 0, 1);

    if($kuser === "a"){
      // admin

      $statement = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
      $statement->bindValue(':email',$email);

      $statement->execute();
      
      $row = $statement->fetch(PDO::FETCH_ASSOC);

      if(password_verify($password, $row["password"])){
        // $_SESSION["student"] = $row;
        header("Location: ./admin/index.html");
      }

    }
    else if($kuser === "l"){
      // librarian

      $statement = $pdo->prepare("SELECT * FROM librarian WHERE email = :email");
      $statement->bindValue(':email',$email);

      $statement->execute();
      
      $row = $statement->fetch(PDO::FETCH_ASSOC);

      if(password_verify($password, $row["password"])){
        // $_SESSION["student"] = $row;
        header("Location: ./librarian/index.html");
      }
    }else{
      //student

      $statement = $pdo->prepare("SELECT * FROM students WHERE email = :email");
      $statement->bindValue(':email',$email);

      $statement->execute();
      
      $row = $statement->fetch(PDO::FETCH_ASSOC);

      if(password_verify($password, $row["password"])){
        $_SESSION["student"] = $row;
        header("Location: ./student/index.php");
      }
    }

  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BELTEI INTERNATIONAL UNIVERSITY - Welcome</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="container mx-auto py-10">
    <h1 class="text-center text-3xl font-bold mb-5">BELTEI International University Library</h1>
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg py-10 px-8">
      <h2 class="text-2xl font-bold mb-5">Welcome Back</h2>
      <form class="space-y-4" method="POST" action="./index.php">
        <div class="flex flex-col">
          <label class="mb-1 font-bold text-gray-700" for="email">Email</label>
          <input class="border rounded-lg py-2 px-3 text-gray-700" type="email" id="email" name="email" required>
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-bold text-gray-700" for="password">Password</label>
          <input class="border rounded-lg py-2 px-3 text-gray-700" type="password" id="password" name="password"
            required>
        </div>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" type="submit"
          name="submit">Login</button>
      </form>
    </div>
  </div>
</body>

</html>