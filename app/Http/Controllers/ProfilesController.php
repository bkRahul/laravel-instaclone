<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

use App\User;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view( 'profiles.index', ['user' => $user] );
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view( 'profiles.edit', compact('user') );        
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
        }

        dd($data);

        auth()->user()->profile->update(array_merge(
            $data, ['image' => $imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }
}
