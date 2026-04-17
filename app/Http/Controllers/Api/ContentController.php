<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    private function verifySecret(Request $request)
    {
        $secret = $request->header('X-Admin-Secret');
        if (!$secret || $secret !== config('app.admin_secret')) {
            abort(403, 'Unauthorized');
        }
    }

    public function addPrestasi(Request $request)
    {
        $this->verifySecret($request);
        $validated = $request->validate([
            'title' => 'required|string',
            'date' => 'nullable|date',
            'content' => 'nullable|string',
            'pictures_urls' => 'nullable|array',
            'important' => 'nullable|boolean',
        ]);

        $prestasi = Prestasi::create($validated);
        return response()->json($prestasi, 201);
    }

    public function removePrestasi(Request $request, $id)
    {
        $this->verifySecret($request);
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->delete();
        return response()->json(null, 204);
    }

    public function addProgramKerja(Request $request)
    {
        $this->verifySecret($request);
        $validated = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'date' => 'nullable|date',
            'content' => 'nullable|string',
            'pictures_urls' => 'nullable|array',
            'division' => 'nullable|string',
            'type' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'homepage' => 'nullable|boolean',
        ]);

        $programKerja = ProgramKerja::create($validated);
        return response()->json($programKerja, 201);
    }

    public function removeProgramKerja(Request $request, $id)
    {
        $this->verifySecret($request);
        $programKerja = ProgramKerja::findOrFail($id);
        $programKerja->delete();
        return response()->json(null, 204);
    }
}
