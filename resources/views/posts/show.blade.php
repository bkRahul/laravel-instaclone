@extends('layouts.app')

@section('content')
<div class="container single_post">
    <div class="row">
        <div class="col-md-6 single_post__img"><img src="/storage/{{ $post->image }}" alt=""></div>
        <div class="col-md-6 single_post__details"><h4>{{ $post->user->username }}</h4><p>{{ $post->caption }}</p></div>
    </div>
</div>
@endsection
