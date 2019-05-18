@extends('layouts.app')

@section('content')
@foreach($posts as $post)

<div class="container single_post">
    <div class="row">
        <div class="col-md-6 single_post__img"><img src="/storage/{{$post->image}}" alt="{{ $post->caption }}"></div>
        <div class="col-md-6 single_post__details">
            <div class="single_post__head">
                <img src="/storage/{{$post->user->profile->image}}" alt="{{$post->caption}}" class="rounded-circle">
                <a href="/profile/{{$post->user->id}}"><h4 class="ml-3">{{ $post->user->username }}</h4></a>
            </div>    
            <hr />
            <a href="/profile/{{$post->user->id}}"><p><b>{{$post->user->username}}</b></p></a><p>{{ $post->caption }}</p>
        </div>
    </div>
</div>    

@endforeach
@endsection
