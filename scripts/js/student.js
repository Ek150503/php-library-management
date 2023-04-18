window.addEventListener('load', () => {
  // modal
  // Get the logout button and modal
  const logoutButton = document.getElementById('logout-button');
  const logoutModal = document.getElementById('logout-modal');
  // Get the cancel and confirm buttons
  const cancelButton = document.getElementById('cancel-button');
  const confirmButton = document.getElementById('confirm-button');

  // Show the modal when the logout button is clicked
  logoutButton.addEventListener('click', () => {
    logoutModal.style.display = 'flex';
  });

  // Close the modal when the cancel button is clicked
  cancelButton.addEventListener('click', () => {
    logoutModal.style.display = 'none';
  });

  // Log out the user when the confirm button is clicked
  confirmButton.addEventListener('click', () => {
    // Call your logout function here
    console.log('Logging out...');
    $.ajax({
      url: './logout.php',
      success: function () {
        location.reload();
        // alert('Logged out');
        // do something when the session is destroyed
      },
    });
  });
});
