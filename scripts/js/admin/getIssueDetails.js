const queryParams = new URLSearchParams(window.location.search);
const issuedId = queryParams.get('issuedId');

console.log(issuedId);

$(document).ready(function () {
  $.get(
    '../scripts/php/get_issued_report_detail.php',
    {
      issued_id: issuedId,
    },
    function (data) {
      console.log(data);
      $('.main').html(data);
    }
  ).fail(function (jqXHR, textStatus, errorThrown) {
    console.log('Error: ' + errorThrown);
  });

  //
});
