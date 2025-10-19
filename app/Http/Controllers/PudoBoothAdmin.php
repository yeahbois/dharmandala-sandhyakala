<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectId;

class PudoBoothAdmin extends Controller
{
    private $collection;

    public function __construct()
    {
        // Use the native MongoDB database connection
        $this->collection = DB::connection('mongodb')->getCollection('settings');
    }

    private function updateUrlField($field, $url)
    {
        try {
            // Update the first document with type = "url"
            $result = $this->collection->updateOne(
                ['type' => 'url'],
                ['$set' => ["value.$field" => $url]]
            );

            return $result->getModifiedCount() > 0;
        } catch (\Exception $e) {
            \Log::error("Failed to update $field: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Update driveURL field
     */
    public function changeDriveURL($url)
    {
        return $this->updateUrlField('driveURL', $url);
    }

    /**
     * Update spreadSheetURL field
     */
    public function changeSpreadsheetURL($url)
    {
        return $this->updateUrlField('spreadSheetURL', $url);
    }

    /**
     * Update frameCDNURL field
     */
    public function changeFrameURL($url)
    {
        return $this->updateUrlField('frameCDNURL', $url);
    }

    /**
     * Get preset settings
     */
    public function getPreset($id)
    {
        try {
            $preset = $this->collection->findOne([
                'type' => 'preset',
                'preset' => (int)$id
            ]);

            if (!$preset) {
                return response()->json(['error' => 'Preset not found'], 404);
            }

            return response()->json([
                'preset' => $preset['preset'],
                'values' => $preset['value'] ?? []
            ]);
        } catch (\Exception $e) {
            \Log::error("Failed to get preset $id: " . $e->getMessage());
            return response()->json(['error' => 'Failed to get preset'], 500);
        }
    }

    /**
     * Update preset settings
     */
    public function changePresetSetting(Request $request, $id)
    {
        try {
            $data = $request->all();
            
            // Update or insert the preset
            $result = $this->collection->updateOne(
                ['type' => 'preset', 'preset' => (int)$id],
                ['$set' => ['value' => $data]],
                ['upsert' => true]
            );

            if ($result->getModifiedCount() > 0 || $result->getUpsertedCount() > 0) {
                return response()->json([
                    'success' => true,
                    'message' => "Preset $id updated successfully"
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "No changes made to preset $id"
                ]);
            }
        } catch (\Exception $e) {
            \Log::error("Failed to update preset $id: " . $e->getMessage());
            return response()->json(['error' => 'Failed to update preset'], 500);
        }
    }

    public function getURL($data) {
        $dbRes = $this->collection->findOne(["type" => "url"]);
        if ($data == "drive") {
            return $dbRes['driveURL'];
        } else if ($data == "spreadsheet") {
            return $dbRes['spreadSheetURL'];
        } else if ($data == "frame") {
            return $dbRes['frameCDNURL'];
        } else {
            return response()->json(["error" => "not found"]);
        }
    }
}