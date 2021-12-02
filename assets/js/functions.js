function addProduct() {
  // $(function () {
  //   $("form").bind("submit", function () {
  //     $.ajax({
  //       type: "post",
  //       url: $("#form").attr("action"),
  //       data: $("form").serialize(),
  //       success: function (result) {
  //         alert(result);
  //       },
  //     });
  //     return false;
  //   });
  // });

  //Prevent Instant Click

  // Create an FormData object
  var formData = $("#form").submit(function (e) {
    e.preventDefault();
    return;
  });
  //formData[0] contain form data only
  // You can directly make object via using form id but it require all ajax operation inside $("form").submit(<!-- Ajax Here   -->)
  var formData = new FormData(formData[0]);
  $.ajax({
    url: $("#form").attr("action"),
    type: "POST",
    data: formData,
    success: function (response) {
      if (response == 1) {
        $("#response").html("Product added sucessfully");
        window.location.replace(window.location.href);
      } else {
        $("#response").html(response);
      }
    },
    contentType: false,
    processData: false,
    cache: false,
  });
  return false;
}

function addCategory() {
  var formData = $("#addCat").submit(function (e) {
    e.preventDefault();
    return;
  });

  var formData = new FormData(formData[0]);

  $.ajax({
    url: $("#addCat").attr("action"),
    type: "POST",
    data: formData,
    success: function (response) {
      console.log(response);
      if (response == 1) {
        $("#response").html("Category added sucessfully");
        $("#addCat")[0].reset();
      } else {
        $("#response").html("Error occured!");
      }
    },
    contentType: false,
    processData: false,
    cache: false,
  });
  return false;
}

function editCat(cat_id) {
  $.ajax({
    url: "../admin/inc/ajax/manage_cat.php",
    type: "POST",
    data: "cat_id=" + cat_id + "&action=find",
    success: function (response) {
      console.log(response);
      $("#cat_name").val(response);
      $("#action").val("update");
      $("#cat_id").val(cat_id);
    },
  });
}

function deleteCat(id) {
  $(`#${id}`).css("display", "none");
  $.ajax({
    url: "../admin/inc/ajax/manage_cat.php",
    type: "POST",
    data: "cat_id=" + id + "&action=delete",
    success: function (response) {
      console.log(response);
    },
  });
}

function manageCart(pid, qty, type) {
  $.ajax({
    url: "admin/inc/cart.php",
    type: "POST",
    data: "pid=" + pid + "&qty=" + qty + "&type=" + type,
    success: function (response) {
      console.log(response);
      $("#cart_count").text(response);
      $("#cart_count1").text(response);
    },
  });
  cartAddedModel(pid, qty, "editCart");
}
function editCart(pid, qty, type) {
  $.ajax({
    url: "admin/inc/cart.php",
    type: "POST",
    data: "pid=" + pid + "&qty=" + qty + "&type=" + type,
    success: function (response) {
      var obj = JSON.parse(response);
      console.log(obj["0"]);
      $("#p_id").val(obj.product_id);
      $("#cartProductTitle").text(obj.product_name);
      $("#cart_q").val(qty);

      $("#sellingPrice").html(
        obj.selling_price + `<span id="mrp">${obj.mrp}</span>`
      );
    },
  });
}

function getProduct(pid, qty, type) {
  $.ajax({
    url: "admin/inc/cart.php",
    type: "POST",
    data: "pid=" + pid + "&qty=" + qty + "&type=" + type,
    success: function (response) {
      var obj = JSON.parse(response);
      console.log(obj);
      $("#quickViewTitle").text(obj.product_name);
      $("#quickViewMrp").html(`<span>${obj.mrp}</span>`);
      $("#quickViewSp").text(obj.selling_price);
      $("#quickViewImg1").css(
        "background-image",
        `url(assets/images/products/${obj.product_image})`
      );
    },
  });
}

function setPageTitle() {
  p = $(".page_title").text();
  $("#page_title").text(p);
}
setPageTitle();

function cartAddedModel(pid, qty, type) {
  $.ajax({
    url: "admin/inc/cart.php",
    type: "POST",
    data: "pid=" + pid + "&qty=" + qty + "&type=" + type,
    success: function (response) {
      var obj = JSON.parse(response);
      console.log(obj);
      $("#cartAddedNote").text("' " + obj.product_name + "'  ");
      $("#cartAddedImage").attr(
        "src",
        "assets/images/products/" + obj.product_image
      );
      // $("#quickViewMrp").html(`<span>${obj.mrp}</span>`);
      // $("#quickViewSp").text(obj.selling_price);
      // $("#quickViewImg1").css(
      //   "background-image",
      // `url(assets/images/products/${obj.product_image})`
      // );
    },
  });
}

// function checkout1() {
//   $.ajax({
//     url: "admin/inc/ajax/create_order.php",
//     type: "POST",
//     data: $("#checkout").serialize(),
//     success: function (response) {
//       console.log(response);
//     },
//   });
// }

function razorpay1() {
  var options = {
    key: "rzp_test_F5eLDvlDGPbZjN", // Enter the Key ID generated from the Dashboard
    amount: "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    currency: "INR",
    name: "Acme Corp",
    description: "Test Transaction",
    image: "https://example.com/your_logo",
    order_id: "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    handler: function (response) {
      console.log(response);
    },
    prefill: {
      name: "<?php echo $_GET['order_id']; ?>",
      email: "gaurav.kumar@example.com",
      contact: "9999999999",
    },
    notes: {
      address: "<?php echo $_GET['order_id']; ?>Razorpay Corporate Office",
    },
    theme: {
      color: "#3399cc",
    },
  };
  var rzp1 = new Razorpay(options);
  rzp1.on("payment.failed", function (response) {
    console.log(response.error.reason);
  });
  document.getElementById("checkout").onclick = function (e) {
    rzp1.open();
    e.preventDefault();
  };
}

function checkout(total) {
  var payment_type = $("input:radio.payment-group:checked").val();

  var formData = new FormData($("#checkout")[0]);
  pn = document.getElementsByClassName("product_name");
  product_name = [];

  formData.append("total", total);
  for (let i = 0; i < pn.length; i++) {
    product_name[i] = pn[i].innerText;
    formData.append("product_name[]", product_name[i]);
  }

  var path = "admin/inc/ajax/create_order.php";
  $.ajax({
    url: path,
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (stuff) {
      response = JSON.parse(stuff);
      console.log(response.order_id);
      // console.log(stuff);

      window.location.href = "confirmation.php?order_id=" + response.order_id;
    },
  });
}

function getProductName() {
  pn = document.getElementsByClassName("product_name");
  product_name = [];
  for (let i = 0; i < pn.length; i++) {
    product_name[i] = pn[i].innerText;
  }
  console.log(product_name);
}
getProductName();

function manageUser(type) {
  $("#login_button").html(
    "Authenticating <i class='fa fa-spinner fa-spin' aria-hidden='true'></i>"
  );
  var formData = new FormData($("#login_form")[0]);
  formData.append("type", type);
  var path = "admin/inc/ajax/manage_user.php";
  $.ajax({
    url: path,
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      data = JSON.parse(response);
      console.log(data);
      if (data.status == 0) {
        $("#response").text("Wrong Detail");
        $("#login_button").html("Login");
      } else {
        $("#response").html("Login Successful, redirecting");

        window.setTimeout(function () {
          window.location.href = "account.php";
        }, 1000);
      }
    },
  });
}
