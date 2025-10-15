<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;

class GoogleDriveService
{
    private $drive;

    public function __construct()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/credentials/service-account.json'));
        $client->addScope([
            Drive::DRIVE,
            Drive::DRIVE_FILE
        ]);
        $client->setAccessType('offline');
        $client->setSubject(env('GOOGLE_DRIVE_ADMIN_EMAIL')); // Add this line

        $this->drive = new Drive($client);
    }

    public function uploadFile($file, $folderId = null)
    {
        // Create file metadata with explicit drive ID
        $fileMetadata = new DriveFile([
            'name' => $file->getClientOriginalName(),
            'parents' => [$folderId],
            'driveId' => env('GOOGLE_DRIVE_ID'), // Shared Drive ID
        ]);

        $content = file_get_contents($file->getRealPath());

        // Use create with proper parameters for shared drives
        $uploaded = $this->drive->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
            'fields' => 'id, name, webViewLink, webContentLink',
            'supportsAllDrives' => true
        ]);

        return $uploaded;
    }

    public function listFiles($folderId = null)
    {
        $query = $folderId ? "'{$folderId}' in parents and trashed=false" : "trashed=false";
        $optParams = [
            'q' => $query,
            'fields' => 'files(id, name, webViewLink, mimeType)',
            'supportsAllDrives' => true,
            'includeItemsFromAllDrives' => true,
            'corpora' => 'drive', // Search within the shared drive
            'driveId' => env('GOOGLE_DRIVE_ID'), // Shared Drive ID
            'includeItemsFromAllDrives' => true
        ];
        
        $files = $this->drive->files->listFiles($optParams);
        return $files->getFiles();
    }

    public function deleteFile($fileId)
    {
        return $this->drive->files->delete($fileId, [
            'supportsAllDrives' => true
        ]);
    }
}