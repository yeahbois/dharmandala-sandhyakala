<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThamNetController extends Controller
{
    /**
     * Display the ThamNet Home Page with dynamic posts.
     */
    public function index()
    {
        $featuredPost = Post::where('is_featured', true)->latest()->first();
        $posts = Post::latest()->get();
        $multimedias = \App\Models\Multimedia::latest()->get();

        return view('dharman_thamnet.home', compact('featuredPost', 'posts', 'multimedias'));
    }

    /**
     * View a single blog post.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('dharman_thamnet.blog', compact('post'));
    }

    /**
     * Show the editor for creating/editing a blog post.
     */
    public function editor($slug = null)
    {
        $post = $slug ? Post::where('slug', $slug)->firstOrFail() : null;
        return view('dharman_thamnet.editor', compact('post'));
    }

    /**
     * Store or update a blog post.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'image_url' => 'nullable|url',
            'content' => 'required|string',
            'author' => 'required|string',
            'is_featured' => 'boolean'
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . rand(1000, 9999);

        $post = Post::create($data);

        return redirect()->route('thamnet.show', $post->slug)->with('success', 'Blog post published successfully!');
    }

    public function login()
    {
        return view('dharman_thamnet.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (\Illuminate\Support\Facades\Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('thamnet.home'));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('thamnet.login');
    }

    public function debug_all_data()
    {
        // return all post data
        return Post::all();
    }
}
