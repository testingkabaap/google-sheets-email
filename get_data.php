<?php
include('constants.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["sheet_id"])) {
    if (isset($_POST["invoice_number"])) {
      if (isset($_POST["invoice_date"])) {
        if (isset($_POST["destination"])) {
          require "model/GoogleSheets.php";
          $gs = new GoogleSheets();
          $apiRes = $gs->read_data(["sheet_id" => $_POST["sheet_id"]]);
          if (isset($apiRes) && $apiRes["status"] === true) {
            $matchRecords = [];
            $isMatch = false;
            $_POST['invoice_date'] = date("d-M-y", strtotime($_POST['invoice_date']));
            $_unique_key = strtolower($_POST['invoice_number'] . $_POST['invoice_date'] . $_POST['destination']);
            // echo json_encode($apiRes["data"]);
            // die;
            foreach ($apiRes["data"]["sheet_details"]["data"] as $k => $v) {
              if (isset($v[(INDEX_invoice_number - 1)]) && isset($v[(INDEX_invoice_date - 1)]) && isset($v[(INDEX_destination - 1)])) {
                $unique_key = strtolower($v[(INDEX_invoice_number - 1)] . $v[(INDEX_invoice_date - 1)] . $v[(INDEX_destination - 1)]);
                if ($unique_key === $_unique_key) $isMatch = true;
              }

              if ($isMatch) {
                $matchRecords = $v;
                break;
              }
            }
            if (!empty($matchRecords)) {
              if (isset($matchRecords[(INDEX_external_link - 1)])) {
                $html = '<button class="btn btn-warning" id="formBackBtn">Back</button><div class="alert alert-success text-center"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, quae eligendi repudiandae totam, quas quod ipsam repellendus architecto, excepturi vitae ad. Corrupti at architecto perferendis praesentium exercitationem eligendi, minima doloremque!</p><p><a href="'.$matchRecords[(INDEX_external_link - 1)].'" target="_blank">'.$matchRecords[(INDEX_external_link - 1)].'</a><p><button class="btn btn-primary btn-sm sendPromotionLinkBtn" data-link="' . $matchRecords[(INDEX_external_link - 1)] . '" >Do You Want to Send Link</button></div>';
                /* $html = '<div id="email-error-box"></div><div class="table-responsive mt-5"><table class="table table-hovered table-bordered"><thead><tr><th>Sno</th><th>Name</th><th>Mobile Number</th><th>Reference Number</th><th>Email</th><th>Promotion Link</th><th>Download Link</th><th>Action</th></tr></thead><tbody>';
              foreach ($matchRecords as $k => $v) {
                $html .= '<tr><td>' . ($k + 1) . '</td>';
                foreach ($v as $v2) $html .= '<td>' . $v2 . '</td>';
                $html .= '<td><button class="btn btn-primary btn-sm sendPromotionLinkBtn" data-email="' . $v[3] . '" data-link="' . $v[4] . '" >Send Promotion Link</td></td></tr>';
              }
              $html .= '<tbody></table></div>'; */
                $RES = ["status" => true, "status_code" => 200, "message" => "Matching Records Found", "data" => [
                  "matching_records" => $matchRecords,
                  "external_link" => $matchRecords[(INDEX_external_link - 1)],
                  "html" => $html,
                  "sheet_details" => $apiRes["data"]["sheet_details"]
                ]];
              } else $RES = ["status" => false, "status_code" => 400, "message" => "External Link Column Not Found", "data" => $apiRes["data"]];
            } else $RES = ["status" => false, "status_code" => 400, "message" => "No Match Records Found", "data" => $apiRes["data"]];
          } else {
            if (isset($apiRes["message"])) {
              $RES = $apiRes;
            } else $RES = ["status" => false, "status_code" => 400, "message" => "Some Technical Error!!"];
          }
        } else $RES = ["status" => false, "status_code" => 400, "message" => "Destination Required"];
      } else $RES = ["status" => false, "status_code" => 400, "message" => "Invoice Date Required"];
    } else $RES = ["status" => false, "status_code" => 400, "message" => "Invoice Number Required"];
  } else $RES = ["status" => false, "status_code" => 400, "message" => "Sheet ID Required."];
} else $RES = ["status" => false, "status_code" => 400, "message" => "Invalid Request"];
echo json_encode($RES);
die;
