@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
        <div class="row"><h1>Upload New Post</h1></div>
        <div class="form-group row">
            <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __(' Caption') }}</label>

            <div class="col-md-6">
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __(' Post Image') }}</label>

            <div class="col-md-6">
                <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" >

                @error('image')
                    <span class="img-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <button class="btn btn-primary col-md-2 offset-md-5">Post Image</button>
        </div>            
    </form>
</div>
@endsection
