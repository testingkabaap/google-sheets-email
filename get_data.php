<?php
include('constants.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["sheet_id"])) {
    if (isset($_POST["name"])) {
      if (isset($_POST["mobile_number"])) {
        if (isset($_POST["reference_number"])) {
          require "model/GoogleSheets.php";
          $gs = new GoogleSheets();
          $apiRes = $gs->read_data(["sheet_id" => $_POST["sheet_id"]]);
          if (isset($apiRes) && $apiRes["status"] === true) {
            $matchRecords = [];
            foreach ($apiRes["data"]["sheet_details"]["data"] as $k => $v) {
              $isMatch = false;
              if (strtolower($v[0]) === strtolower($_POST["name"])) $isMatch = true; // Name
              elseif (strtolower($v[1]) === strtolower($_POST["mobile_number"])) $isMatch = true; // Mobile Number
              elseif (strtolower($v[2]) === strtolower($_POST["reference_number"])) $isMatch = true; // Reference Number

              if ($isMatch) $matchRecords[] = $v;
            }
            if (!empty($matchRecords)) {
              $html = '<div id="email-error-box"></div><div class="table-responsive mt-5"><table class="table table-hovered table-bordered"><thead><tr><th>Sno</th><th>Name</th><th>Mobile Number</th><th>Reference Number</th><th>Email</th><th>Promotion Link</th><th>Download Link</th><th>Action</th></tr></thead><tbody>';
              foreach ($matchRecords as $k => $v) {
                $html .= '<tr><td>' . ($k + 1) . '</td>';
                foreach ($v as $v2) $html .= '<td>' . $v2 . '</td>';
                $html .= '<td><button class="btn btn-primary btn-sm sendPromotionLinkBtn" data-email="'.$v[3].'" data-link="'.$v[4].'" >Send Promotion Link</td></td></tr>';
              }
              $html .= '<tbody></table></div>';
              $RES = ["status" => true, "status_code" => 200, "message" => "Matching Records Found", "data" => [
                "matching_records" => $matchRecords,
                "html" => $html,
                "sheet_details" => $apiRes["data"]["sheet_details"]
              ]];
            } else $RES = ["status" => false, "status_code" => 400, "message" => "No Match Records Found", "data" => $apiRes["data"]];
          } else {
            if (isset($apiRes["message"])) {
              $RES = $apiRes;
            } else $RES = ["status" => false, "status_code" => 400, "message" => "Some Technical Error!!"];
          }
        } else $RES = ["status" => false, "status_code" => 400, "message" => "Reference Number Required"];
      } else $RES = ["status" => false, "status_code" => 400, "message" => "Mobile Number Required"];
    } else $RES = ["status" => false, "status_code" => 400, "message" => "Name Number Required"];
  } else $RES = ["status" => false, "status_code" => 400, "message" => "Sheet ID Required."];
} else $RES = ["status" => false, "status_code" => 400, "message" => "Invalid Request"];
echo json_encode($RES);
die;
