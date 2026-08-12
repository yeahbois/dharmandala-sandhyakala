<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class CabinetArchiveController extends Controller
{
    /**
     * Scrape the database for instagram handles and quotes of cabinet members
     * and permanently edit the cabinet_dharmakala.json archive file.
     */
    public function scrapeArsip(Request $request)
    {
        $path = base_path('database/data/cabinet_dharmakala.json');
        if (!file_exists($path)) {
            return response()->json([
                'success' => false,
                'message' => 'Archive JSON file not found.'
            ], 404);
        }

        $data = json_decode(file_get_contents($path), true);
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid JSON in archive file.'
            ], 400);
        }

        $admins = Admin::all()->keyBy('name');
        $updatedCount = 0;

        $processMembers = function (&$members) use ($admins, &$updatedCount) {
            foreach ($members as &$member) {
                if (isset($admins[$member['name']])) {
                    $admin = $admins[$member['name']];
                    $member['ig'] = $admin->instagram ?? $member['ig'];
                    $member['quote'] = $admin->quotes ?? $member['quote'];
                    $updatedCount++;
                }
            }
        };

        foreach (['osis', 'mpk'] as $inst) {
            if (isset($data[$inst]['structure'])) {
                foreach ($data[$inst]['structure'] as &$item) {
                    if ($item['type'] === 'bidang') {
                        $processMembers($item['members']);
                    } elseif ($item['type'] === 'container') {
                        foreach ($item['sections'] as &$seksi) {
                            $processMembers($seksi['members']);
                        }
                    }
                }
            }
        }

        file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return response()->json([
            'success' => true,
            'message' => "Successfully scraped database and updated {$updatedCount} archive members permanently.",
            'updated_count' => $updatedCount
        ]);
    }

    /**
     * Display the combined cabinet archive view using the local JSON data only.
     */
    public function viewArsip()
    {
        $path = base_path('database/data/cabinet_dharmakala.json');
        if (!file_exists($path)) {
            abort(404, 'Archive data not found');
        }

        $data = json_decode(file_get_contents($path), true);
        if (!$data) {
            abort(500, 'Invalid archive data format');
        }

        return view('dharman_kabinet.dharmakala', [
            'osis' => $data['osis'],
            'mpk' => $data['mpk'],
        ]);
    }
}
