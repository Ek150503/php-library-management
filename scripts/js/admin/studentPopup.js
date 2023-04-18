window.addEventListener('load', function () {
  // Get the "Open Form" button element

  const openFormBtn = document.querySelector('#open-form');

  // Get the "Close" button element
  const closeFormBtn = document.querySelector('#close-form');

  // Get the "Issue Book" button element
  const issueBookBtn = document.querySelector('#issue-book');

  // Get the form element
  const myForm = document.querySelector('#my-form');

  // Add an event listener to the "Open Form" button
  openFormBtn.addEventListener('click', function () {
    myForm.classList.remove('hidden');
  });

  // Add an event listener to the "Close" button
  closeFormBtn.addEventListener('click', function () {
    myForm.classList.add('hidden');
  });

  // Add an event listener to the "Issue Book" button
  issueBookBtn.addEventListener('click', function () {
    // Get the number of days from the input field
    const numDays = document.querySelector('#num-days').value;

    // Validate the input
    if (numDays < 1 || numDays > 7) {
      alert('Please enter a number between 1 and 7.');
      return;
    }

    // Issue the book (placeholder code)

    $.ajax({
      url: './studentid.php',
      method: 'POST',
      data: {
        view: true,
      },
      success: function (data, status) {
        student_id = data;
        // alert(
        //   'Book issued for ' +
        //     numDays +
        //     ' days.' +
        //     'from student id ' +
        //     student_id +
        //     ' and book Id ' +
        //     id
        // );

        $.ajax({
          url: './addissued.php',
          type: 'GET',
          data: {
            bookId: id,
            studentId: student_id,
            day: numDays,
          },
          success: function (response) {
            const successMessage = document.getElementById('success-message');
            successMessage.innerHTML = response;
            successMessage.classList.remove('hidden');

            setTimeout(() => {
              successMessage.remove();
            }, 5000); // Removes the message after 5 seconds (5000 milliseconds)
            console.log(response);
          },
        });
      },
    });

    // Close the form
    myForm.classList.add('hidden');
  });
});
