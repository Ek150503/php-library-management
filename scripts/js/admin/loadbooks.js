window.addEventListener('load', function () {
  const img = document.querySelectorAll('#img');

  img.forEach((i) => {
    i.addEventListener('click', () => {
      const branch_id = i.getAttribute('data-key');

      // this.alert(branch_id);
      window.location = `./book.html?branchId=${branch_id}`;
    });
  });
});
