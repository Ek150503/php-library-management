window.addEventListener('load', function () {
  const books = document.querySelectorAll('#load');

  books.forEach(function (book) {
    book.addEventListener('click', function (e) {
      namePdf = book.getAttribute('data-key');
      // alert(namePdf);
      window.open(`../uploads/books/pdf/${namePdf}`, '_blank');
    });
  });
});
