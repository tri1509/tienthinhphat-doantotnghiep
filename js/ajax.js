$(document).ready(function () {
  $(".cart-sl").change(function () {
    var id = $(this).attr("data-id");
    var qty = $(this).val();
    var price = $("#price-" + id).val();
    var data = { id: id, qty: qty, price: price };
    $.ajax({
      url: "ajax/cart.php",
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

$(document).ready(function () {
  $(".center").change(function () {
    var qty = $(this).val();
    var price = $(this).attr("data-id");
    var data = { qty: qty, price: price };
    console.log(data);
    $.ajax({
      url: "ajax/detail.php",
      method: "POST",
      data: data,
      dataType: "json",
      success: function (data) {
        $("#thanh-toan").text(data.sub_total);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      },
    });
  });
});
