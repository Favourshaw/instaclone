<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['following_count']; // Add this line

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username,
            ]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function followingProfiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_follows', 'user_id', 'profile_id')
            ->withTimestamps();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function toggleFollowProfile(Profile $profile)
    {
        $this->isFollowingProfile($profile) ? $this->unfollowProfile($profile) : $this->followProfile($profile);
    }

    public function followProfile(Profile $profile)
    {
        if (!$this->isFollowingProfile($profile)) {
            DB::transaction(function () use ($profile) {
                $this->followingProfiles()->attach($profile->id);
                $this->increment('following_count');
                $profile->increment('followers_count');
                Cache::forget("user:{$this->id}:following_count");
            });
        }
    }

    public function unfollowProfile(Profile $profile)
    {
        if ($this->isFollowingProfile($profile)) {
            DB::transaction(function () use ($profile) {
                $this->followingProfiles()->detach($profile->id);
                $this->decrement('following_count');
                $profile->decrement('followers_count');
                Cache::forget("user:{$this->id}:following_count");
            });
        }
    }

    public function isFollowingProfile(Profile $profile)
    {
        return $this->followingProfiles()->where('profile_id', $profile->id)->exists();
    }

    // Accessor for following count
    public function getFollowingCountAttribute()
    {
        if (!array_key_exists('following_count', $this->attributes)) {
            $this->attributes['following_count'] = $this->followingProfiles()->count();
        }
        return $this->attributes['following_count'];
    }

    // Cached count method
    public function cachedFollowingCount()
    {
        return Cache::remember("user:{$this->id}:following_count", now()->addHours(12), function () {
            return $this->following_count;
        });
    }
}
