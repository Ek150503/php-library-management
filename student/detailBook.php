<?php
session_start();

if(!$_SESSION["student"]){
  header("Location: ../index.php");
}


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
</head>

<body class="bg-gray-100">

  <div id="success-message" class="hidden bg-green-500 text-white p-4 rounded">

  </div>


  <!-- The pop-up form -->
  <div id="my-form" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- Form container -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <!-- Number of days input -->
            <div class="mt-3 text-center sm:mt-0 sm:text-left">
              <label for="num-days" class="block text-sm font-medium text-gray-700">Enter the number of days (between 1
                and 7):</label>
              <div class="mt-2">
                <input type="number" id="num-days" name="num-days"
                  class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  min="1" max="7" required>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <!-- Issue Book button -->
          <button id="issue-book" type="button"
            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
            Issue Book
          </button>
          <!-- Close button -->
          <button id="close-form" type="button"
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Close
          </button>
        </div>
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


  <div class="main"></div>




  <script src="./../scripts/js/admin/studentsIsuedBook.js" defer></script>
  <script src="./../scripts/js/admin/studentPopup.js" defer></script>
  <script src="./../scripts/js/admin/loadpdf.js" defer></script>


</body>

</html>