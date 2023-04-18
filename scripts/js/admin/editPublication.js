window.addEventListener('load', () => {
  let id = 0;
  const modalButton = document.querySelectorAll('#modal-button');
  console.log(modalButton);
  const modalOverlay = document.querySelector('#modal-overlay');
  const modal = document.querySelector('#modal');
  const modalInput = document.querySelector('#modal-input');
  const modalUpdate = document.querySelector('#modal-update');

  modalButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      id = btn.getAttribute('data-key');
      const td = document.querySelectorAll(`[data-key="${id}"]`);
      modalInput.value = td[0].textContent;
      modalOverlay.style.display = 'block';
    });
  });

  modalOverlay.addEventListener('click', (event) => {
    if (event.target === modalOverlay) {
      modalOverlay.style.display = 'none';
    }
  });

  modalUpdate.addEventListener('click', () => {
    const inputValue = modalInput.value;
    $.ajax({
      url: '../scripts/php/updatePulication.php',
      type: 'POST',
      data: { publication_name: inputValue, publication_id: id },
      success: function (response) {
        // get the alert element
        const $alert = $('#alert');
        console.log($alert);
        $('#alert').html(response);
        $('#alert').show();

        // show the alert
        // hide the alert after 10 seconds

        setTimeout(function () {
          HandlerOutput.getPublication_table();
          $('#alert').hide();
          $('#modal-input').val('');
        }, 1500);
        console.log(response);
        modalOverlay.style.display = 'none';
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });
});
