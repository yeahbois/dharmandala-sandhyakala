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
        $this->url = rtrim(config('services.supabase.url', ''), '/');
        $this->key = config('services.supabase.key', '');
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
            private array $query = [];

            public function __construct($url, $client, $table)
            {
                $this->url = $url;
                $this->client = $client;
                $this->table = $table;
            }

            public function eq(string $column, $value)
            {
                $this->query[] = "{$column}=eq.{$value}";
                return $this;
            }

            public function select(string $columns = '*')
            {
                $queryString = !empty($this->query) ? '&' . implode('&', $this->query) : '';
                $response = $this->client->get("{$this->url}/rest/v1/{$this->table}?select={$columns}{$queryString}");
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

    /**
     * Memanggil RPC (Stored Procedure) di Supabase
     */
    public function rpc(string $function, array $params = [])
    {
        $response = $this->client()->post("{$this->url}/rest/v1/rpc/{$function}", $params);
        return $response->json();
    }

    /**
     * Akses ke Supabase Storage
     */
    public function storage(string $bucket)
    {
        return new class ($this->url, $this->key, $bucket) {
            private string $url;
            private string $key;
            private string $bucket;

            public function __construct($url, $key, $bucket)
            {
                $this->url = $url;
                $this->key = $key;
                $this->bucket = $bucket;
            }

            public function upload(string $path, $file)
            {
                $response = Http::withHeaders([
                    'apikey' => $this->key,
                    'Authorization' => 'Bearer ' . $this->key,
                ])->withBody(
                    file_get_contents($file->getRealPath()),
                    $file->getMimeType()
                )->post("{$this->url}/storage/v1/object/{$this->bucket}/{$path}");

                return $response->json();
            }

            public function getPublicUrl(string $path)
            {
                return "{$this->url}/storage/v1/object/public/{$this->bucket}/{$path}";
            }
        };
    }
}