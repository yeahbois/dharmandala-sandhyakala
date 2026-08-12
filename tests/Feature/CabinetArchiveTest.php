<?php

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can scrape database to update cabinet archive json file and render the archive page', function () {
    // 1. Seed or insert test Admins matching names in the cabinet_dharmakala.json
    $path = base_path('database/data/cabinet_dharmakala.json');
    $this->assertTrue(file_exists($path));

    $data = json_decode(file_get_contents($path), true);

    // Find first member in OSIS structure
    $firstMemberName = $data['osis']['structure'][0]['members'][0]['name'];

    // Create an Admin record with a custom quote and instagram
    Admin::create([
        'username' => 'testuser',
        'password' => bcrypt('password123'),
        'type' => 'normal',
        'name' => $firstMemberName,
        'role' => 'Ketua Umum OSIS',
        'group' => 'bph-osis',
        'instagram' => 'custom_test_ig_username',
        'quotes' => 'Testing custom quotes from database!',
    ]);

    // 2. Trigger the scrape API
    $response = $this->getJson('/api/kabinet/arsip/scrape');
    $response->assertStatus(200);
    $response->assertJson([
        'success' => true
    ]);

    // 3. Assert the JSON file has been permanently modified
    $updatedData = json_decode(file_get_contents($path), true);
    $updatedMember = $updatedData['osis']['structure'][0]['members'][0];

    $this->assertEquals('custom_test_ig_username', $updatedMember['ig']);
    $this->assertEquals('Testing custom quotes from database!', $updatedMember['quote']);

    // 4. Assert the Archive view loads correctly
    $viewResponse = $this->get('/kabinet/arsip/dharmakala');
    $viewResponse->assertStatus(200);
    $viewResponse->assertSee($firstMemberName);
    $viewResponse->assertSee('custom_test_ig_username');
    $viewResponse->assertSee('Testing custom quotes from database!');
});
