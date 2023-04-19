window.addEventListener('load', () => {
  // successfully message
  const successMessage = document.getElementById('success-message');
  const successMessageText = document.getElementById('success-message-text');
  const successMessageTimer = document.getElementById('success-message-timer');

  function showSuccessMessage(message, durationInSeconds = 5) {
    successMessageText.innerText = message;
    successMessage.classList.remove('hidden');

    let countdown = durationInSeconds;
    successMessageTimer.innerText = countdown;

    const interval = setInterval(() => {
      countdown--;
      successMessageTimer.innerText = countdown;
      if (countdown <= 0) {
        clearInterval(interval);
        successMessage.classList.add('hidden');
      }
    }, 1000);
  }

  // Example usage:

  const approveBtn = document.getElementById('approve-btn');
  const approveModal = document.getElementById('approve-modal');
  const cancelBtn = document.getElementById('cancel-btn');
  const confirmBtn = document.getElementById('confirm-btn');

  approveBtn.addEventListener('click', () => {
    approveModal.classList.remove('hidden');
  });

  cancelBtn.addEventListener('click', () => {
    approveModal.classList.add('hidden');
  });

  confirmBtn.addEventListener('click', () => {
    // Handle approval logic here
    approveModal.classList.add('hidden');

    $.get(
      '../scripts/php/approve_issued_book.php',
      {
        issued_id: issuedId,
      },
      function (data) {
        // console.log();
        showSuccessMessage(data, 5);
      }
    ).fail(function (jqXHR, textStatus, errorThrown) {
      console.log('Error: ' + errorThrown);
    });

    //
  });
});
