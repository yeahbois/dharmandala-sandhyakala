<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';

    protected $fillable = [
        'url',
        'app',
        'homepage',
        'thamnet'
    ];

    protected $casts = [
        'homepage' => 'boolean',
        'thamnet' => 'boolean'
    ];

    public function getEmbedUrlAttribute()
    {
        $url = $this->url;

        if (str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be')) {
            $url = str_replace('watch?v=', 'embed/', $url);
            if (str_contains($url, 'youtu.be/')) {
                $url = str_replace('youtu.be/', 'youtube.com/embed/', $url);
            }
            return $url . (str_contains($url, '?') ? '&' : '?') . 'controls=1&modestbranding=1';
        } elseif (str_contains($url, 'instagram.com')) {
            preg_match('/(?:reels?|p)\/([^\/]+)/', $url, $matches);
            if (isset($matches[1])) {
                return "https://www.instagram.com/reels/{$matches[1]}/embed";
            }
        } elseif (str_contains($url, 'tiktok.com')) {
            preg_match('/video\/(\d+)/', $url, $matches);
            if (isset($matches[1])) {
                return "https://www.tiktok.com/embed/v2/{$matches[1]}";
            }
        }

        return $url;
    }
}
