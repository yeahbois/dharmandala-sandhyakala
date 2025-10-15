<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleDriveService;

class DriveController extends Controller
{
    protected $drive;

    public function __construct(GoogleDriveService $drive)
    {
        $this->drive = $drive;
    }

    public function index()
    {
        $files = $this->drive->listFiles(env('GOOGLE_DRIVE_FOLDER_ID'));
        return response()->json($files);
    }

    public function upload(Request $request)
    {
        $request->validate(['file' => 'required|file']);
        $uploaded = $this->drive->uploadFile($request->file('file'), env('GOOGLE_DRIVE_FOLDER_ID'));
        return response()->json($uploaded);
    }

    public function delete($id)
    {
        $this->drive->deleteFile($id);
        return response()->json(['message' => 'File deleted']);
    }
}