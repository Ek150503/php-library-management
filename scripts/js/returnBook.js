function returnBooks() {
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

  let issued_id;
  const returnBtn = document.querySelectorAll('#returnBtn');
  const popup = document.querySelector('#popup');
  const cancelBtn = document.querySelector('#cancelBtn');
  const confirmBtn = document.querySelector('#confirmBtn');

  console.log(returnBtn);
  function showPopup(index) {
    issued_id = returnBtn[index].getAttribute('data-key');

    popup.classList.remove('hidden');
  }

  function hidePopup() {
    popup.classList.add('hidden');
  }

  function confirmReturn() {
    // Add code here to handle the book return
    hidePopup();
    // alert(issued_id);
    $.get(
      '../scripts/php/return_issued_book.php',
      {
        issued_id: issued_id,
      },
      function (data) {
        // console.log();
        showSuccessMessage(data, 5);
      }
    ).fail(function (jqXHR, textStatus, errorThrown) {
      console.log('Error: ' + errorThrown);
    });
  }

  function cancelReturn() {
    hidePopup();
  }

  returnBtn.forEach((r, index) => {
    // console.log(r);

    r.addEventListener('click', () => showPopup(index));
  });

  cancelBtn.addEventListener('click', cancelReturn);
  confirmBtn.addEventListener('click', confirmReturn);
}
