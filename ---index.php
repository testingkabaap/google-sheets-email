<?php include('constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cargoline</title>
	<link rel="stylesheet" type="text/css" href="./index_files/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./index_files/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="./index_files/iofrm-style.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<style>
		.img-holder {
			width: 550px;
			background-color: #99e1f0;
		}
	</style>

<body>
	<div class="form-body without-side">

		<div class="row">
			<div class="img-holder">
				<div class="bg"></div>

			</div>
			<div class="form-holder">

				<div class="form-content">

					<div class="form-items">
						<img class="logo-size" src="https://cargolinefl.com/wp-content/uploads/2023/04/cropped-logo-2.png" alt="" style="width: 180px;">
						<p>ASome content Some content Some content Some content Some content.</p>
						<form action="get_data.php" id="requestForm">
							<div class="error-box"></div>
							<input class="form-control" type="text" name="sheet_id" placeholder="Sheet ID" required="">
							<input class="form-control" type="text" name="name" placeholder="Name" required="">
							<input class="form-control" type="text" name="mobile_number" placeholder="Mobile No" required="">
							<input class="form-control" type="text" name="reference_number" placeholder="Reference No." required="">
							<div class="form-button">
								<button id="submit" type="submit" class="ibtn">Search</button>
							</div>
						</form>

					</div>
				</div>
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

		$(document).on("click", ".sendPromotionLinkBtn", function() {
			var thisE = $(this);
			var to_email = thisE.attr("data-email");
			var promotion_link = thisE.attr("data-link");
			var url = "<?php echo BASE_URL . "email.php "; ?>";
			var data = new FormData();
			data.append("to_email", to_email);
			data.append("promotion_link", promotion_link);
			var error_box = $("#email-error-box");
			error_box.html("");
			global_submit_form_data_ajax(url, data, function(output) {
				try {
					var res = JSON.parse(output);
					if (res.status) {
						globalSetErrorText(error_box, 200, res.message);
					} else {
						globalSetErrorText(error_box, 400, res.message);
					}
				} catch (e) {
					globalSetErrorText(error_box, 400, "Some Error " + e);
				}
			});
		});

		var pageLoader =
			'<div id="uniquePageLoader" style="position: fixed;z-index: 99999999;width: 100%;height: 100%;background-color: rgb(0 0 0 / 80%);top: 0;left: 0;display: flex;align-items: center;justify-content: center"><style>body{overflow: hidden;}</style><div class="ctbx"><div class="imglbx" style="max-width: 150px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" ><circle cx="50" cy="50" r="0" fill="none" stroke="#e90c59" stroke-width="2"><animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="0s"></animate><animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="0s"></animate></circle><circle cx="50" cy="50" r="0" fill="none" stroke="#46dff0" stroke-width="2"><animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="-0.5s"></animate><animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="-0.5s"></animate></circle></svg></div></div></div>';

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