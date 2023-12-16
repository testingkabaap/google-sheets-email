<?php
require __DIR__ . '/vendor/autoload.php';
class GoogleSheets
{
  private $spreadsheetId;
  function __construct()
  {
  }

  private function _set_scope($params = [])
  {
    $client = new Google_Client();
    $client->setApplicationName('Your Google Sheets App');
    if (isset($params["type"])) {
      $params["type"] = strtolower($params["type"]);
      if ($params["type"] === "read") {
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS_READONLY]);
      } else {
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
      }
    } else {
      $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
    }
    $client->setAuthConfig(__DIR__ . '/key/credentials.json');
    $client->setAccessType('offline');

    return $client;
  }

  public function read_data($params = [])
  {
    if (isset($params["sheet_id"])) {
      $this->spreadsheetId = $params["sheet_id"];
      try {
        $client = new Google_Client();
        $client->setApplicationName('Your Google Sheets App');
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS_READONLY]);
        $client->setAuthConfig(__DIR__ . '/key/credentials.json');
        $client->setAccessType('offline');

        $CLIENT = $this->_set_scope(["type" => "read"]);

        // Create Google Sheets service
        $service = new Google_Service_Sheets($CLIENT);

        $response = $service->spreadsheets->get($this->spreadsheetId);
        $sheets = $response->getSheets();
        if (!empty($sheets)) {
          $sheetName = "";
          foreach ($sheets as $sheet) {
            $sheetName = $sheet->getProperties()->getTitle();
            if (!empty($sheetName)) {
              break;
            }
          }
          if (!empty($sheetName)) {
            $range = $sheetName;

            // Fetch data from the spreadsheet
            $response = $service->spreadsheets_values->get($this->spreadsheetId, $range);
            $values = $response->getValues();
            if (!empty($values)) {
              $RES = ["status" => true, "status_code" => 200, "message" => "Data Found", "data" => [
                "sheet_details" => [
                  "sheet_name" => $sheetName,
                  "data" => $values
                ]
              ]];
            } else $RES = ["status" => false, "status_code" => 400, "message" => "Empty Sheet Data. (1)"];
          } else $RES = ["status" => false, "status_code" => 400, "message" => "No Sheets Found. (2)"];
        } else $RES = ["status" => false, "status_code" => 400, "message" => "No Sheets Found. (1)"];
      } catch (Google\Service\Exception $e) {
        $msg = "Some Technical Error or Invalid Spread Sheet ID.";
        $t = $e->getMessage();
        if (!empty($t)) {
          $t = json_decode($t, true);
          if (!empty($t) && isset($t["error"]["message"])) {
            $msg = $t["error"]["message"];
          }
        }
        $RES = ["status" => false, "status_code" => 400, "message" => $msg, "api" => [
          "Response" => $t
        ]];
      } catch (Exception $e) {
        $RES = ["status" => false, "status_code" => 400, "message" => "Some Technical Error or Invalid Spread Sheet ID. (1)"];
      }
    } else $RES = ["status" => false, "status_code" => 400, "message" => "Spread Sheet Required."];
    return $RES;
  }
}
