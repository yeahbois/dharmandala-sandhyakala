<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SupabaseService
{
    protected string $url;
    protected string $key;

    public function __construct()
    {
        // Mengambil data dari file .env
        $this->url = rtrim(config('services.supabase.url'), '/');
        $this->key = config('services.supabase.key');
    }

    /**
     * Membangun basis HTTP Client dengan header autentikasi Supabase
     */
    protected function client()
    {
        return Http::withHeaders([
            'apikey' => $this->key,
            'Authorization' => 'Bearer ' . $this->key,
            'Content-Type' => 'application/json',
            'Prefer' => 'return=representation' // Memaksa Supabase mengembalikan data yang di-update/insert
        ]);
    }

    /**
     * Mengambil data dari tabel (SELECT)
     */
    public function from(string $table)
    {
        return new class ($this->url, $this->client(), $table) {
            private string $url;
            private $client;
            private string $table;

            public function __construct($url, $client, $table)
            {
                $this->url = $url;
                $this->client = $client;
                $this->table = $table;
            }

            public function select(string $columns = '*')
            {
                $response = $this->client->get("{$this->url}/rest/v1/{$this->table}?select={$columns}");
                return $response->json();
            }

            public function insert(array $data)
            {
                $response = $this->client->post("{$this->url}/rest/v1/{$this->table}", $data);
                return $response->json();
            }

            public function update(array $data, string $column, $value)
            {
                $response = $this->client->patch("{$this->url}/rest/v1/{$this->table}?{$column}=eq.{$value}", $data);
                return $response->json();
            }
        };
    }
}