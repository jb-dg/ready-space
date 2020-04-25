@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-4 text-center">
            <img src="{{ $user->profile->getImage() }}" class="rounded-circle w-100" style="max-width: 250px">
        </div>
        <div class="col-8">
            <div class="d-flex align-items-baseline">
                <div class="h4 mr-3 pt-2">{{ $user->username }}</div>
                <follow-button profile-id="{{ $user->profile->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            <div class="d-flex mt-3">
                <div class="mr-3"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="mr-3"><strong>{{ $user->profile->followers->count() }}</strong> Followers</div>
                <div class="mr-3"><strong>{{ $user->following->count() }}</strong> Followings</div>
            </div>
            @can('update', $user->profile)
            <a href="{{ route('profiles.edit', ['user' => $user->username]) }}" class="btn btn-outline-secondary m-3">Editer le profil</a>
            @endcan
            <div class="mt-3">
                <div class="font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><strong>Link: </strong><a href="{{ $user->profile->link }}">{{ $user->profile->link }}</a></div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-3">
            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                <img src="{{ asset('storage') .'/'. $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
