$(document).ready(function () {
  $(".cart-sl").change(function () {
    var id = $(this).attr("data-id");
    var qty = $(this).val();
    var price = $("#price-" + id).val();
    var data = { id: id, qty: qty, price: price };
    $.ajax({
      url: "ajax.php",
      method: "POST",
      data: data,
      dataType: "json",
      success: function (data) {
        $("#sub-total-" + id).text(data.sub_total);
        // $("#total-price").text(data.total);
        // console.log(data);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      },
    });
  });
});
