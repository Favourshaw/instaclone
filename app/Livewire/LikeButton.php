<?php

namespace App\Livewire;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public Profile $profile;
    public bool $isFollowing;
    public int $followersCount;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->updateFollowStatus();
    }

    public function toggleFollow()
    {
        abort_unless(Auth::check(), 403, 'You must be logged in to follow profiles');

        Auth::user()->toggleFollowProfile($this->profile);
        $this->updateFollowStatus();
    }

    protected function updateFollowStatus()
    {
        $this->isFollowing = Auth::check() && Auth::user()->isFollowingProfile($this->profile);
        $this->followersCount = $this->profile->fresh()->followers_count;
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
