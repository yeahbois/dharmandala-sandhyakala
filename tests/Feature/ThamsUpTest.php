<?php

use App\Models\Post;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('validates ThamsUp category specifically', function () {
    $admin = Admin::create([
        'name' => 'Admin User',
        'username' => 'admin',
        'password' => bcrypt('password'),
        'role' => 'Superadmin'
    ]);

    $this->actingAs($admin);

    // ThamsUp with empty content should be valid
    $response = $this->post(route('thamnet.store'), [
        'title' => 'My ThamsUp',
        'category' => 'ThamsUp',
        'image_url' => 'https://example.com/image.jpg',
        'content' => '',
        'author' => 'Author Name',
        'is_featured' => '1'
    ]);

    if ($response->exception) {
        throw $response->exception;
    }

    $post = Post::where('title', 'My ThamsUp')->first();
    expect($post)->not->toBeNull();
    expect($post->category)->toBe('ThamsUp');
    expect($post->is_featured)->toBeFalsy(); // Forced to false
    $response->assertRedirect();
});

it('requires content for other categories', function () {
    $admin = Admin::create([
        'name' => 'Admin User',
        'username' => 'admin',
        'password' => bcrypt('password'),
        'role' => 'Superadmin'
    ]);

    $this->actingAs($admin);

    $response = $this->post(route('thamnet.store'), [
        'title' => 'My Story',
        'category' => 'Cerita',
        'image_url' => 'https://example.com/image.jpg',
        'content' => '',
        'author' => 'Author Name'
    ]);

    $response->assertSessionHasErrors('content');
});
