<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

use App\User;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $postsCount =  Cache::remember(
            'count.posts.' .$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );
        
        $followersCount = Cache::remember(
            'count.followers.' .$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );

        $followingCount = Cache::remember(
            'count.following.' .$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );

        return view( 'profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount') );
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view( 'profiles.edit', ['user' => $user] );        
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        
        $username = request()->validate([
            'username' => ['required', 'string', 'max:255'],
        ]);

        $data = request()->validate([
            'image' => '',
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'url' => ['url']
        ]);

        auth()->user()->update($username);

        if(request('image')) {

            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(640, 640);

            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data, $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
