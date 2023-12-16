<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>ENTER DETAILS</h1>
        <form action="get_data.php" id="requestForm">
          <div class="error-box"></div>
          <div class="row">
            <div class="col-12 mb-3">
              <label>SpreadSheet ID</label>
              <input type="text" name="sheet_id" placeholder="Sheet ID" required class="form-control">
              <div class="invalid-feedback">Enter Spread Sheet ID</div>
            </div>

            <div class="col-12 mb-3">
              <label>Name</label>
              <input type="text" name="name" placeholder="Name" required class="form-control">
              <div class="invalid-feedback">Enter Name</div>
            </div>

            <div class="col-12 mb-3">
              <label>Mobile Number</label>
              <input type="text" name="mobile_number" placeholder="Mobile Number" required class="form-control">
              <div class="invalid-feedback">Enter Mobile Number</div>
            </div>

            <div class="col-12 mb-3">
              <label>Reference Number</label>
              <input type="text" name="reference_number" placeholder="Reference Number" required class="form-control">
              <div class="invalid-feedback">Enter Reference Number</div>
            </div>
            <div class="text-center">
              <button class="btn btn-success" type="submit">CHECK DATA</button>
            </div>
          </div>
        </form>

        <div class="response-container" id="responseContainer"></div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
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
            globalSetErrorText(error_box, 200, res.message);
            response_container.html(res.data.html);
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