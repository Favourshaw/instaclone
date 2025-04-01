<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

class Profile extends Model
{
    protected $guarded = [];

    protected $appends = ['followers_count', 'profile_image_url'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'profile_follows', 'profile_id', 'user_id')
            ->withTimestamps();
    }

    // Profile image URL accessor
    public function getProfileImageUrlAttribute(): string
    {
        return $this->image
            ? '/storage/' . $this->image
            : asset('images/default_pfp.jpg');
    }

    // Followers count accessor
    public function getFollowersCountAttribute()
    {
        if (!array_key_exists('followers_count', $this->attributes)) {
            $this->attributes['followers_count'] = $this->followers()->count();
        }
        return $this->attributes['followers_count'];
    }

    // Cached followers count
    public function cachedFollowersCount()
    {
        return Cache::remember("profile:{$this->id}:followers_count", now()->addHours(12), function () {
            return $this->followers_count;
        });
    }

    // Clear followers cache
    public function clearFollowersCache()
    {
        Cache::forget("profile:{$this->id}:followers_count");
    }
}
