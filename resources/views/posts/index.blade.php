@extends('layouts.app')

@section('content')


<div class="container home_posts">

@foreach($posts as $post)
    <div class="row mb-5">
        <div class="home_posts_single col-6 offset-3">
            <div class="col-md-12 home_post__details">
                <div class="home_post__head">
                    <img src="{{$post->user->profile->profileImage()}}" alt="{{$post->caption}}" class="rounded-circle">
                    <a href="/profile/{{$post->user->id}}"><h4 class="ml-3">{{ $post->user->username }}</h4></a>
                </div>    

                <a href="/profile/{{$post->user->id}}"><p><b>{{$post->user->name}}</b></p></a><p>{{ $post->caption }}</p>
            </div>            
            <div class="home_post__img">
                <img src="/storage/{{$post->image}}" alt="{{ $post->caption }}">
            </div>
        </div>
    </div>
    
@endforeach
<div class="row">
    <div class="col-md-12 d-flex justify-content-center">{{$posts->links()}}</div>
</div>
</div>    


@endsection