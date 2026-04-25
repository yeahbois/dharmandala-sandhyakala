<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Divisi;
use App\Models\Multimedia;
use App\Models\Post;
use App\Models\Prestasi;
use App\Models\ProgramKerja;
use App\Models\Thalation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $isSuper = $user->isSuperAdmin();

        // 1. OSIS/MPK Info (Self)
        // Handled via $user in view

        // 2. Divisi Board
        $divisis = collect();
        if ($isSuper) {
            $divisis = Divisi::with('programKerjas')->get();
        } else {
            $divisi = Divisi::where('slug', $user->group)->with('programKerjas')->first();
            if ($divisi) {
                $divisis->push($divisi);
            }
        }

        // 3. Media Board
        $showMedia = $user->hasBoardAccess('media');
        $multimedias = $showMedia ? Multimedia::latest()->get() : collect();

        // 4. Macapi Board
        $showMacapi = $user->hasBoardAccess('macapi');
        $thalation = $showMacapi ? Thalation::first() : null;

        // 5. Prestasi Board
        $showPrestasi = $user->hasBoardAccess('prestasi');
        $prestasis = $showPrestasi ? Prestasi::latest()->get() : collect();

        // 6. ThamNet Board
        $showThamNet = $user->hasBoardAccess('thamnet');
        $posts = $showThamNet ? Post::latest()->get() : collect();

        // 7. Thanos Board
        $showThanos = $user->group === 'akad' || $isSuper;
        $thanosEvent = $showThanos ? \App\Models\ThanosEvent::with('responders')->first() : null;

        return view('dashboard', compact(
            'user', 'isSuper', 'divisis', 'showMedia', 'multimedias',
            'showMacapi', 'thalation', 'showPrestasi', 'prestasis',
            'showThamNet', 'posts', 'showThanos', 'thanosEvent'
        ));
    }

    public function updateAdmin(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'instagram' => 'nullable|string|max:255',
            'quotes' => 'nullable|string',
            'password' => 'nullable|string|min:8',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        return back()->with('success', 'Profile updated successfully!');
    }

    public function updateDivisi(Request $request, Divisi $divisi)
    {
        if (Auth::user()->type !== 'superadmin' && Auth::user()->group !== $divisi->slug) {
            abort(403);
        }
        $validated = $request->validate([
            'about' => 'nullable|string',
            'details' => 'nullable|string',
        ]);
        $divisi->update($validated);
        return back()->with('success', 'Divisi information updated!');
    }

    public function storeProgramKerja(Request $request)
    {
        $validated = $request->validate([
            'divisi_id' => 'required|exists:divisis,id',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'content' => 'nullable|string',
            'pictures_urls' => 'nullable|array',
            'type' => 'required|in:osis,mpk',
            'featured' => 'boolean',
            'homepage' => 'boolean',
        ]);

        if (Auth::user()->type !== 'superadmin') {
            $divisi = Divisi::find($validated['divisi_id']);
            if (Auth::user()->group !== $divisi->slug) {
                abort(403);
            }
        }

        ProgramKerja::create($validated);
        return back()->with('success', 'Program Kerja added!');
    }

    public function deleteProgramKerja(ProgramKerja $programKerja)
    {
        if (Auth::user()->type !== 'superadmin') {
            $divisi = $programKerja->divisi;
            if (!$divisi || Auth::user()->group !== $divisi->slug) {
                abort(403);
            }
        }
        $programKerja->delete();
        return back()->with('success', 'Program Kerja deleted!');
    }

    public function storeMultimedia(Request $request)
    {
        if (!Auth::user()->hasBoardAccess('media')) abort(403);

        $validated = $request->validate([
            'url' => 'required|url',
            'app' => 'nullable|string',
            'homepage' => 'boolean',
            'thamnet' => 'boolean',
        ]);
        Multimedia::create($validated);
        return back()->with('success', 'Multimedia added!');
    }

    public function deleteMultimedia(Multimedia $multimedia)
    {
        if (!Auth::user()->hasBoardAccess('media')) abort(403);

        $multimedia->delete();
        return back()->with('success', 'Multimedia deleted!');
    }

    public function updateThalation(Request $request)
    {
        if (!Auth::user()->hasBoardAccess('macapi')) abort(403);

        $thalation = Thalation::first();
        if (!$thalation) {
            $thalation = Thalation::create(['jumlah_pengunjung' => 0]);
        }

        if ($request->has('reset_pengunjung')) {
            $thalation->update(['jumlah_pengunjung' => 0]);
            return back()->with('success', 'Visitor count reset!');
        }

        $validated = $request->validate([
            'next_macapi' => 'nullable|date',
        ]);
        $thalation->update($validated);
        return back()->with('success', 'Macapi date updated!');
    }

    public function storePrestasi(Request $request)
    {
        if (!Auth::user()->hasBoardAccess('prestasi')) abort(403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'content' => 'nullable|string',
            'pictures_urls' => 'nullable|array',
            'important' => 'boolean',
        ]);
        Prestasi::create($validated);
        return back()->with('success', 'Prestasi added!');
    }

    public function deletePrestasi(Prestasi $prestasi)
    {
        if (!Auth::user()->hasBoardAccess('prestasi')) abort(403);

        $prestasi->delete();
        return back()->with('success', 'Prestasi deleted!');
    }

    public function deletePost(Post $post)
    {
        if (!Auth::user()->hasBoardAccess('thamnet')) abort(403);

        $post->delete();
        return back()->with('success', 'Blog post deleted!');
    }
}
