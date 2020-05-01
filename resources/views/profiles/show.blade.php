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
                <div class="mr-3"><strong>{{ $postsCount }}</strong> Posts</div>
                <div class="mr-3"><strong>{{ $followersCount }}</strong> Followers</div>
                <div class="mr-3"><strong>{{ $followingCount }}</strong> Followings</div>
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
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card ">
                <div class="card-body">   
                        <a href="{{ route('profiles.show', ['user' => $post->user->username]) }}">
                            <img src="{{ $post->user->profile->getImage() }}" class="rounded-circle" width="45px" height="45px">
                            <strong>{{ '@'.$post->user->username }}</strong>
                        </a>
                        | <small style="float: right;" class="text-muted">{{ $post->created_at->format('d/m/Y à H:m') }}</small>
                     <hr>
                
                    <h4 class="card-title">
                        <strong>{{ $post->user->username }}</strong>
                    </h4>
                    <p class="card-text">{{ $post->caption }}</p>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Voir l'annonce</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
