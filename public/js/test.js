$('.addRow').on('click', function () {
  addRow();
});
function addRow() {
  var tr = '<tr>' +
    '<td><input type="text" name="title[]" class="form-control" required></td>' +
    '<td><input type="text" name="body[]" class="form-control" required></td>' +

    '<td><a href="#service-form" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>' +
    '</tr>';
  $('.service-row').append(tr);
};
$('body').on('click', '.remove', function () {
  var last = $('tbody tr').length;
  if (last == 1) {
    alert("you can not remove last row");
  }
  else {
    $(this).parent().parent().remove();
  }

});
$('.addRows').on('click', function () {
  addRows();
});
function addRows() {
  var tr = '<tr>' +
    '<td><input type="text" name="title[]" class="form-control" required></td>' +
    '<td><input type="text" name="body[]" class="form-control required"></td>' +
    '<td><input type="file" name="image[]" class="form-control" ></td>' +
    '<td><input type="file" name="image1[]" class="form-control" ></td>' +
    '<td><a href="#project-form" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>' +
    '</tr>';
  $('.project-row').append(tr);
};

// $('body').on('click', '.remove', function () {
//   var last = $('.project-row tr').length;
//   if (last == 1) {
//     alert("you can not remove last row");
//   }
//   else {
//     $(this).parent().parent().remove();
//   }

// });