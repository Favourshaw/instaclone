<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //add this line only if the form is properly validated in controller, else use fillable
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
