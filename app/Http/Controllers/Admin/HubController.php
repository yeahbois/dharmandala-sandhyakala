<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\ProgramKerja;
use App\Models\Thalation;
use App\Models\Multimedia;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HubController extends Controller
{
    private function verifySecret(Request $request)
    {
        $secret = $request->header('X-Admin-Secret') ?? $request->input('admin_secret');
        if (!$secret || $secret !== config('app.admin_secret')) {
            abort(403, 'Unauthorized');
        }
    }

    public function index()
    {
        return view('dharman_kabinet.hub');
    }

    public function storePrestasi(Request $request)
    {
        $this->verifySecret($request);
        $validated = $request->validate([
            'title' => 'required|string',
            'date' => 'nullable|date',
            'content' => 'nullable|string',
            'pictures_urls' => 'nullable|array',
            'important' => 'nullable|boolean',
        ]);

        Prestasi::create($validated);
        return back()->with('success', 'Prestasi added successfully');
    }

    public function storeProgramKerja(Request $request)
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

        ProgramKerja::create($validated);
        return back()->with('success', 'Program Kerja added successfully');
    }

    public function updateThalation(Request $request)
    {
        $this->verifySecret($request);
        $validated = $request->validate([
            'next_macapi' => 'required|string',
        ]);

        $thalation = Thalation::first() ?: new Thalation();
        $thalation->next_macapi = $validated['next_macapi'];
        $thalation->save();

        return back()->with('success', 'Thalation macapi updated successfully');
    }

    public function storeMultimedia(Request $request)
    {
        $this->verifySecret($request);
        $validated = $request->validate([
            'url' => 'required|string',
            'app' => 'required|string',
            'homepage' => 'nullable|boolean',
            'thamnet' => 'nullable|boolean',
        ]);

        Multimedia::create($validated);
        return back()->with('success', 'Multimedia added successfully');
    }

    public function storeAdmin(Request $request)
    {
        $this->verifySecret($request);
        $validated = $request->validate([
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|string',
            'type' => 'nullable|string',
            'name' => 'nullable|string',
            'instagram' => 'nullable|string',
            'quotes' => 'nullable|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        Admin::create($validated);

        return back()->with('success', 'Admin added successfully');
    }
}
