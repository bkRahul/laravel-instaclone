@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 profile">
        <div class="col-md-4">
            <div class="profile__dp text-center">
                <img src="{{$user->profile->profileImage()}}" alt="Photo by Muaawiyah Dadabhay on Unsplash" class="rounded-circle">
                <a class="mt-3" style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@muaawiyahdadabhay?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Muaawiyah Dadabhay"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Muaawiyah Dadabhay</span></a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="profile__section">
                <div class="prof__head">
                    <h1 class="prof__title">{{ $user->username }}</h1>
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                    @can('update', $user->profile)
                    <span class="add__post"><a href="/p/create" class="btn btn-primary">Add Post</a></span>
                    @endcan
                </div>   
                @can('update', $user->profile)<div class="prof__edit"><a href="/profile/{{ $user->id }}/edit">Edit Profile</a></div>@endcan
                <div class="prof__status">
                    <ul>
                        <li><b>{{ $user->posts->count() }}</b> posts</li>
                        <li><b>{{$user->profile->followers->count()}}</b> followers</li>
                        <li><b>{{$user->following->count()}}</b> following</li>
                    </ul>
                </div>   
                <div class="prof__details">
                    <span><b>{{ $user->profile->title }}</b><br/>{{ $user->profile->description }}</span>
                    <a href="{{ $user->profile->url }}" class="prof__link"><b>{{ $user->profile->url }}</b></a>
                </div>   
            </div>
        </div>        
    </div>
    <div class="row img-section">
        <div class="container grid">
            @foreach($user->posts as $post)
        <div><a href="/p/{{$post->id}}"><img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="grid__item"></a></div>
             @endforeach
        </div>
    </div>
</div>
@endsection
