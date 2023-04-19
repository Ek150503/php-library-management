// JS Class
class urlConstants {
  static urlAddBranch = '../scripts/php/add_branch.php';
  static urlAddPublication = '../scripts/php/add_publication.php';
  static urlAddStudent = '../scripts/php/add_student.php';
  static urlAddLibrarian = '../scripts/php/add_librarian.php';
}

class HandlerOutput {
  static getPublication_table() {
    $.ajax({
      url: '../scripts/php/get_publication.php',
      method: 'POST',
      data: {
        view: true,
      },
      success: function (data, status) {
        $('#publication-table').html(data);
      },
    });
  }

  static getBranches_table() {
    $.ajax({
      url: '../scripts/php/get_branch.php',
      method: 'POST',
      data: {
        view: true,
      },
      success: function (data, status) {
        $('#branch-table').html(data);
      },
    });
  }

  static getBranch_select(id) {
    $.ajax({
      url: '../scripts/php/get_branch_select.php',
      method: 'POST',
      data: {
        view: true,
      },
      success: function (data, status) {
        $(id).html(data);
      },
    });
  }

  static getPublication_select(id) {
    $.ajax({
      url: '../scripts/php/get_publication_select.php',
      method: 'POST',
      data: {
        view: true,
      },
      success: function (data, status) {
        $(id).html(data);
      },
    });
  }

  static getStudent_table() {
    $.ajax({
      url: '../scripts/php/get_student_table.php',
      method: 'POST',
      data: {
        view: true,
      },
      success: function (data, status) {
        $('#student-table').html(data);
      },
    });
  }

  static getBook_list() {
    $.ajax({
      url: '../scripts/php/get_book.php',
      method: 'POST',
      data: {
        view: true,
      },
      success: function (data, status) {
        console.log(data);
        $('#bookslist').html(data);
      },
    });
  }
}

class HandlerInput {
  // TODO: add new branch
  static newBranch(e) {
    e.preventDefault();

    const formData = new FormData($(this)[0]);

    $.ajax({
      url: '../scripts/php/add_branch.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        location.reload();
        alert(response);
        $('#branch-form')[0].reset();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert('Error: ' + textStatus + ' - ' + errorThrown);
      },
    });
  }

  // TODO: add new publication
  static newPublication(e) {
    e.preventDefault();

    const formData = $(this).serialize();

    $.ajax({
      url: '../scripts/php/add_publication.php',
      method: 'POST',
      data: formData,
      success: function (response) {
        HandlerOutput.getPublication_table();
        $('#alert').html(response);
        $('#alert').show();

        // hide the alert after 10 seconds
        setTimeout(() => {
          $('#alert').hide();
        }, 1500);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error(textStatus, errorThrown);
      },
    });
  }
  // TODO: add new student
  static newStudent(e) {
    e.preventDefault();

    const formData = new FormData($(this)[0]);

    $.ajax({
      url: '../scripts/php/add_student.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        location.reload();
        alert(response);
      },
      error: function (xhr, status, error) {
        console.error(textStatus, errorThrown);
      },
    });
  }
  //  TODO: add new librarian
  static newLibrarian(e) {
    e.preventDefault();

    const formData = $(this).serialize();

    $.ajax({
      url: '../scripts/php/add_publication.php',
      method: 'POST',
      data: formData,
      success: function (response) {
        location.reload();
        alert(response);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error(textStatus, errorThrown);
      },
    });
  }
  // TODO: add new Book
  static newBook(e) {
    e.preventDefault();

    const formData = new FormData($(this)[0]);

    $.ajax({
      url: '../scripts/php/add_book.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        // location.reload();
        console.log(response);
        alert(response);
      },
      error: function (xhr, status, error) {
        console.error(textStatus, errorThrown);
      },
    });
  }

  // TODO: add new student
  static newStudent(e) {
    e.preventDefault();

    const formData = new FormData($(this)[0]);

    $.ajax({
      url: '../scripts/php/add_student.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        location.reload();
        alert(response);
      },
      error: function (xhr, status, error) {
        console.error(textStatus, errorThrown);
      },
    });
  }

  // TODO: add Librarian
  static newLibrarian(e) {}
}

// Jquery

$(document).ready(function () {
  /* when user click submit on branch-form */
  $('#branch-form').on('submit', HandlerInput.newBranch);

  /* when user click submit on publication form */
  $('#publication-form').on('submit', HandlerInput.newPublication);

  /* when user click submit on add student form*/
  $('#student-form').on('submit', HandlerInput.newStudent);

  /* when user click submit on add book form*/
  $('#book-form').on('submit', HandlerInput.newBook);

  // display publications table
  HandlerOutput.getPublication_table();

  // display branches table
  HandlerOutput.getBranches_table();

  // display branches select on add book
  HandlerOutput.getBranch_select('#branch');

  // display publication select on add Book
  HandlerOutput.getPublication_select('#publication');

  // display publication select on add student
  HandlerOutput.getBranch_select('#faculty');

  // display student table
  HandlerOutput.getStudent_table();

  // display books list
  HandlerOutput.getBook_list();

  //th
});
