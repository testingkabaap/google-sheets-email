<?php include('constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <style>
    .main {
      background-color: azure;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .form-container {
        width:100%;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px 0 #00000045;
      border-radius: 15px;
    }

    .form-container .request-form {}

    .form-container .request-form label {
      /*display: none;*/
    }

    .form-control {
      background-color: #f5f5f5;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .details-container {
      text-align: center;
    }

    .details-container>img {
      max-width: 180px;
    }
    .response-container{
            word-break: break-word;
    }
  </style>
</head>

<body>
  <div class="modal fade" id="sendEmailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <h5 class="text-center">Enter Email Address</h5>
          <form action="<?php echo BASE_URL . "email.php"; ?>" method="post" id="sendEmailForm" class="form-needs-validation" novalidate>
            <div class="error-box"></div>
            <input type="hidden" name="promotion_link" id="promotionLinkInput">
            <div class="form-group">
              <input type="email" name="to_email" placeholder="To Email" class="form-control">
              <div class="invalid-feedback">Enter Receiver Email</div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Send Email</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <section class="main">
    <div class="form-container">
      <div class="details-container">
        <img class="logo-size" src="https://cargolinefl.com/wp-content/uploads/2023/04/cropped-logo-2.png" alt="Cargo Online">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa, veniam.</p>
      </div>
      <form action="get_data.php" id="requestForm" method="post" class="request-form form-needs-validation" novalidate>
        <div class="error-box"></div>
        <div class="row">
          <div class="col-12 form-group d-none">
            <label>SpreadSheet ID</label>
            <input type="text" name="sheet_id" placeholder="Sheet ID" required class="form-control" value="1zxOBOF8sjDMlTfEJmDG6ePfX0cDNkVTbT4qni_XQXJg" title="SpreadSheet ID">
            <div class="invalid-feedback">Enter Spread Sheet ID</div>
          </div>

          <div class="col-12 form-group">
            <label>Invoice Number</label>
            <input type="text" name="invoice_number" placeholder="Invoice Number" required class="form-control" title="Invoice Number" value="QA004FT230000106">
            <div class="invalid-feedback">Enter Invoice Number</div>
          </div>

          <div class="col-12 form-group">
            <label>Invoice Date</label>
            <input type="date" name="invoice_date" placeholder="Invoice Date" required class="form-control" title="Invoice Date" value="2023-07-06">
            <div class="invalid-feedback">Select Invoice Date</div>
          </div>

          <div class="col-12 form-group">
            <label>Destination Store</label>
            <input type="text" name="destination" placeholder="Destination Store" required class="form-control" title="Destination Store" value="DM-MainStore">
            <div class="invalid-feedback">Enter Destination Store</div>
          </div>
          <div class="text-center">
            <button class="btn btn-primary" type="submit">SEARCH</button>
          </div>
        </div>
      </form>
      <div class="response-container" id="responseContainer"></div>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript">
    /* bootstrap form validation */
    (function() {
      "use strict";
      window.addEventListener(
        "load",
        function() {
          /* Fetch all the forms we want to apply custom Bootstrap validation styles to */
          var forms = document.getElementsByClassName("form-needs-validation");
          /* Loop over them and prevent submission */
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener(
              "submit",
              function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add("was-validated");
              },
              false
            );
          });
        },
        false
      );
    })();
    $(document).on("submit", "form#requestForm", function(e) {
      e.preventDefault();
      var thisE = $(this);
      var form = $(this)[0];
      var url = $(this).attr('action');
      var data = new FormData(form);
      var error_box = $(this).find(".error-box");
      var response_container = $("#responseContainer");
      error_box.html("");
      response_container.html("");
      global_submit_form_data_ajax(url, data, function(output) {
        try {
          var res = JSON.parse(output);
          if (res.status) {
            /* globalSetErrorText(error_box, 200, res.message); */
            thisE.fadeOut(0);
            response_container.html(res.data.html);
            response_container.fadeIn(0)
          } else {
            globalSetErrorText(error_box, 400, res.message);
          }
        } catch (e) {
          globalSetErrorText(error_box, 400, "Some Error " + e);
        }
      });
    });

    $(document).on("click", "#formBackBtn", function() {
      $("#responseContainer").fadeOut(0);
      $("#requestForm").fadeIn(0);
    });

    $(document).on("click", ".sendPromotionLinkBtn", function() {
      var thisE = $(this);
      var promotion_link = thisE.attr("data-link");
      $("#promotionLinkInput").val(promotion_link);
      $("#sendEmailModal").modal("show");
    });
    
    $(document).on("submit", "form#sendEmailForm", function(e) {
      e.preventDefault();
      var thisE = $(this);
      var form = $(this)[0];
      var url = $(this).attr('action');
      var data = new FormData(form);
      var error_box = $(this).find(".error-box");
      error_box.html("");
      global_submit_form_data_ajax(url, data, function(output) {
        try {
          var res = JSON.parse(output);
          if (res.status) {
            globalSetErrorText(error_box, 200, res.message);
            setTimeout(function () {
              $("#sendEmailModal").modal("hide");
            }, 1000);
          } else {
            globalSetErrorText(error_box, 400, res.message);
          }
        } catch (e) {
          globalSetErrorText(error_box, 400, "Some Error " + e);
        }
      });
    });

    var pageLoader = '<div id="uniquePageLoader" style="position: fixed;z-index: 99999999;width: 100%;height: 100%;background-color: rgb(0 0 0 / 80%);top: 0;left: 0;display: flex;align-items: center;justify-content: center"><style>body{overflow: hidden;}</style><div class="ctbx"><div class="imglbx" style="max-width: 150px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" ><circle cx="50" cy="50" r="0" fill="none" stroke="#e90c59" stroke-width="2"><animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="0s"></animate><animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="0s"></animate></circle><circle cx="50" cy="50" r="0" fill="none" stroke="#46dff0" stroke-width="2"><animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="-0.5s"></animate><animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="-0.5s"></animate></circle></svg></div></div></div>';

    function globalSetErrorText(element, status, msg) {
      var c = "alert alert-";
      if (status == 200) {
        c += 'success';
      } else if (status == 400) {
        c += 'danger';
      }
      element.html('<div class="' + c + ' p-3"  role="alert">' + msg + '</div>');
    }

    /* BEGIN:: AJAX FUNCTION */
    function global_submit_form_data_ajax(
      url,
      data,
      onComplete = function(output) {
        console.log(output);
      },
      onError = function(err) {
        console.error(err);
      }
    ) {
      /* ajax function */
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function() {
          $("body").prepend(pageLoader);
        },
        success: function(data) {
          onComplete(data);
        },
        error: function(err) {
          onError(err);
        },
        complete: function() {
          $("#uniquePageLoader").remove();
        },
      });
    }
    /* END:: AJAX FUNCTION */
  </script>
</body>

</html>