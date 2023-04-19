const queryParams = new URLSearchParams(window.location.search);
const id = queryParams.get('id');

console.log(id);

$(document).ready(function () {
  $.get(
    '../scripts/php/get_book_detail_student.php',
    {
      id,
    },
    function (data) {
      $('.main').html(data);
    }
  ).fail(function (jqXHR, textStatus, errorThrown) {
    console.log('Error: ' + errorThrown);
  });

  
});

//
