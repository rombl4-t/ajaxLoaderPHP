$("#data").submit(function (event) {
  event.preventDefault();

  let formData = new FormData(this);

  $.ajax({
    url: "/include/processor.php",
    type: "POST",
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      $('#result').html(response);
      $('#data').trigger('reset');
    },
  });

  return false;
});

$("#formGallery").submit(function (event) {
  event.preventDefault();

  let formData = new FormData(this);

  $.ajax({
    url: "/include/checkbox-form.php",
    type: "POST",
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      $('#resultDel').html(response);
      $('#formGallery input:checkbox:checked').each(function(){
        $(this).next().remove();
        $(this).remove();
      });
      $('#formGallery').trigger('reset');
    },
  });

  return false;
});