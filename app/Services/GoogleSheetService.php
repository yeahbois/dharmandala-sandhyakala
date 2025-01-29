<?php

namespace App\Services;

use Google\Client as Google_Client;
use Google\Service\Sheets as Google_Service_Sheets;
use Illuminate\Support\Facades\Log;
use Google\Service\Sheets\ValueRange;

class GoogleSheetService
{
    protected $client;
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        // Initialize Google Client
        $this->client = new Google_Client();
        $this->client->setAuthConfig(storage_path('credentials.json'));
        $this->client->addScope(Google_Service_Sheets::SPREADSHEETS);

        // Initialize Google Sheets Service
        $this->service = new Google_Service_Sheets($this->client);

        // Set the Spreadsheet ID
        $this->spreadsheetId = '1oTrcemPt1Amk_8SKj4OnFD6p4PuAv7SXTurXJbrU7kM'; // Replace with your actual spreadsheet ID

        // Check and refresh the token if necessary
        $this->checkAndRefreshToken();
    }

    // Function to check and refresh the token if expired
    private function checkAndRefreshToken()
    {
        // Check if the client has a valid access token
        if ($this->client->isAccessTokenExpired()) {
            // Check if a refresh token is available
            if ($this->client->getRefreshToken()) {
                // Refresh the access token using the refresh token
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
                Log::info("Access token refreshed.");
            } else {
                // If no refresh token is available, log the error and return
                Log::error("Client authentication failed. No refresh token available.");
                return;
            }
        }
    }

    public function appendData(array $data)
        {
        // Debug: Log the received data
        Log::info("Received data: " . json_encode($data));

        // Convert associative array to indexed array
        $values = [
            array_values($data) // Extract values only
        ];

        // Debug: Log the formatted data
        Log::info("Formatted data: " . json_encode($values));

        // Set the range to append data to (adjust if necessary)
        $range = 'Sheet1!A1';

        // Prepare the data to be appended
        $body = new ValueRange([
            'values' => $values,
        ]);

        // Set the input option to RAW (no formatting)
        $params = ['valueInputOption' => 'RAW'];

        try {
            // Append the data to the spreadsheet
            $this->service->spreadsheets_values->append($this->spreadsheetId, $range, $body, $params);
            Log::info("Data appended successfully!");
        } catch (\Exception $e) {
            // Catch any errors and log the error message
            Log::error("Error appending data: " . $e->getMessage());
        }
    }
}
