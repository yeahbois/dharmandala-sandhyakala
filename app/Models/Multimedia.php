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
        $app = strtolower($this->app);

        if (str_contains($app, 'youtube')) {
            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $url, $match)) {
                return "https://www.youtube.com/embed/" . $match[1];
            }
        } elseif (str_contains($app, 'instagram')) {
            if (preg_match('/instagram\.com\/(?:p|reels|reel)\/([^\/?#&]+)/', $url, $match)) {
                return "https://www.instagram.com/reel/" . $match[1] . "/embed";
            }
        } elseif (str_contains($app, 'tiktok')) {
            if (preg_match('/tiktok\.com\/(?:@.*\/video\/|v\/|t\/)([^\/?#&]+)/', $url, $match)) {
                return "https://www.tiktok.com/embed/v2/" . $match[1];
            }
        }

        // Fallback for simple youtube replacement if already exists or other apps
        return str_replace('watch?v=', 'embed/', $url);
    }
}
