<?php

require __DIR__ . '/vendor/autoload.php';
// echo __DIR__ . '/vendor/autoload.php';die;

// Set up the Google Sheets API client
$client = new Google_Client();
// die;
$client->setApplicationName('Your Google Sheets App');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS_READONLY]);
// $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAuthConfig('key/credentials.json');
$client->setAccessType('offline');

// Create Google Sheets service
$service = new Google_Service_Sheets($client);


// Spreadsheet ID
$spreadsheetId = '17_h3TC9aTQUTKWaM9__2mApUbKGia_EWTCdnASYsFSQ';

// Fetch sheets information
echo "<pre>";
try {
    $response = $service->spreadsheets->get($spreadsheetId);
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
            // echo $sheetName;

            $range = $sheetName;

            // Fetch data from the spreadsheet
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();
            if (!empty($values)) {
                
            } else {
                echo "Empty Sheet Data";
            }

            // Output the data
            if (empty($values)) {
                print "No data found.\n";
            } else {
                foreach ($values as $k => $row) {
                    print implode(", ", $row) . PHP_EOL;
                }
            }
        } else {
            echo "NO SHEETS FOUND (2)";
        }
    } else {
        echo "NO SHEETS FOUND";
    }
} catch (Google\Service\Exception $e) {
    $msg = "Some Technical Error or Invalid Spread Sheet ID.";
    $t = $e->getMessage();
    if (!empty($t)) {
        $t = json_decode($t, true);
        if (!empty($t) && isset($t["error"]["message"])) {
            $msg = $t["error"]["message"];
        }
    }

    echo $msg;
} catch (Exception $e) {
    echo "Some Technical Error or Invalid Spread Sheet ID. (1)";
}
// $sheets = $response->getSheets();
die;
// if()

// Output sheet names
if (empty($sheets)) {
    print "No sheets found.\n";
} else {
    foreach ($sheets as $sheet) {
        print "Sheet Name: " . $sheet->getProperties()->getTitle() . PHP_EOL;
    }
}
die;

// Spreadsheet ID and range
$spreadsheetId = '17_h3TC9aTQUTKWaM9__2mApUbKGia_EWTCdnASYsFSQ';
$range = 'Sheet1!A1:C10'; // Update with your sheet name and range

// Fetch data from the spreadsheet
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

// Output the data
if (empty($values)) {
    print "No data found.\n";
} else {
    foreach ($values as $row) {
        print implode("\t", $row) . PHP_EOL;
    }
}
