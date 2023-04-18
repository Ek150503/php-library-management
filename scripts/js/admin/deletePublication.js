window.addEventListener('load', function () {
  const deleteButton = document.querySelectorAll('#delete-button');
  const name = document.querySelector('#name');
  const modal = document.querySelector('#modelClose');
  const yesButton = document.querySelector('#yes-button');
  const noButton = document.querySelector('#no-button');
  let data_key = 0;

  deleteButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      data_key = btn.getAttribute('data-key');
      const td = document.querySelectorAll(`[data-key="${data_key}"]`);

      console.log(td);
      name.textContent = `Are you sure you want to delete ${td[0].textContent}?`;
      modal.style.display = 'block'; // Show modal when delete button is clicked
    });
  });

  yesButton.addEventListener('click', () => {
    // Handle delete action
    $.ajax({
      url: '../scripts/php/deletePulication.php',
      type: 'POST',
      data: { publication_id: data_key },
      success: (response) => {
        const $alert = $('#alert');
        $alert.html(response);
        $alert.show();

        setTimeout(() => {
          HandlerOutput.getPublication_table();
          $alert.hide();
        }, 1500);
      },
      error: (xhr, status, error) => {
        console.log(error);
      },
    });
    modal.style.display = 'none'; // Hide modal after delete action
  });

  noButton.addEventListener('click', () => {
    modal.style.display = 'none'; // Hide modal when "No" button is clicked
  });

  window.addEventListener('click', (event) => {
    // Hide modal when user clicks outside of the modal
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
});
