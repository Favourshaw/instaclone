<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostController extends Controller
{


    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        // Store the uploaded file
        $imagePath = request('image')->store('uploads', 'public');

        // Create image manager instance
        $manager = new ImageManager(new Driver());

        // Process the image
        $image = $manager->read(storage_path('app/public/' . $imagePath));
        $image->cover(width: 1080, height: 1350 );
        $image->save(storage_path('app/public/' . $imagePath));

        // Create post
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profiles/' . auth()->user()->id);
    }

    public function show($post)
    {
        dd($post);
    }
}
